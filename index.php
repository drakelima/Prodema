<?php
	include "inicializacao.php";	
	
	$raiz = "";
	
	include "inc/cabecalho.php";
	include "inc/topo.php";
	include "inc/funcoes_sistema.php";
	
	//pegando as noticias
	$xml_noticias = @simplexml_load_file($local_url . $local_site . "noticia/xml/");
	
	//verifica se ha noticias cadastradas
	$verifica = $xml_noticias->item[0];
	if ($verifica) {
		//lista apenas 1 notícia
		for ($i = 0; $i == 0; $i++) {
			$item_destaque = $xml_noticias->item[$i];
			if ($item_destaque) {
				
				//dados da noticia de destaque
				$id_destaque = $item_destaque->id;
				
				$titulo_destaque = $item_destaque->titulo;
				$descricao_destaque = $item_destaque->descricao;
				$imagem_destaque = $item_destaque->imagem;

				if ($imagem_destaque != 'null' and $imagem_destaque != NULL) {
						$tam_titulo = 90;
						$tam_descricao = 245;
				}else{
						$tam_titulo = 60;
						$tam_descricao = 450;
				}
?>
				<a class="destaque" href="<?php echo $raiz?>noticia.php?id=<?=$id_destaque?>">
<?
					if ($imagem_destaque != 'null' and $imagem_destaque != NULL) {
?>				
						<img src="<?=$imagem_destaque?>" alt="<?=substring($titulo_destaque, $tam_titulo)?>"></img>
						<h1 class = "texto1"><?=substring($titulo_destaque, $tam_titulo)?></h1>
						<p class = "texto1_cont"><?=substring($descricao_destaque, $tam_descricao)?></p>
<?
					}else{
?>						
						<h1 class = "texto1"><?=substring($titulo_destaque, $tam_titulo)?></h1>
						<p class = "texto1_cont"><?=substring($descricao_destaque, $tam_descricao)?></p>	
<?
					}
?>
				</a>               
<?
			}else
				break;
		}
	}else{		
?>
					<!--<h1>Nossas novidades</h1>-->
                    <p>
                    	<em>Nenhuma notícia foi encontrada no momento.</em>
					</p>
<?
	}
?>

				<div class="conteudo">
					<h1> Nossas Novidades </h1>
<?
	//verifica se ha noticias cadastradas
	$verifica = $xml_noticias->item[1];
	if ($verifica) {
?>                    				
					<ul>
<?
		//lista das 3 noticias das novidades
		for ($i = 1; $i <= 3; $i++) {
			$item_noticia_novi = $xml_noticias->item[$i];
				if ($item_noticia_novi) {
					
					//dados das noticias das novidades
					$id_noticia_novi = $item_noticia_novi->id;
					
					$dia = strftime("%d", strtotime($item_noticia_novi->data));
					$mes = strftime("%m", strtotime($item_noticia_novi->data));
					$ano = strftime("%Y", strtotime($item_noticia_novi->data));
					$data = $dia." de ".$meses[$mes]." de ".$ano;
				
					$titulo_noticia_novi = $item_noticia_novi->titulo;
					$descricao_noticia_novi = $item_noticia_novi->descricao;
					
					$tam_titulo_novi = 40;
					$tam_descricao_novi = 210;
?>                    
						<li>
							<a href="noticia.php?id=<?=$id_noticia_novi?>"> 
								<p> <?=$data?> </p>
								<h2> <?=substring($titulo_noticia_novi, $tam_titulo_novi)?></h2>
								<p> <?=substring($descricao_noticia_novi, $tam_descricao_novi)?></p>

								<label> [saiba mais] </label>

							</a>
						</li>
<?
				}else
					break;
		}
?>                        
					</ul>
<?
	}else{
?>
                    <br />
                    <p>
                        <em>Nenhuma notícia foi encontrada no momento.</em>
                    </p>
<?
	}
?>            

				</div>	                
<?php
	include "inc/rodape.php";
?>