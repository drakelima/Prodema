			
            <aside>
					
				<div class="sistemas_academicos">

					<h1 class="sistema"> Sistema Acadêmico - UFRN </h1>
					
					<a class="img_acesso" href="http://www.sigaa.ufrn.br/" target="_blank"><img src="<?=$raiz?>img/img_acesso.png" /></a>
				</div>
<?
	//setando o xml dos documentos para listar algumas categorias
	$xml_doc_categorias = simplexml_load_file($local_url . $local_site . "documento/xml/");
?>			
				<div class = "documentos_importantes">

					<h1 class = "documentos"> Documentos Importantes </h1>
					
					<div class = "texto3">
<?
	$verifica_dc = $xml_doc_categorias->item[0];
	if ($verifica_dc){
?>
						<ul>
<?                        
		foreach ( $xml_doc_categorias->item as $categoria ) {
			//dados das categorias/documentos
			$id_cat = $categoria->id;
			$titulo_cat = $categoria->titulo;
			$arquivo_cat = $categoria->linkArquivo;
			
			if ($arquivo_cat == 'null' || $arquivo_cat == NULL) {
?>			
							<li>
                            	- <a title="<?=$titulo_cat?>" href="documento.php?id=<?=$id_cat?>"><?=$titulo_cat?></a>
                            </li>
<?
				$cont_cat++;
			}
			if ($cont_cat == 4)
				break;
		}
?>
						</ul>
					</div>

						
						
					<div class = "mais_documentos">
						<a href = "documentos.php"><p>Mais documentos</p></a>
					</div>
<?
	}else{
?>	
					<p><em>Nenhuma categoria foi encontrada no momento.</em></p>
<?
	}
?>            
				</div>
						
					
				<div class = "midias_sociais">
				
					<h1 class = "curtir"> Mídias Sociais </h1>

					<span class = "bloco_imagem">
						<a class = "imagem" title = "Facebook" href="http://www.facebook.com/prodemaufrn" target="_blank"> <img src = "<?=$raiz?>img/icon_facebook.png" /> </a>
						<a class = "imagem" title = "Flickr - Em breve" href="http://www.flickr.com/" target="_blank"> <img src = "<?=$raiz?>img/icon_rosa.png" /> </a>
						<a class = "imagem" title = "Dropbox - Em breve" href="https://www.dropbox.com/" target="_blank"> <img src = "<?=$raiz?>img/icon_dropbox.png" /> </a>
						<a class = "imagem" title = "Youtube - Em breve" href="https://www.youtube.com/" target="_blank"> <img src = "<?=$raiz?>img/icon_youtube.png" /> </a>
						<a class = "imagem" title = "RSS" href="http://www.sistemas.ufrn.br/gerenciadorportais/public/prodema/noticia/rss/" target="_blank"> <img src = "<?=$raiz?>img/icon_rss.png" /> </a>
					</span>

				</div>
			
			</aside>