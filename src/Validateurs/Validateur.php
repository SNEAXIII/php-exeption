<?php

namespace App\Validateurs;

use App\Exceptions\MotDePasseException;
use App\Exceptions\NombreException;
use Exception;
use function PHPUnit\Framework\throwException;

class Validateur
{
    /**
     * @throws NombreException
     */
    public function verifierNombre(int $nb): bool
    {
        // Tester si le nombre est strictement positif
        if ($nb < 0) {
            throw new NombreException("Le nombre doit être strictement positif");
        }
        return true;
    }

    /**
     * @throws MotDePasseException
     */
    public function verifierMotDePasse(string $motDePasse): bool
    {
        if (strlen($motDePasse) < 8) {
            throw new MotDePasseException("Le mot de passe est trop court minimum 8 caracteres");
        }
        if (!preg_match(pattern: "/[A-Z]/", subject: $motDePasse)) {
            throw new MotDePasseException("Le mot de passe doit contenir au moins une majus");
        }
        if (!preg_match(pattern: "/[a-z]/", subject: $motDePasse)) {
            throw new MotDePasseException("Le mot de passe doit contenir au moins une minus");
        }
        if (!preg_match(pattern: "/[0-9]/", subject: $motDePasse)) {
            throw new MotDePasseException("Le mot de passe doit contenir au moins un chiffre");
        }
        return true;
    }
}