<?php

namespace App\UserStories;

use App\Exceptions\MotDePasseException;
use App\Validateurs\Validateur;

class CreerCompteUS
{
    private Validateur $validateur;
    public function __construct(Validateur $validateur)
    {
        $this->validateur = $validateur;
    }

    public function execute(string $login, string $mdp): bool
    {
        // Test si le login est unique dans le BDD

        // Flemme de coder

        // Test si le mot de passe est valide

        $this->validateur->verifierMotDePasse($mdp);

        // Test si saucisse == merguez
        return true;
    }
}