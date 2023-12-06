<?php

namespace tests\unit\userStories;

use App\Exceptions\MotDePasseException;
use App\UserStories\CreerCompteUS;
use App\Validateurs\Validateur;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertTrue;


class UserStoriesTest extends TestCase
{
    #[Test]
    public function creerCompteUS_MotDePasseValide_True()
    {
        // Mocker la classe validateur
        $validateurMock = $this->createMock(Validateur::class);
        // Simuler le résultat de la méthode Verifier MDP
        $validateurMock->method("verifierMotDePasse")->willReturn(true);
        $creerCompteUS = new creerCompteUS($validateurMock);
        $result = $creerCompteUS->execute("HEHEHE", "carabistouille");
        $this->assertTrue($result);
    }

    #[Test]
    public function creerCompteUS_MotDePasseNonValide_MotDePasseException()
    {
        // Mocker la classe validateur
        $validateurMock = $this->createMock(Validateur::class);
        // Simuler le résultat de la méthode Verifier MDP
        $validateurMock
            ->method("verifierMotDePasse")
            ->will($this->throwException(new MotDePasseException));
        $this->expectException(MotDePasseException::class);
        $creerCompteUS = new creerCompteUS($validateurMock);
        $result = $creerCompteUS->execute("HEHEHE", "carabistouille");
    }
}