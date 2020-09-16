<?php
	require_once "../model/conexao.class.php";
	require_once "../model/especialidadeDAO.class.php";
		
	require_once "cabec.php";
	if($_POST)
	{
		header("location:agenda.php?espec={$_POST['espec']}&data={$_POST['data']}");
	}
?>
		<section id="1">
		<form action="#" method="POST">
        <label>Especialidade:</label>
			
		<select name="espec">
							
				<?php
					
						echo "<option value='0'>Escolha uma especialidade</option>";
					
					//carregar as categorias buscando no BD
					$especDAO = new especialidadeDAO();
					$retorno = $especDAO->buscarTodas();
					if(count($retorno) > 0)
					{
						foreach($retorno as $dado)
						{
							if($dado->idespecialidade == $ret[0]->espec_idespecialidade)
							{
								echo "<option value='{$dado->idespecialidade} ' selected >{$dado->descricao}</option>";
							}
							else
							{
								echo "<option value='{$dado->idespecialidade}' >{$dado->descricao}</option>";
							}
								
						}
					}
				?>
				</select><br><br><br>
		
		
		<br><br><br>
		<label>Escolha a data para o seu atendimento:</label>
		<input type="date" name="data"><br><br><br>
		
		
		
		
		<br><br><input type="submit"  value="Escolher horário">
		</form>
		</section>
    </body>

</html>