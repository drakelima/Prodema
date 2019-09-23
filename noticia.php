<?php
	include "inicializacao.php";	
	
	$raiz = "";
	$abas_menu = "noticias";
	
	//verifica se existe o ID da noticia
	if (isset($_GET['id']) or $_GET['id'] != '')
		$id = $_GET['id'];
	else {
		header("location: noticias.php");
		exit;
	}
	
	include "inc/cabecalho.php";
	include "inc/estilo_interna.php";
	include "inc/topo.php";
	include "inc/funcoes_sistema.php";
	
	$xml_noticia = @simplexml_load_file($local_url . $local_site . "noticia/xml/".$id);
	
	//pega os dados da notícia
	foreach ($xml_noticia->item as $item) {
		$dia = strftime("%d", strtotime($item->data));
		$mes = strftime("%m", strtotime($item->data));
		$ano = strftime("%Y", strtotime($item->data));
		$data = $dia." de ".$meses[$mes]." de ".$ano;
		
		$titulo = $item->titulo;
		$descricao = $item->descricao;
		$imagem = $item->imagem;
		$imagem_p = $item->imagemp;
		$legenda = $item->legenda;
		$fonte = $item->fonte;
		
		//configurando a imagem
		if ($imagem_p != 'null' and $imagem_p != NULL)
			$area_img = $imagem_p;
		else if ($imagem != 'null' and $imagem != NULL)
				$area_img = $imagem;
			else
				$area_img = '';
				
		//configurando a legenda e a fonte		
		if ($legenda != 'null' and $legenda != NULL) {
			if ($fonte != 'null' and $fonte != NULL)
				$texto_legenda = $legenda . "<br>(Foto: " . $fonte . ")";
			else
				$texto_legenda = $legenda;
		} else
			$texto_legenda = '';
		
		$titulo_a = $item->tituloAnexo;
		$anexo = $item->anexo;
		
		//configurando o anexo e o texto do anexo
		if ($anexo != 'null' and $anexo != NULL) {
			if ($titulo_a != 'null' and $titulo_a != NULL)
				$texto_anexo = $titulo_a;
			else
				$texto_anexo = 'Clique aqui para baixar!';
		} else
			$texto_anexo = '';	
	}
?>
                    <h1 class="noticias_lista tamanho_fonte">Notícias</h1>
                    <h1 class="adiada tamanho_fonte"><?=$titulo?></h1>
                    <p class="data tamanho_fonte"><?=$data?></p>
<?
		if($area_img != ''){
?>						<!--Imagem da notícia-->
                    <div class="imagem aumenta">
                        <a href="<?=$imagem?>" title="<?=$texto_legenda?>">
                            <img src="<?=$area_img?>"/>
                            <span class="texto_legenda tamanho_fonte">
                                <p><?=$texto_legenda?></p>
                            </span>
                        </a>
					</div>
<?
		}
?>
                    
                    <!--Conteúdo da página-->
                    <p class="fonte_noticias">
						<?=$descricao?> 
                    </p>
    
<?
	if($texto_anexo != ''){
?>    
                    <span class="arquivo_anexo tamanho_fonte"><strong>Arquivo em anexo:</strong> <a href="<?=$anexo?>"><?=$texto_anexo?></a></span>
<?php
	}

	include "inc/voltar.php";
	include "inc/rodape.php";
?>