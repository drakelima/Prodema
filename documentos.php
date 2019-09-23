<?php
	include "inicializacao.php";	
	
	$raiz = "";
	$abas_menu = "sobre_curso";
	
	include "inc/cabecalho.php";
	include "inc/estilo_interna.php";
	include "inc/topo.php";
	
	//setando o xml dos documentos (na raiz)
	$xml_documentos = simplexml_load_file($local_url . $local_site . "documento/xml/");
?>

                    <h1 class = "documentos_lista"> Documentos </h1>
    
                    <p class = "fonte_documentos_lista tamanho_fonte"> Aqui você encontrará todos os documentos disponíveis para baixar: </p>
<?
	$verifica = $xml_documentos->item[0];
	if ($verifica){
?>    
                    <ul class = "ul_documentos_lista">
<?                    
		foreach ( $xml_documentos->item as $link ) {
			//dados das categorias/documentos
			$id = $link->id;
			$titulo_link = $link->titulo;
			$arquivo = $link->linkArquivo;
?>			
                        <li>
<?
			if ($arquivo == 'null' || $arquivo == NULL) {
?>                        
                        	<a class="opcao tamanho_fonte" href="<?php echo $raiz?>documento.php?id=<?=$id?>"><?=$titulo_link?></a>
<?
			}else{
?>
							<a class="opcao tamanho_fonte" href="<?=$arquivo?>" target="_blank"><?=$titulo_link?></a>
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
					<p class="tamanho_fonte"><em>Nenhum documento foi encontrado no momento.</em></p>
<?php
	}
	include "inc/rodape.php";
?>