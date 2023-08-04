<div class="type-container">
  <h4>Cliquez sur un type pour voir tous les Pokémon de ce type</h4>
  <div class="grid-container">
    <?php foreach ($viewData['typeList'] as $currentType) : ?>
      <?php 
        $name =  $currentType->getName();
        $color = "#".$currentType->getColor();
        // echo $color;
      ?>

      <div class="grid-item type-item <?= $name ?>" style="background-color: <?= $color ?>"><?= $name ?></div>
      
    <?php endforeach ?>
  </div>
</div>