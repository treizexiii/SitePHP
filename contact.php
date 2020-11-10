<?php $title = "Nous contacter";
require_once 'config.php';
require 'function.php';

date_default_timezone_set('Europe/Paris');
$heure = (int)($_GET['heure'] ?? date('G'));
$jour = (int)($_GET['jour'] ?? date('N') - 1);
$creneaux = CRENEAUX[$jour];
$ouvert = in_creneaux($heure, $creneaux);
$color = $ouvert ? 'green' : 'red';

require 'header.php'; ?>

<div class="row">
    <div class="clo-md-8">
        <h2>Nous Contacter</h2>
        <p>Dans les textes non linéaires, généralement tabulaires, il est difficile de parler de paragraphes : la page est composée de tables ou de tableaux, de graphes et d'histogrammes, d'images (de photographies, de dessins, ou de schémas, etc.), où les informations textuelles figurent dans des pavés de type légende, commentaire, note, etc., chaque segment de texte étant plus ou moins indépendant des autres, et rattaché à un élément non textuel. Il vaut mieux dans ce cas parler de pavé(s), et envisager la composition du document sous l'angle de la topologie (de la mise en page(s)).</p>
    </div>
    <div class="col-md-4">
        <h2>Horraire d'ouverture</h2>
        <?php if ($ouvert) : ?>
            <div class="alert alert-success">
                Le magasin est ouvert
            </div>
        <?php else : ?>
            <div class="alert alert-danger">
                Le magasin est fermé
            </div>
        <?php endif; ?>
        <form action="" method="GET">
            <div class="form-group">
                <?= select('jour', $jour, JOURS) ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="heure" value="<?= $heure ?>">
            </div>
            <button class="btn btn-primary" type="submit">Voir si le magasin est ouvert</button>
        </form>
        <ul>
            <?php foreach (JOURS as $k => $jour) : ?>
                <li>
                    <strong><?= $jour ?></strong>
                    <?= creneaux_html(CRENEAUX[$k]) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php require 'footer.php'; ?>