<?php

namespace App\Http\Controllers;

use App\Cidade;

use App\Traits\CidadeTrait;
use App\Traits\StringTrait;

use Illuminate\Http\Request;

class CidadeController extends Controller
{
    use CidadeTrait, StringTrait;

	public function index() {
		$cidades = Cidade::orderByNome()->get();

		$cidades = $cidades->groupBy(function ($item, $key) {
		    return substr($item->nome, 0, 1);
		});
		
		return view('cidade.index', compact('cidades'));
	}

	public function create(Request $request) {
		$this->validate($request, [
			'cidade' => ['required', 'regex:/[a-z]+/i'],
		]);

		try {
			$dadosCidade = $this->buscarCidadeValidaPorNome($request->input('cidade'));
			$this->validarCadastroNovaCidade($dadosCidade);
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
		
		Cidade::create([
			'id'   => $dadosCidade['id'],
			'nome' => $dadosCidade['name'],
		]);

		return redirect()->back()->with('status', 'A cidade foi cadastrada com sucesso!');
	}

	public function show(Request $request, Cidade $cidade) {
		try {
			$detalhes = $this->buscarDadosApiPorCidade($cidade);
			$this->validarRetornoApi($detalhes);
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}

		return view('cidade.detalhe', compact('cidade', 'detalhes'));
	}

}
