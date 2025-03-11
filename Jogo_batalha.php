<?php

class Personagem {

    private $nome;
    private $vida;
    private $ataque;
    private $defesa;
    private $chanceCritico;
    private $multiplicadorCritico;

    public function __construct($nome, $vida, $ataque, $defesa, $chanceCritico, $multiplicadorCritico) {
        $this->nome = $nome;
        $this->vida = $vida;
        $this->ataque = $ataque;
        $this->defesa = $defesa;
        $this->chanceCritico = $chanceCritico;
        $this->multiplicadorCritico = $multiplicadorCritico;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getVida() {
        return $this->vida;
    }
    
    public function setVida($vida) {
        $this->vida = $vida;
    }

    public function getAtaque() {
        return $this->ataque;
    }
    
    public function getDefesa() {
        return $this->defesa;
    }

    public function getChanceCritico() {
        $sorte = rand(1, 100);
        return $sorte <= $this->chanceCritico;
    }
    
    public function getMultiplicadorCritico() {
        return $this->multiplicadorCritico;
    }

    public function atacar($inimigo) {

        $dano = $this->getAtaque();

        if ($this->getChanceCritico()) {
            $dano = $dano * $this->getMultiplicadorCritico();
            echo "**Ataque Crítico!** ";
        }


        $inimigo->setVida($inimigo->getVida() - $dano);
        echo "{$this->getNome()} ataca {$inimigo->getNome()}!<br>";
        echo "{$inimigo->getNome()}: Vida " . $inimigo->getVida() . "<br><br>";
    }
}

class Jogo {

    private $personagens;
    private $jogadorAtual;

    public function __construct($personagens) {
        $this->personagens = $personagens;
        $this->jogadorAtual = 0;
    }

    public function getJogadorAtual() {
        return $this->jogadorAtual;
    }

    public function setJogadorAtual($jogadorAtual) {
        $this->jogadorAtual = $jogadorAtual;
    }

    public function iniciarJogo() {
        echo "**Início do Jogo!**<br>";

        foreach ($this->personagens as $personagem) {
            echo "{$personagem->getNome()}: Vida {$personagem->getVida()}<br>";
        }
        
        echo "<br>";
    }
    
    public function realizarTurno() {
        $atacante = $this->personagens[$this->getJogadorAtual()];
        $defensor = $this->personagens[($this->getJogadorAtual() + 1) % 2];

        echo "**Turno de {$atacante->getNome()}**<br>";
        $atacante->atacar($defensor);

        $this->setJogadorAtual(($this->getJogadorAtual() + 1) % 2);
    }
    
    public function verificarVencedor() {
        foreach ($this->personagens as $personagem) {
            if ($personagem->getVida() <= 0) {
                return $this->personagens[($this->getJogadorAtual() + 1) % 2];
            }
        }
        return null;
    }

}

// Criação de personagens
$heroi = new Personagem("Herói", 100, 10, 5, 20, 10);
$monstro = new Personagem("Monstro", 80, 8, 3, 10, 15);

// Criação do jogo
$jogo = new Jogo([$heroi, $monstro]);

// Início do jogo
$jogo->iniciarJogo();
$vencedor = null;

// Loop do jogo
while (!$vencedor) {
    $jogo->realizarTurno();
    $vencedor = $jogo->verificarVencedor();
}

// Exibição do vencedor
echo "**{$vencedor->getNome()} venceu!**<br>";