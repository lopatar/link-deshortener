<?php
declare(strict_types=1);
/**
 * @var int $maxRedirects
 */
$maxRedirects = $this->getProperty('MAX_REDIRECTS');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Jiří Lopatář" name="author">
    <meta content="Link de-shortener, unshortener, deshortener" name="keywords">
    <meta content="Link de-shortener - see what hides behind!" name="description">
    <link rel="stylesheet" type="text/css" href="/static/styles.css">
    <title>Link de-shortener</title>
</head>
<body><h1>Link de-shortener</h1>
<h3>See what hides behind!</h3>
<form method="POST" action="/api/deshorten">
    <input type="url" name="url"  placeholder="URL" required>
    <button type="submit">Deshorten</button>
</form>
<p>The de-shortener follows maximally <?= $maxRedirects ?> redirects!</p>
</body>

<footer>
    <a href="https://github.com/lopatar/link-deshortener" target="_blank">Source code</a>
</footer>
</html>