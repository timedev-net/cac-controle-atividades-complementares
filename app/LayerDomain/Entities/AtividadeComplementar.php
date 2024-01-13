<?php

namespace App\LayerDomain\Entities;

class AtividadeComplementar {
    private string $id;
    private string $nome_atividade;
    private string $aluno_id;
    private string $tp_atividade_id;
    private int $ano_letivo;
    private int $periodo_letivo;
    private string $data_inicio;
    private string $data_conclusao;
    private int $carga_horaria;
    private ?string $obs_complementares;
    private ?bool $deferida = null;
    private ?string $razao_indeferimento;
    private ?string $created_at;

    public function __construct(array $data) {

        $this->setId($data['id']);
        if (isset($data['nome_atividade'])) $this->setNomeAtividade($data['nome_atividade']);
        if (isset($data['aluno_id'])) $this->setAlunoId($data['aluno_id']);
        if (isset($data['tp_atividade_id'])) $this->setTpAtividadeId($data['tp_atividade_id']);
        if (isset($data['ano_letivo'])) $this->setAnoLetivo($data['ano_letivo']);
        if (isset($data['periodo_letivo'])) $this->setPeriodoLetivo($data['periodo_letivo']);
        if (isset($data['data_inicio'])) $this->setDataInicio($data['data_inicio']);
        if (isset($data['data_conclusao'])) $this->setDataConclusao($data['data_conclusao']);
        if (isset($data['carga_horaria'])) $this->setCargaHoraria($data['carga_horaria']);
        if (isset($data['obs_complementares'])) $this->setObsComplementares($data['obs_complementares']);
        if (isset($data['deferida'])) $this->setDeferida($data['deferida']);
        if (isset($data['razao_indeferimento'])) $this->setRazaoIndeferimento($data['razao_indeferimento']);
        if (isset($data['created_at'])) $this->setCreatedAt($data['created_at']);
    }

    public function getAllProps(): array {
		$data = ["id" => $this->getId()];
		if (isset($this->nome_atividade)) $data["nome_atividade"] = $this->getNomeAtividade();
		if (isset($this->aluno_id)) $data["aluno_id"] = $this->getAlunoId();
		if (isset($this->tp_atividade_id)) $data["tp_atividade_id"] = $this->getTpAtividadeId();
		if (isset($this->ano_letivo)) $data["ano_letivo"] = $this->getAnoLetivo();
		if (isset($this->periodo_letivo)) $data["periodo_letivo"] = $this->getPeriodoLetivo();
		if (isset($this->data_inicio)) $data["data_inicio"] = $this->getDataInicio();
		if (isset($this->data_conclusao)) $data["data_conclusao"] = $this->getDataConclusao();
		if (isset($this->carga_horaria)) $data["carga_horaria"] = $this->getCargaHoraria();
		if (isset($this->obs_complementares)) $data["obs_complementares"] = $this->getObsComplementares();
		if (isset($this->deferida) || is_null($this->deferida)) $data["deferida"] = $this->getDeferida();
		if (isset($this->razao_indeferimento)) $data["razao_indeferimento"] = $this->getRazaoIndeferimento();
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

	public function getNomeAtividade(): string {
		return $this->nome_atividade;
	}

	public function setNomeAtividade(string $nome_atividade): self {
		$this->nome_atividade = $nome_atividade;
		return $this;
	}

	public function getAlunoId(): string {
		return $this->aluno_id;
	}

	public function setAlunoId(string $aluno_id): self {
		$this->aluno_id = $aluno_id;
		return $this;
	}

	public function getTpAtividadeId(): string {
		return $this->tp_atividade_id;
	}

	public function setTpAtividadeId(string $tp_atividade_id): self {
		$this->tp_atividade_id = $tp_atividade_id;
		return $this;
	}

	public function getCreatedAt(): string|null {
		return $this->created_at;
	}

	public function setCreatedAt(string $created_at): self {
		$this->created_at = $created_at;
		return $this;
	}
	public function getAnoLetivo(): int {
		return $this->ano_letivo;
	}
	public function setAnoLetivo(int $ano_letivo): self {
		$this->ano_letivo = $ano_letivo;
		return $this;
	}
	public function getPeriodoLetivo(): int {
		return $this->periodo_letivo;
	}
	public function setPeriodoLetivo(int $periodo_letivo): self {
		$this->periodo_letivo = $periodo_letivo;
		return $this;
	}
	public function getDataInicio(): string {
		return $this->data_inicio;
	}
	public function setDataInicio(string $data_inicio): self {
		$this->data_inicio = $data_inicio;
		return $this;
	}
	public function getDataConclusao(): string {
		return $this->data_conclusao;
	}
	public function setDataConclusao(string $data_conclusao): self {
		$this->data_conclusao = $data_conclusao;
		return $this;
	}
	public function getCargaHoraria(): int {
		return $this->carga_horaria;
	}
	public function setCargaHoraria(int $carga_horaria): self {
		$this->carga_horaria = $carga_horaria;
		return $this;
	}
	public function getObsComplementares(): string {
		return $this->obs_complementares;
	}
	public function setObsComplementares(string $obs_complementares): self {
		$this->obs_complementares = $obs_complementares;
		return $this;
	}
	public function getDeferida(): bool|null {
		return $this->deferida;
	}
	public function setDeferida(string $deferida): self {
		if ($deferida == '') $this->deferida = null;
		if ($deferida == 'f') $this->deferida = false;
		if ($deferida == 't') $this->deferida = true;
		return $this;
	}
	public function getRazaoIndeferimento(): string {
		return $this->razao_indeferimento;
	}
	public function setRazaoIndeferimento(string $razao_indeferimento): self {
		$this->razao_indeferimento = $razao_indeferimento;
		return $this;
	}
}

