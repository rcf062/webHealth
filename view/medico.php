<?php
	require_once "cabec.php";
	require_once "../model/conexao.class.php";
	require_once "../model/medico.class.php";
	require_once "../model/medicoDAO.class.php";
	require_once "../model/especialidadeDAO.class.php";
	
	$id = 0;
	
	if($_GET)
	{
		$oper = $_GET["oper"];
		
		if($oper == "A")
		{
			$id = $_GET["id"];
			$medico = new medico($id);
			$medicoDAO = new medicoDAO();
			$ret = $medicoDAO->buscarUm($medico);
		}
		
	}
	
	if(isset($_POST["Inserir"]))
	{
		
		$erro = 0;
		
		if($_POST["nome"] == "")
		{
			echo "<script>alert('Preencha o nome')</script>";
			$erro++;
		}
		
		if($_POST["telefone"] == "")
		{
			echo "<script>alert('Preencha o telefone')</script>";
			$erro++;
		}
		
		if($_POST["celular"] == "")
		{
			echo "<script>alert('Preencha o celular')</script>";
			$erro++;
		}
		
		if($_POST["crm"] == "")
		{
			echo "<script>alert('Preencha o numero da crm')</script>";
			$erro++;
		}
		
		if($_POST["email"] == "")
		{
			echo "<script>alert('Preencha o email')</script>";
			$erro++;
		}
		
		if($erro == 0)
		{
		
			if($oper == "A")
			{
					$medico = new medico($id, $_POST["nome"], $_POST["telefone"], $_POST["celular"], $_POST["crm"],
					$_POST["email"], $_POST["especialidade"]);
					$medicoDAO = new medicoDAO();
					$medicoDAO->alterar($medico);
			}
			
			if($oper == "I")
				{
					$medico = new medico(null, $_POST["nome"], $_POST["telefone"], $_POST["celular"], $_POST["crm"],
					$_POST["email"], $_POST["espec"]);
					$medicoDAO = new medicoDAO();
					$medicoDAO->inserir($medico);
				}
				
				header("location:listarMedico.php");
		}		
	
	}//if
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Médicos </title>
	</head>
	<body>
		<h1> Médicos </h1>
		<form action="#" method="POST">
			
			<p>
				<label>Nome:</label>
				<input type="text" name="nome" value = '<?php if($id != 0) echo $ret[0]->nome; ?>' required/>
			</p>
			
			<p>
				<label>Telefone:</label>
				<input type="text" name="telefone" value = '<?php if($id != 0) echo $ret[0]->telefone; ?>' required/>
			</p>
			
			
			<p>
				<label>Celular:</label>
				<input type="text" name="celular" value = '<?php if($id != 0) echo $ret[0]->celular; ?>' required/>
			</p>
			
			
			<p>
				<label>Crm:</label>
				<input type="text" name="crm" value = '<?php if($id != 0) echo $ret[0]->crm; ?>' required/>
			</p>
			
			<p>
				<label>Email:</label>
				<input type="text" name="email" value = '<?php if($id != 0) echo $ret[0]->email; ?>' required/>
			</p>
			
			<p>
				<label>Especialidade:</label>
					<select name="espec">
							
					<?php
						if($oper == "I")
						{
							echo "<option value='0'>Escolha uma especialidade</option>";
						}
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
					</select>
			</p>
			
			<input type="submit" value="Cadastrar" name="Inserir" />
		</form>
	</body>
</html>