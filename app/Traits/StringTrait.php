<?php

namespace App\Traits;

trait StringTrait
{

	/**
	 * Replace accented characters with non accented
	 *
	 * @param String $str
	 * @return String
	 * @link https://pt.stackoverflow.com/questions/858/refatora%C3%A7%C3%A3o-de-fun%C3%A7%C3%A3o-para-remover-pontua%C3%A7%C3%A3o-espa%C3%A7os-e-caracteres-especiais
	 */
	public function limparAcentos(String $str) {
		$str = preg_replace('/[áàãâä]/ui', 'a', $str);
		$str = preg_replace('/[éèêë]/ui', 'e', $str);
		$str = preg_replace('/[íìîï]/ui', 'i', $str);
		$str = preg_replace('/[óòõôö]/ui', 'o', $str);
		$str = preg_replace('/[úùûü]/ui', 'u', $str);
		$str = preg_replace('/[ç]/ui', 'c', $str);
		$str = preg_replace('/[^a-z0-9]/i', '_', $str);
		$str = preg_replace('/_+/', '_', $str);

		return $str;
	}

}
