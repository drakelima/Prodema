
                <form class="bloco2" id="form_busca" name="form_busca" method="post" action="<?=$raiz?>busca.php"> 
					<input type="text" id="chave" name="chave" value="palavra-chave..." onClick="limpaCampo(this, 'palavra-chave...')" onBlur="preencheCampo(this, 'palavra-chave...')" class="campo_texto"/>
                    <button class="lupa" title="Buscar" onClick="verifBusca()"><img src="img/icon_lupa.png"/></button>
				</form>