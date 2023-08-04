<div class="character-grid">
    <?php foreach ($viewData['charaList'] as $currentCharacter) : ?>
      <?php 
        $name =  $currentCharacter->getName();
        $number = $currentCharacter->getNumber();
      ?>
        <a href="<?=$baseURL?>/details/<?= $number ?>" class="character-item">
              <img src="<?= $baseURL ?>/img/<?= $number ?>.png" alt="<?= $name ?>">
              <p>#<?= $number ?> <?= $name ?></p>
        </a>
    <?php endforeach ?>
</div>
