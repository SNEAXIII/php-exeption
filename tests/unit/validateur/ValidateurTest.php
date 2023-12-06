<?php

namespace tests\unit\validateur;

use App\Exceptions\MotDePasseException;
use App\Exceptions\NombreException;
use App\Validateurs\Validateur;
use Exception;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ValidateurTest extends TestCase
{
    #[test]
    public function verififierNombre_NombrePositif_True()
    {
        $validateur = new Validateur();
        $result = $validateur->verifierNombre(10);
        $this->assertTrue($result);
    }

    #[test]
    public function verififierNombre_NombreNegatif_NombreException()
    {
        $validateur = new Validateur();
        $this->expectException(NombreException::class);
        $this->expectExceptionMessage("Le nombre doit être strictement positif");
        $result = $validateur->verifierNombre(-10);
    }

    #[test]
    public function verifierMotDePasse_PasswordValide_True()
    {
        $validateur = new Validateur();
        $result = $validateur->verifierMotDePasse("LivreHistorique1");
        $this->assertTrue($result);
    }

    #[test]
    public function verifierMotDePasse_PasswordTropCourt_MotDePasseException()
    {
        $validateur = new Validateur();
        $this->expectException(MotDePasseException::class);
        $this->expectExceptionMessage("Le mot de passe est trop court minimum 8 caracteres");
        $result = $validateur->verifierMotDePasse("Livre");
    }

    #[test]
    public function verifierMotDePasse_PasswordSansMinus_MotDePasseException()
    {
        $validateur = new Validateur();
        $this->expectException(MotDePasseException::class);
        $this->expectExceptionMessage("minus");
        $result = $validateur->verifierMotDePasse("LIVREHISTOIRE1");
    }

    #[test]
    public function verifierMotDePasse_PasswordSansMajus_MotDePasseException()
    {
        $validateur = new Validateur();
        $this->expectException(MotDePasseException::class);
        $this->expectExceptionMessage("majus");
        $result = $validateur->verifierMotDePasse("livrehistoire1");
    }

    #[test]
    public function verifierMotDePasse_PasswordSansChiffres_MotDePasseException()
    {
        $validateur = new Validateur();
        $this->expectException(MotDePasseException::class);
        $this->expectExceptionMessage("chiffre");
        $result = $validateur->verifierMotDePasse("LivreHistoire");
    }

}
