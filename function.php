<?php

use function PHPSTORM_META\type;

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

function nav_menu($linkClass = ''): string
{
    return
        nav_item('/PHP/index.php', 'Accueil', $linkClass) .
        nav_item('/PHP/glaces.php', 'Glace', $linkClass) .
        nav_item('/PHP/contact.php', 'Contact', $linkClass);
}

function checkbox(string $name, string $value, array $data, string $type): string
{
    $attributes = '';
    if ($type === "checkbox") {
        if (isset($data[$name]) && in_array($value, $data[$name])) {
            $attributes .= 'checked';
        }
        $result = <<<HTML
        <input type="checkbox" name="{$name}[]" value="$value" $attributes>
HTML;
    }
    else{
        if (isset($data[$name]) && $value === $data[$name]){
            $attributes .= 'checked';
        }
        $result = <<<HTML
        <input type="radio" name="{$name}" value="$value" $attributes>
    HTML;
    }
    return $result;
}

function dump($variable)
{
    echo'<pre>';
    var_dump($variable);
    echo '</pre>';
}
?>

<?php