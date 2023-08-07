<?php
// De la lecture direct de URL pour l'entrainement

// Récupérer l'URL actuelle
$currentURL = $_SERVER['REQUEST_URI'];

// Diviser l'URL en parties en utilisant '/'
$parts = explode('/', $currentURL);

// Trouver l'index du segment "liste" dans le tableau
$listIndex = array_search('liste', $parts);

// Récupérer tous les éléments après "liste" dans l'URL
$elementsAfterList = array_slice($parts, $listIndex + 1);

// Joindre les éléments en une chaîne
$type = implode('/', $elementsAfterList);
?>

<div class="text-center">
  <h2> Liste des Pokémon <?= $type ?></h2>
</div>

<div class="text-center">
  <table class="center-table">
    <thead>
      <tr>
        <th>
          N°
        </th>
        <th>
          Image
        </th>
        <th>
          Nom
        </th>
        <th>
          Types
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($viewData['charaList'] as $currentCharacter) : ?>
        <?php
        $name =  $currentCharacter->getName();
        $number = $currentCharacter->getNumber();
        $types = $currentCharacter->findTypeByNumber($number);
        ?>
        <tr>
          <td>
            #<?= sprintf('%03d', $number) ?>
          </td>
          <td>
            <a href="<?= $baseURL ?>/details/<?= $number ?>">
              <img src="<?= $baseURL ?>/img/<?= $number ?>.png" alt="<?= $name ?>"></p>
            </a>
          </td>
          <td>
            <a href="<?= $baseURL ?>/details/<?= $number ?>">
              <?= $name ?>
            </a>
          </td>
          <td>
            <?php foreach ($types as $type) : ?>
              <div class="d-flex justify-content-center align-items-center pokemon-info-item">
                <a href="<?=$baseURL?>/liste/<?= $type->getTypeName() ?>">
                  <h5 class="type-block type-title" style="background-color:#<?= $type->getTypeColor() ?>"><?= $type->getTypeName() ?></h5>
                </a>
              </div>
            <?php endforeach ?>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<div class="text-center retour">
  <a href="<?=$baseURL?>/liste">Revenir à la liste</a>
</div>
