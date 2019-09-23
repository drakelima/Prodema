<?php
	include "inicializacao.php";	
	
	$raiz = "";
	$busca = 0;
		
	include "inc/cabecalho.php";
	include "inc/topo.php";
	include "inc/funcoes_sistema.php";
	
	if (!isset($_POST['chave']) || $_POST['chave'] == "Palavra-chave") {
		header("location: index.php");
		exit;
	} else {
		$chave = $_POST['chave'];
?>
		<!-- Google search -->
        <script src="//www.google.com/jsapi" type="text/javascript"></script>
		<script type="text/javascript"> 
            google.load('search', '1', {language : 'pt-BR', style : google.loader.themes.GREENSKY});
            google.setOnLoadCallback(function() {
                var customSearchControl = new google.search.CustomSearchControl('003075121585300769612:a9zijgbm0zk');
                customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
                customSearchControl.draw('cse');
				customSearchControl.execute('<?=$chave?>');
			}, true);
		</script>

		<!-- Estilo busca (google) -->
		<link rel="stylesheet" href="<?php echo $raiz?>css/busca.css" type="text/css" />
<?php
	}
?>
  					<h1>Busca geral</h1>
                    <hr />
                    <div id="cse" class="cse">Carregando a busca</div>      

<?php
	include "inc/rodape.php";
?>	