<div class="type-container text-center">
  <h4>Cliquez sur un type pour voir tous les Pokémon de ce type</h4>
  <div class="grid-container">
    <?php foreach ($viewData['typeList'] as $currentType) : ?>
      <?php 
        $name =  $currentType->getName();
        $color = "#".$currentType->getColor();
      ?>

      <a href="<?=$baseURL?>/liste/<?= $name ?>" class="types-divs">
        <div class="grid-item type-item <?= $name ?>" style="background-color: <?= $color ?>">
          <?= $name ?>
        </div>
      </a>

    <?php endforeach ?>
  </div>
</div>