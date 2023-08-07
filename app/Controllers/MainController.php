<?php

require_once __DIR__."/../Models/Pokemon.php";
require_once __DIR__."/../Models/Type.php";

class MainController
{
    // fonction qui permet d'afficher la bonne vue
    private function show($viewName, $viewData=[])
    {
        $baseURL = dirname($_SERVER['SCRIPT_NAME']);
        require __DIR__."/../views/header.tpl.php";
        require __DIR__."/../views/$viewName.tpl.php";
    }

    public function home() {
        $chara = new Pokemon();
        $charaList = $chara->findAll();

        $this->show('home',[
            'charaList' => $charaList
        ]
    );
    }

    public function types() {
        $type = new Type();
        $typeList = $type->findAll();

        $this->show('types',[
            'typeList' => $typeList
        ]
    );
    }

    public function details($params) {
        $detailsPokemon = new Pokemon();
        $dPokemon = $detailsPokemon->find($params['number']);
        $tPokemon = $detailsPokemon->findTypeByNumber($params['number']);
        // var_dump($tPokemon);

        $this->show('details', [
            'pokemonName' => $params['number'],
            'dPokemon' => $dPokemon,
            'tPokemon' => $tPokemon
        ]);
    }

    public function liste() {
        $chara = new Pokemon();
        $charaList = $chara->findAll();

        $this->show('liste',[
            'charaList' => $charaList
        ]);
    }

    // public function err404() {
    //      $this->show('404');
    // }
}