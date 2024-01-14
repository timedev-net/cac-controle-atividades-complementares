<?php
use App\LayerDomain\_Exceptions\_EmailValidoException;
use App\LayerDomain\_Exceptions\_ObrigatorioException;
use App\LayerDomain\UseCases\Aluno\CadastrarAlunoUseCase;
use App\LayerExternal\Adapters\UuidAdapter;
use App\LayerExternal\Repositories\InMemory\AlunoMemory;
use PHPUnit\Framework\TestCase;
class CadastrarAlunoUseCaseTest extends TestCase {
    private $repoMemory;
    private $useCase;
    public function __construct() {
        parent::__construct();
        $this->repoMemory = new AlunoMemory();
        $this->useCase = new CadastrarAlunoUseCase(new UuidAdapter(), $this->repoMemory);
    }
    public function testInputCorreto_should_AdicionarNovoElementoNoRepositorio() {
        $beforeValue = count($this->repoMemory->getAll([]));
        $this->useCase->execute([
            'nome'           => 'Felipe Tiago Ramos',
            'matricula_suap' => '2024436934748',
            'email'          => 'felipe.tiago.ramos@tecvap.com.br'
        ]);
        $afterValue = count($this->repoMemory->getAll([]));
        $this->assertNotEquals($beforeValue, $afterValue);
    }
    public function testNomeVazio_should_Lancar_ObrigatorioException() {
        $this->expectException(_ObrigatorioException::class);
        $this->useCase->execute([
            'nome'           => '',
            'matricula_suap' => '2024436934748',
            'email'          => 'felipe.tiago.ramos@tecvap.com.br'
        ]);
    }
    public function testEmailInvalido_should_Lancar_EmailValidoException() {
        $this->expectException(_EmailValidoException::class);
        $this->useCase->execute([
            'nome'           => 'Felipe Tiago Ramos',
            'matricula_suap' => '2024436934748',
            'email'          => 'felipe.tiago.ramostecvap.com.br'
        ]);
    }

    public function testMatriculaVazia_should_Lancar_ObrigatorioException() {
        $this->expectException(_ObrigatorioException::class);
        $this->useCase->execute([
            'nome'           => 'Felipe Tiago Ramos',
            'matricula_suap' => '',
            'email'          => 'felipe.tiago.ramos@tecvap.com.br'
        ]);
    }
}
