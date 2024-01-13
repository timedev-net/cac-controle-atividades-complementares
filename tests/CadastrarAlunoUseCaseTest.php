<?php

use App\LayerDomain\_Exceptions\_EmailValidoException;
use App\LayerDomain\_Exceptions\_ObrigatorioException;
use App\LayerDomain\UseCases\AlunoUseCase;
use App\LayerExternal\Adapters\UuidAdapter;
use App\LayerExternal\Repositories\InMemory\AlunoMemory;
use PHPUnit\Framework\TestCase;

class CadastrarAlunoUseCaseTest extends TestCase {

    protected $repository;
    protected $useCase;
    public function __construct() {
        parent::__construct();
        $this->repository = new AlunoMemory();
        $this->useCase = new AlunoUseCase(new UuidAdapter(), $this->repository);
    }
    public function testInputCorreto_should_AdicionarNovoElementoNoRepositorio() {
        $beforeValue = count($this->repository->getAll([]));
        $this->useCase->cadastrarAluno([
            'nome'           => 'Daniel de Brito Frota',
            'matricula_suap' => '2022206090005',
            'email'          => 'drfrota.adv@gmail.com'
        ]);
        $afterValue = count($this->repository->getAll([]));
        $this->assertNotEquals($beforeValue, $afterValue);
    }
    public function testNomeVazio_should_Lancar_ObrigatorioException() {
        $this->expectException(_ObrigatorioException::class);
        $this->useCase->cadastrarAluno([
            'nome'           => '',
            'matricula_suap' => '2022206090005',
            'email'          => 'drfrota.adv@gmail.com'
        ]);
    }
    public function testMatriculaVazia_should_Lancar_ObrigatorioException() {
        $this->expectException(_ObrigatorioException::class);
        $this->useCase->cadastrarAluno([
            'nome'           => 'Daniel de Brito Frota',
            'matricula_suap' => '',
            'email'          => 'drfrota.adv@gmail.com'
        ]);
    }
    public function testEmailInvalido_should_Lancar_EmailValidoException() {
        $this->expectException(_EmailValidoException::class);
        $this->useCase->cadastrarAluno([
            'nome'           => 'Daniel de Brito Frota',
            'matricula_suap' => '2022206090005',
            'email'          => 'drfrotagmail.com'
        ]);
    }
}