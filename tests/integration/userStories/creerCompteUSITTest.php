<?php

namespace tests\integration\userStories;

use App\Exceptions\MotDePasseException;
use App\UserStories\CreerCompteUS;
use App\Validateurs\Validateur;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;


class creerCompteUSITTest extends TestCase
{
    #[Test]
    public function creerCompteUS_MotDePasseValide_True()
    {
        $validateur = new Validateur();
        $creerCompteUS = new creerCompteUS($validateur);
        $result = $creerCompteUS->execute("HEHEHE", "Carabistouille1");
        $this->assertTrue($result);
    }

    #[Test]
    public function creerCompteUS_MotDePasseNonValide_MotDePasseException()
    {
        $validateur = new Validateur();
        $creerCompteUS = new creerCompteUS($validateur);
        $this->expectException(MotDePasseException::class);
        $result = $creerCompteUS->execute("HEHEHE", "carabistouille");
    }
}