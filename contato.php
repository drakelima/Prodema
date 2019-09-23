<?php
	include "inicializacao.php";	
	
	$raiz = "";
	$abas_menu = "fale_conosco";
	
	include "inc/cabecalho.php";
	include "inc/estilo_interna.php";
	include "inc/topo.php";
	
	if (isset($_POST['cp_nome'])) {

		// Pegar dados do $_POST
		$nome = $_POST['cp_nome'];
		$email = $_POST['cp_email'];
		$assunto = $_POST['cp_assunto'];

		$mensagem = "<strong>Assunto: ".$assunto."</strong><br /><br />".$_POST['cp_mensagem'];

		// E-mail para o envio
		$destino = $email_contato;

		$assunto_externo = "[Prodema] Contato do site";

		// Enviar o e-mail
		if (mail($destino, $assunto_externo, $mensagem, "Content-type: text/html; charset=utf-8\r\nFrom: $nome <$email>\r\n")) {
			header("Location: contato.php?msg=1");
		} else {
			header("Location: contato.php?msg=2");
		}

		exit;
	}
?>
                    <h1 class = "contato"> Contato </h1>
                    <p class="tamanho_fonte"> Para obter informações adicionais, esclarecer alguma dúvida ou fazer sugestões, entre em contato conosco pelo formulário
                    abaixo:</p>
<?
	if (isset($_GET["msg"]) and ($_GET["msg"] > 0 and $_GET["msg"] < 3)) {

		$msg = $_GET["msg"];
		
		//mensagens de envio
		$texto = array(
			1 => 'Mensagem enviada com sucesso!',
			2 => 'Erro ao enviar a mensagem. Por favor tente mais tarde!'
		);
		
		if ($msg == 1)
			$classe = "ok";		
?> 
		 		<div id="mensagemEnvio" class="<?=$classe?>">
                    <p>
                        <b>*</b> <?=$texto[$msg]?>
                    </p>
                </div>
<?
	}
?>                   
    
                    <form class="form_contato" name="form_contato" method="post" action="contato.php">
                        <span class="area_campo">
                            <label>Nome: </label>
                            <input type="text" id="cp_nome" name="cp_nome" value=""/>    
                        </span>
                        <span class="area_campo">
                            <label>Email: </label>
                            <input type="text" id="cp_email" name="cp_email" value ="" onchange="validaEmail(this)"/>
                        </span>
                        <span class = "area_campo">
                            <label>Assunto: </label>
                            <input type="text" id="cp_assunto" name="cp_assunto" value =""/>
                        </span>
                        <span class="area_campo_maior">
                            <label> Mensagem: </label>
                            <textarea id="cp_mensagem" name="cp_mensagem"></textarea>
                        </span>
                        <span class = "area_botoes">
                            <button type="button" onclick="verifContato()">Enviar </button>
                            <button type="reset">Limpar </button>
                        </span>
                    </form>
<?php
	include "inc/rodape.php";
?>