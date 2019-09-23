<?php
	include "inicializacao.php";	
	
	$raiz = "";
	$abas_menu = "sobre_curso";
	
	if (isset($_GET['id']) and $_GET['id'] != '')
		$id = $_GET['id'];
	else {
		header("location: documentos.php");
		exit;
	}
	
	include "inc/cabecalho.php";
	include "inc/estilo_interna.php";
	include "inc/topo.php";
	
	//setando o xml os documentos da categoria selecionada
	$xml_documento = simplexml_load_file($local_url . $local_site . "documento/xml/".$id);
	
	$verifica = $xml_documento->item[0];
?>
                
					<h1 class="documento"> Documentos </h1>
<?
	if ($verifica) {
		$titulo_categoria = $verifica->tituloPai;
?>
                    <h1 class="process_seletivo tamanho_fonte"> <?=$titulo_categoria?> </h1>
<?
	}
?>                    
                    <p class="fonte_documento tamanho_fonte"> Veja abaixo os documentos disponilizados para baixar desta categoria: </p>
<?
	if($verifica){
?>    
                    <ul class="ul_documento">
<?
		foreach ($xml_documento->item as $link) {
			//dados das categorias/documentos
			$id_sub = $link->id;
			$titulo_sub = $link->titulo;
			$arquivo_sub = $link->linkArquivo;
?>                    
                        <li>
<?
							if ($arquivo_sub == 'null' || $arquivo_sub == NULL) {
?>                        
								<a class="opcao tamanho_fonte" title="<?=$titulo_sub?>" href="documento.php?id=<?=$id_sub?>"><?=$titulo_sub?></a>
<?
							}else{
?>                
								<a class="opcao tamanho_fonte" title="<?=$titulo_sub?>" href="<?=$arquivo_sub?>" target="_blank"><?=$titulo_sub?></a>
<?
							}
?>                                        
                        </li>                      
<?
		}
?>                        
                    </ul>
<?
	}else{
?>
					<p class="tamanho_fonte"><em>Nenhum documento foi encontrado nesta categoria.</em></p>
<?php
	}

	include "inc/voltar.php";
	include "inc/rodape.php";
?>