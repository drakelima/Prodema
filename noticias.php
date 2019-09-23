<?php
	include "inicializacao.php";	
	
	$raiz = "";
	$abas_menu = "noticias";
	
	include "inc/cabecalho.php";
	include "inc/estilo_interna.php";
	include "inc/topo.php";
	include "inc/funcoes_sistema.php";
	
	//pegando as noticias
	$xml_noticias = simplexml_load_file($local_url . $local_site . "noticia/xml/");
?>
               
                    <h1 class="noticias_lista">Notícias</h1>
                    <p class="fonte_noticias_lista tamanho_fonte">Veja Abaixo as Ultimas Novidades do Profletras:</p>
<?
	$verifica = $xml_noticias->item[0];
	if ($verifica){
?>    
                    <ul class="ul_noticias_lista">
<?
		//lista as 30 primeiras noticias para serem exibidas na interna de noticias
		for ($i = 0; $i <= 29; $i++) {
			$item_noticia = $xml_noticias->item[$i];
			if ($item_noticia) { //perguntar sobre essa condição, pq aqui com o for aparece e usando o foreach no profletras nao é usado
				$id_noticia = $item_noticia->id;
				$titulo_noticia = $item_noticia->titulo;
				$data_noticia = strftime("%d/%m/%Y", strtotime($item_noticia->data));
?>
                        <li><a class="opcao tamanho_fonte" href="<?php echo $raiz?>noticia.php?id=<?=$id_noticia?>"><strong><?=$data_noticia?> - </strong> <?=substring($titulo_noticia, 90)?></a> </li>
<?
			}else
				break;
		}
?>                        
					</ul>
<?
	}else{
?>
					<p class="tamanho_fonte"><em>Nenhuma not&iacute;cia foi encontrada no momento.</em></p>
<?php
	}
	include "inc/rodape.php";
?>