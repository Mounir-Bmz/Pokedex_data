<?php

require_once __DIR__."/../utils/Database.php";

class Pokemon
{
    private $name;
    private $hp;
    private $attack;
    private $defense;
    private $spe_attack;
    private $spe_defense;
    private $speed;
    private $number;
    private $type_name;
    private $type_color;

    public function findAll()
    {
        $sql = '
            SELECT * FROM `pokemon`
        ';
        // Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();
        // j'execute ma requête pour récupérer les 
        $pdoStatement = $pdo->query($sql);
        // fetchAll avec l'argument FETCH_CLASS renvoie un array qui contient tous mes résultats sous la forme d'objets de la classe spécifiée en 2e argument
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'pokemon');

        return $results;
    }

    public function find($number)
    {
        $sql = '
            SELECT * 
            FROM `pokemon`
            WHERE number = ' . $number;
            
        // Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();
        // j'execute ma requête pour récupérer les 
        $pdoStatement = $pdo->query($sql);
        // fetchAll avec l'argument FETCH_CLASS renvoie un array qui contient tous mes résultats sous la forme d'objets de la classe spécifiée en 2e argument
        $result = $pdoStatement->fetchObject('Pokemon');

        return $result;
    }

    public function findTypeByNumber($number)
    {
        $sql = '
            SELECT pokemon.*, type.name AS type_name, type.color AS type_color
            FROM `pokemon`
            LEFT JOIN `pokemon_type` ON pokemon.number = pokemon_type.pokemon_number
            LEFT JOIN `type` ON pokemon_type.type_id = type.id
            WHERE pokemon.number = ' . $number;

        // Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();
        // j'execute ma requête pour récupérer les 
        $pdoStatement = $pdo->query($sql);
        // fetchAll avec l'argument FETCH_CLASS renvoie un array qui contient tous mes résultats sous la forme d'objets de la classe spécifiée en 2e argument
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Pokemon');

        return $result;
    }


    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of hp
     */ 
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * Get the value of attack
     */ 
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * Get the value of defense
     */ 
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Get the value of spe_attack
     */ 
    public function getSpe_attack()
    {
        return $this->spe_attack;
    }

    /**
     * Get the value of spe_defense
     */ 
    public function getSpe_defense()
    {
        return $this->spe_defense;
    }

    /**
     * Get the value of speed
     */ 
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Get the value of number
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get the value of type_name
     */
    public function getTypeName()
    {
        return $this->type_name;
    }

    /**
     * Get the value of type_name
     */
    public function getTypeColor()
    {
        return $this->type_color;
    }
}