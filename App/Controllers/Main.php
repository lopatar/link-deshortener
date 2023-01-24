<?php

namespace App\Controllers;

use Sdk\Http\Request;
use Sdk\Http\Response;
use Sdk\Render\View;

final class Main
{
    public static function deshorten(Request $request, Response $response, array $args): Response
    {
        $url = $request->getPost('url');

        $view = new View('Deshorten.php');
        $response->setView($view);

        if (!filter_var($url, FILTER_VALIDATE_URL))
        {
            self::setStatus($view, true, "$url is not valid URL");
            return $response;
        }

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5);

        if (!curl_exec($ch))
        {
            self::setStatus($view, true, "Failed executing request!");
            return $response;
        }

        $redirectedUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

        self::setStatus($view, false, $redirectedUrl);
        return $response;
    }

    private static function setStatus(View $view, bool $errorOccurred, string $message): void
    {
        $view->setProperty('errorOccurred', $errorOccurred);
        $view->setProperty('message', $message);
    }
}