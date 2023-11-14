<?php

namespace App\LayerDomain\Entities;

class TpAtividade {
    private string $id;
    private string $nome;
    private string $curricular;
    private string $limite_hora;

    public function __construct(array $data) {
        $this->setId($data['id']);
        $this->setNome($data['nome']);
        $this->setCurricular($data['curricular']);
        $this->setLimiteHora($data['limite_hora']);
    }

    public function getAllProps(): array {
		$data = [
			"id" => $this->getId(),
			"nome" => $this->getNome(),
			"curricular" => $this->getCurricular(),
			"limite_hora" => $this->getLimiteHora()
		];
		return $data;
    }

	public function getId(): string {
		return $this->id;
	}

	public function setId(string $id): self {
		$this->id = $id;
		return $this;
	}

	public function getNome(): string {
		return $this->nome;
	}

	public function setNome(string $nome): self {
		$this->nome = $nome;
		return $this;
	}

	public function getCurricular(): string {
		return $this->curricular;
	}

	public function setCurricular(string $curricular): self {
		$this->curricular = $curricular;
		return $this;
	}

	public function getLimiteHora(): string {
		return $this->limite_hora;
	}

	public function setLimiteHora(string $limite_hora): self {
		$this->limite_hora = $limite_hora;
		return $this;
	}

}

