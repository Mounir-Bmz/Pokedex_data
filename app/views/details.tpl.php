<?php
$dPokemon = $viewData["dPokemon"];
if ($dPokemon !== false) {
    $name = $dPokemon->getName();
}
?>

<?php
$typeColor01 = $viewData['tPokemon'][0] ?? null;
$typeColor02 = $viewData['tPokemon'][1] ?? null;
?>

<?php if ($typeColor01 !== null && $typeColor02 === null) : ?>
    <?php
    $typeColor01 = $typeColor01->getTypeColor();
    $typeColor02 = null;

    $tPokemon = $viewData["tPokemon"][0]->getTypeName();
    $tPokemonBis = null;
    ?>

<?php elseif ($typeColor01 !== null && $typeColor02 !== null) : ?>
    <?php
    $typeColor01 = $typeColor01->getTypeColor();
    $typeColor02 = $typeColor02->getTypeColor();

    $tPokemon = $viewData["tPokemon"][0]->getTypeName();
    $tPokemonBis = $viewData["tPokemon"][1]->getTypeName();
    ?>

<?php else : ?>
    <h2 class="text-center">Oups!</h2>
<?php endif; ?>

<?php if (isset($dPokemon) && is_object($dPokemon)) : ?>
    <div class="pokemon-details-box">
        <h2 class="text-center">Détails de <?= $dPokemon->getName() ?></h2>
        <div class="row row-details">
            <div class="col-md-4">
                <div class="pokemon-image d-flex align-items-center justify-content-center">
                    <img class="img-fluid" src="<?= $baseURL ?>/img/<?= $dPokemon->getNumber() ?>.png" alt="<?= $dPokemon->getName() ?>">
                </div>
            </div>
            <div class="col-md-8">
                <div class="pokemon-info h-100 d-flex flex-column justify-content-center box-stats">
                    <div class="pokemon-info-item">
                        <div class="d-flex">
                            <h3>#<?= $dPokemon->getNumber() ?> <?= $dPokemon->getName() ?></h3>
                        </div>
                    </div>
                    <div class="pokemon-info-item">
                        <div class="d-flex">
                            <h5 class="type-block" style="background-color:#<?= $typeColor01 ?>"><?= $tPokemon ?></h5>
                            <h5 class="type-block" style="background-color:#<?= $typeColor02 ?>"><?= $tPokemonBis ?></h5>
                        </div>
                    </div>
                    <div>
                        <div class="pokemon-info-item stats">
                            <h4>Statistiques</h4>
                        </div>
                        <div class="pokemon-info-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="attribute">
                                        <h5>PV</h5>
                                        <h5>Attaque</h5>
                                        <h5>Défense</h5>
                                        <h5>Attaque Spé.</h5>
                                        <h5>Défense Spé.</h5>
                                        <h5>Vitesse</h5>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="attribute-values">
                                        <h5><?= $dPokemon->getHp() ?></h5>
                                        <h5><?= $dPokemon->getAttack() ?></h5>
                                        <h5><?= $dPokemon->getDefense() ?></h5>
                                        <h5><?= $dPokemon->getSpe_attack() ?></h5>
                                        <h5><?= $dPokemon->getSpe_defense() ?></h5>
                                        <h5><?= $dPokemon->getSpeed() ?></h5>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="skill-bars">
                                        <div class="skill-bar">
                                            <div class="skill-fill" style="width: <?= ($dPokemon->getHp() / 255) * 100 ?>%;"></div>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-fill" style="width: <?= ($dPokemon->getAttack() / 255) * 100 ?>%;"></div>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-fill" style="width: <?= ($dPokemon->getDefense() / 255) * 100 ?>%;"></div>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-fill" style="width: <?= ($dPokemon->getSpe_attack() / 255) * 100 ?>%;"></div>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-fill" style="width: <?= ($dPokemon->getSpe_defense() / 255) * 100 ?>%;"></div>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-fill" style="width: <?= ($dPokemon->getSpeed() / 255) * 100 ?>%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center retour">
            <a href="<?= $baseURL ?>/">Revenir à l'accueil</a>
        </div>
    </div>
<?php else : ?>
    <div class="type-container">
        <h4 class="text-center">Le Pokémon n'a pas été trouvé.</h4>
    </div>
    <div class="text-center retour">
        <a href="<?= $baseURL ?>/">Revenir à la liste</a>
    </div>
<?php endif; ?>