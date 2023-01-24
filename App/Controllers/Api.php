<?php
declare(strict_types=1);

namespace App\Controllers;

use Sdk\Http\Request;
use Sdk\Http\Response;

final class Api
{
	public static function deshorten(Request $request, Response $response, array $args): Response
    {
        $url = $request->getPost('url');

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $response->addHeader('Location', '/');
            return $response;
        }

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5);

        if (!curl_exec($ch))
        {
            $response->addHeader('Location', '/');
            return $response;
        }

        $redirectedUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

        $response->write("URL: $redirectedUrl");
        return $response;
    }
}