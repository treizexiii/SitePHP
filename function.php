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

function select(string $name, $value, array $options): string 
{
    $html_options = [];
    foreach($options as $k => $option){
        $attributes = $k == $value ? 'selected' : '';
        $html_options[] = "<option value ='$k' $attributes>$option</option>";
    }
    return "<select class='form-control' name='$name'>" . implode($html_options) . '</select>';
}

function dump($variable)
{
    echo'<pre>';
    var_dump($variable);
    echo '</pre>';
}

function creneaux_html(array $creneaux){
    if(empty($creneaux)){
        return "Fermé.";
    }
    $phrases = [];
    foreach($creneaux as $creneau){
        $phrases[] = "de <strong>{$creneau[0]}h</strong> à <strong>{$creneau[1]}h</strong>";
    }
    return "Ouvert ".implode(' & ', $phrases);
}

function in_creneaux(int $heure, array $creneaux): bool
{
    foreach($creneaux as $creneau){
        $debut = $creneau[0];
        $fin = $creneau[1];
        if($heure>= $debut && $heure < $fin){
            return true;
        }
    }
    return false;
}

?>
