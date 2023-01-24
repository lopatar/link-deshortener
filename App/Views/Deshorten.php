<?php
declare(strict_types=1);
/**
 * @var bool $errorOccurred
 */
$errorOccurred = $this->getProperty('errorOccurred');

/**
 * @var string $message
 */
$message = $this->getProperty('message');

if ($errorOccurred)
{
    $message = "<p class=\"error\">Error: $message</p>";
}
else
{
    $message = "<p>URL: $message</p>";
}
?>
<a href="/"><-- Back</a>
<?= $message ?>
</body>
<footer>
    <a href="https://github.com/lopatar/link-deshortener" target="_blank">Source code</a>
</footer>
</html>
