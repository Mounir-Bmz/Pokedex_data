<div class="text-center">
  <h2> Liste des Pokémon </h2>
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