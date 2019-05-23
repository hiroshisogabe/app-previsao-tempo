<?php

namespace Tests\Unit;

use \InvalidArgumentException;
use \RuntimeException;

use App\Cidade;

use App\Traits\CidadeTrait;
use App\Traits\StringTrait;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CidadeTest extends TestCase
{
	use CidadeTrait, StringTrait;

	/** 
	  * @test 
	  */
    public function buscarCidade() {
    	$dadosCidade = $this->buscarCidadeValidaPorNome('cochabamba');
        $this->assertTrue(is_array($dadosCidade));
        $this->assertArrayHasKey('id', $dadosCidade);
        $this->assertArrayHasKey('name', $dadosCidade);

        $this->assertFalse($this->buscarCidadeValidaPorNome('abcdefghijklmnopqrstuvwxyz'));
    }

    /**
     * @test
     */
    public function validarNovaCidade() {
        $dados = array('deveria_ter_chave_id' => 3919968);

        $this->expectException(InvalidArgumentException::class);

        $this->validarCadastroNovaCidade($dados);
    }

	/** 
	  * @test 
	  */
    public function buscarDadosApi() {
    	$cidade = new Cidade;
    	$cidade->id = '3919968';
    	$cidade->nome = 'Cochabamba';

    	$arr = $this->buscarDadosApiPorCidade($cidade);
        $this->assertTrue(is_array($arr));
    }

    /**
     * @test
     */
    public function validarDadosApi() {
        $dados = 'deveria_ser_um_array';

        $this->expectException(RuntimeException::class);

        $this->validarRetornoApi($dados);
    }

}
