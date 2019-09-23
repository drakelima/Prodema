<?php
	include "inicializacao.php";	
	
	$raiz = "";
	
	//verifica se GET do conteudo da pagina foi setado
	if (isset($_GET['a']) and $_GET['a'] != '') {
		$pagina = $_GET['a'];
		$prefixo = substr($pagina, 0, 2);
	} else {
		header("location: index.php");
		exit;
	}
	
	include "inc/funcoes_sistema.php";
	
	//conteudo da pagina
	$dadosPagina = dadosPagina($pagina, $local_url, $local_site);
	$nome_pagina = $dadosPagina["titulo"];
	
	include "inc/cabecalho.php";
	include "inc/estilo_interna.php";
	include "inc/topo.php";	
?>
					<h1 class="sobre_o_projeto">
						<? echo $nome_pagina; ?>
					</h1>
                    
                    <p class="fonte_apresentacao tamanho_fonte">
                    	<?php echo $dadosPagina["texto"]?>
                    </p>
<?php
	include "inc/rodape.php";
?>