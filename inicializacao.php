<?php
	error_reporting(0);
	ob_start();

	global $raiz, $local_url, $local_site, $email_contato, $pagina, $nome_pagina, $busca;

	$local_url = "http://www.sistemas.ufrn.br/gerenciadorportais/public/";
	$local_site = "prodema/";

	//meses escritos
	$meses = array('01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Mar&ccedil;o', '04' => 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');
	
	//abas do menu
	$abas_menu = array('sobre_curso', 'estrutura_de_rede', 'estrutura_curricular', 'noticias', 'fale_conosco');

	$email_contato = "contato@profletras.ufrn.br"; //envio do formulario

	$busca = 1;
?>