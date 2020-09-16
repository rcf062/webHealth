<?php
	require_once "../model/conexao.php";
	require_once "../model/especialidadeDAO.class.php";
	require_once "../model/especialidade.class.php";
	$id = 0;
	if($_GET)
	{
		$oper = $_GET["oper"];
		if($oper != "I")
		{
			$id = $_GET["idespecialidade"];
		}
		if($oper == "E")
		{
			
			$espec = new especialidade($id,null);
			$especDAO = new especialidadeDAO();
			$especDAO->excluir($espec);
			header("location:listarEspecialidade.php");
		}
		else if($oper == "L")
		{
			
			$espec = new especialidade($idespecialidade,null);
			$especDAO = new especialidadeDAO();
			$especDAO->excluirLogica($espec);
			header("location:listarEspecialidade.php");
		}
		else if($oper == "A")
		{
			//buscar banco
			$espec = new especialidade($espec);
			$especDAO = new especialidadeDAO();
			$ret = $catDAO->buscarUm($espec);
		}
		
	}
	
	if($_POST)
	{
		
		if($_POST["descricao"] != "")
		{
			switch($oper)
			{
				case "I":
						$espec = new especialidade(null, $_POST["descricao"], "A");
						$especDAO = new especialidadeDAO();
						$especDAO->inserir($espec);
						break;
				case "A":
						$espec =  new categoria($id, $_POST["descricao"]);
						$especDAO = new especialidadeDAO();
						$especDAO->alterar($espec);
			}
			header("location:listarEspecialidade.php");
		}
		else
		{
			echo "<script>alert('Preencha a descricao');</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Especialidade</title>
	</head>
	<body>
		<h1>Especialidade</h1>
		<form action="#" method="POST">
			
			<p>
				<label>Descricao:</label>
				<input type="text" name="descricao" value = '<?php if($id != 0) echo $ret[0]->descricao; ?>' required/>
			</p>
			<input type="submit" value="Enviar" />
		</form>
	</body>
</html>