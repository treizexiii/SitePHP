<?php
require_once 'function.php';
//Checkbox
$parfums = [
    'Fraise' => 4,
    'Chocolat' => 5,
    'Vanille' => 3
];
//Radio
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];
//Checkbox
$supplements = [
    'Pépites de chocolat' => 1,
    'Chantilly' => 0.5
];
if (isset($_GET['composer'])) {
    $title = "Composer votre glace";
    $ingredients = [];
    $total = 0;
    foreach (['parfum', 'supplement', 'cornet'] as $name) {
        if (isset($_GET[$name])) {
            $choice = $_GET[$name];
            $list = $name . 's';
            if (is_array($choice)) {
                foreach ($_GET[$name] as $value) {
                    if (isset($$list[$value])) {
                        $ingredients[] = $value;
                        $total += $$list[$value];
                    }
                }
            } elseif (isset($$list[$choice])) {
                $ingredients[] = $choice;
                $total += $$list[$choice];
            }
        }
    }
}


require 'header.php';
?>

<h1 style="padding-bottom: 10px;">Composer votre glace</h1>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Votre glace</h5>
                <?php if (isset($ingredients)) : ?>
                    <ul>
                        <?php foreach ($ingredients as $ingredient) : ?>
                            <li><?= $ingredient ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <p>
                        <strong>Prix : </strong> <?= $total ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <form action="/PHP/glaces.php" method="GET">
            <h2>Choisissez vos parfums</h2>
            <?php foreach ($parfums as $parfum => $prix) : ?>
                <div class="checkbox">
                    <label>
                        <?= checkbox('parfum', $parfum, $_GET, "checkbox") ?>
                        <?= $parfum ?> - <?= $prix ?> €
                    </label>
                </div>
            <?php endforeach; ?>
            <h2>Choisissez votre cornet</h2>
            <?php foreach ($cornets as $cornet => $prix) : ?>
                <div class="radio">
                    <label>
                        <?= checkbox('cornet', $cornet, $_GET, "radio") ?>
                        <?= $cornet ?> - <?= $prix ?> €
                    </label>
                </div>
            <?php endforeach; ?>
            <h2>Choisissez vos suppléments</h2>
            <?php foreach ($supplements as $supplement => $prix) : ?>
                <div class="radio">
                    <label>
                        <?= checkbox('supplement', $supplement, $_GET, "checkbox") ?>
                        <?= $supplement ?> - <?= $prix ?> €
                    </label>
                </div>
            <?php endforeach; ?>
            <button type="submit" name="composer" class="btn btn-primary">Composer ma glace</button>
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>