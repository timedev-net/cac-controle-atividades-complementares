<?php

namespace App\LayerDomain\Entities;

class Aluno {
    private string $id;
    private string $nome;
    private string $matricula_suap;
    private string $email;
    private ?string $created_at;

    public function __construct(array $data) {
        $this->setId($data['id']);
        $this->setNome($data['nome']);
        $this->setMatriculaSuap($data['matricula_suap']);
        $this->setEmail($data['email']);
        if (isset($data['created_at'])) $this->setCreatedAt($data['created_at']);
    }

    public function getAllProps(): array {
		$data = [
			"id" => $this->getId(),
			"nome" => $this->getNome(),
			"matricula_suap" => $this->getMatriculaSuap(),
			"email" => $this->getEmail()
		];
		if (isset($this->created_at)) $data["created_at"] = $this->getCreatedAt();
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

	public function getMatriculaSuap(): string {
		return $this->matricula_suap;
	}

	public function setMatriculaSuap(string $matricula_suap): self {
		$this->matricula_suap = $matricula_suap;
		return $this;
	}

	public function getEmail(): string {
		return $this->email;
	}

	public function setEmail(string $email): self {
		$this->email = $email;
		return $this;
	}

	public function getCreatedAt(): string|null {
		return $this->created_at;
	}

	public function setCreatedAt(string $created_at): self {
		$this->created_at = $created_at;
		return $this;
	}
}

