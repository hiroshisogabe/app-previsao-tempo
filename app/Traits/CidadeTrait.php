<?php

namespace App\Traits;

use App\Cidade;

trait CidadeTrait
{
	public function buscarCidadeValidaPorNome(String $cidade) {
		$cidade = strtolower($this->limparAcentos($cidade));

        $strJson = file_get_contents(public_path('data/city.list.json'));
        $arr = json_decode($strJson, true);

        foreach ($arr as $dados) {
            
            if (strtolower($this->limparAcentos($dados['name'])) == $cidade) {
            	return $dados;
            }
        }

        return false;
	}

	public function validarCadastroNovaCidade($dadosCidade) {
		if (!$dadosCidade || !is_array($dadosCidade) || !array_key_exists('id', $dadosCidade)) {
			throw new \InvalidArgumentException('A cidade informada não é válida');
		}

		if (Cidade::find($dadosCidade['id'])) {
			throw new \RuntimeException('A cidade já estava cadastrada!');
		}
	}

	public function buscarDadosApiPorCidade(Cidade $cidade) {
		$url = env('API_URL').'?';
		$url.= 'APPID='.env('API_KEY');
		$url.= '&mode='.env('API_MODE');
		$url.= '&units='.env('API_UNITS');
		$url.= '&lang='.env('API_LANG');
		$url.= '&id='.$cidade->id;

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$strJson = curl_exec($curl);
		curl_close($curl);

		$arr = json_decode($strJson, true);

		return $arr;
	}

	public function validarRetornoApi($detalhes) {
		if (!$detalhes || !is_array($detalhes) || !array_key_exists('cod', $detalhes)) {
			throw new \RuntimeException('Ocorreu um problema ao acessar os dados da cidade.');
		}

		if ($detalhes['cod'] != '200') {
			throw new \RuntimeException(
				'Ocorreu um problema ao acessar os dados da cidade ['.
				(array_key_exists('message', $detalhes) ? $detalhes['message'] : 'Indefinido').
				'].'
			);
		}
	}

}
