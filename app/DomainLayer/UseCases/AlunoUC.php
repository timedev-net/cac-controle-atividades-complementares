<?php
class AlunoUC {

    protected IUuid $uuid_instance;
    public function __construct($uuid_instance) {
        $this->uuid_instance = $uuid_instance;
    }
    public function create($nome, $matricula_suap, $email) {
        $id = $this->uuid_instance->generate();
        $aluno = new Aluno($id, $nome, $matricula_suap, $email);
        return $aluno;
    }
}