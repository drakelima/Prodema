<?php
	/*
	*  Funcao para setar os dados da pagina extra especificada
	*  Parametros:
	*      1 - Alias (identificacao da pagina)
	*      2 - Url do sistema
	*      3 - Alias do site no sistema
	*  Retorno: dados da pagina no array
	*/
	function dadosPagina($alias, $locu, $locs) {
		$dados = array();
		$url = $locu . $locs . "secao/xml/".$alias;

		foreach (@simplexml_load_file($url)->item as $item) { //pegando os itens do xml
			$dados["titulo"] = $item->titulo;
			$dados["texto"] = $item->descricao;
		}

		return $dados;
	}
	
	/*
	*  Funcao para diminuir os caracteres de uma string
	*  Parametros:
	*      1 - string desejada
	*      2 - tamanho maximo
	*  Retorno: string
	*/
	function substring($string, $tamanho){
		if(strlen($string)>$tamanho){
			$resultado = substr($string, 0, $tamanho).'...';	
		}else{
			$resultado = $string;
		}
		
		return $resultado;
	}
?>