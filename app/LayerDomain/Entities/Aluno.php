<?php

namespace App\LayerDomain\Entities;

class Aluno {
    private string $id;
    private string $nome;
    private string $matricula_suap;
    private string $email;
    private string $created_at;

    public function __construct(string $id, string $nome, string $matricula_suap, string $email) {
        $this->setId($id);
        $this->setNome($nome);
        $this->setMatriculaSuap($matricula_suap);
        $this->setEmail($email);
        $this->setCreatedAt(date("Y-m-d H:i:s"));
    }

    public function getAluno(): self {
        return $this;
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

	public function getCreatedAt(): string {
		return $this->created_at;
	}

	public function setCreatedAt(string $created_at): self {
		$this->created_at = $created_at;
		return $this;
	}
}

