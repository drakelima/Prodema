    </head>
    <body>			
        <div class="bg">		
            <header>
                <div class="bloco">
                    <a class="img_logo" title="Acesse a página inicial" href="index.php">
                        <img src="<?=$raiz?>img/layout_prodema.png" />
                    </a>
                    <section class="direita">
						<?
                            /*include de acessibilidade e de busca*/
                            include $raiz."inc/acessibilidade.php";
                            include $raiz."inc/busca.php";
                        ?>
                    </section>
                </div>						
            </header>
			<?
                include $raiz."inc/menu.php";
            ?>
            <content id="conteudo">
				<? 
                    include $raiz."inc/lateral.php"; 
                ?>				
                <section class="conteudo_total">