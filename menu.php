<?php

if (!function_exists('nav_item')) {
    function nav_item(string $link, string $title, string $linkClass): string
    {
        $class = 'nav-item';
        if ($_SERVER['SCRIPT_NAME'] === $link) {
            $class .= ' active';
        }
        return <<<HTML
        <li class="$class">
            <a class="$linkClass" href="$link">$title</a>
        </li>
HTML;
    }
}
?>

<?= nav_item('/PHP/index.php', 'Accueil', $class); ?>
<?= nav_item('/PHP/contact.php', 'Contact', $class); ?>