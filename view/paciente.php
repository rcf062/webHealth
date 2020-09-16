<?php

	require_once "../model/conexao.class.php";
	require_once "../model/paciente.class.php";
	require_once "../model/pacienteDAO.class.php";
	require_once "../model/bairroDAO.class.php";

	$id = 0;
	
	if($_GET)
	{
		$oper = $_GET["oper"];
		
		if($oper == "A")
		{
			$id = $_GET["id"];
			$paciente = new paciente($id);
			$pacienteDAO = new pacienteDAO();
			$ret = $pacienteDAO->buscarUm($paciente);
		}
	}
	
	
	if(isset($_POST["salvar"]))
	{
		
		$erro = 0;
			
			if($_POST["nome"] == "")
			{
				echo "<script>alert('Preencha o nome')</script>";
				$erro++;
			}
			
			if($_POST["endereco"] == "")
			{
				echo "<script>alert('Preencha o endereço')</script>";
				$erro++;
			}
			
			if($_POST["cpf"] == "")
			{
				echo "<script>alert('Preencha o cpf')</script>";
				$erro++;
			}
			
			if($_POST["rg"] == "")
			{
				echo "<script>alert('Preencha o rg')</script>";
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
			
			if($_POST["num_sus"] == "")
			{
				echo "<script>alert('Preencha o numero do seu cartão do sus')</script>";
				$erro++;
			}
			
			if($_POST["datanasc"] == "")
			{
				echo "<script>alert('Preencha a data de nascimento')</script>";
				$erro++;
			}
			
			if($_POST["email"] == "")
			{
				echo "<script>alert('Preencha o seu email')</script>";
				$erro++;
			}
            if($_POST["senha"] == "")
			{
				echo "<script>alert('Preencha a senha')</script>";
				$erro++;
			}
			
		if($erro == 0)
		{
			
			if($oper == "A")
			{
				//buscar banco
				$paciente = new paciente($id, $_POST["bairro"], $_POST["nome"], $_POST["endereco"], $_POST["cpf"], 
				$_POST["rg"], $_POST["telefone"], $_POST["celular"], $_POST["num_sus"], 
				$_POST["datanasc"], $_POST["email"],null);
				$pacienteDAO = new pacienteDAO();
				$ret = $pacienteDAO->buscarUm($paciente);
			}
			
			if($oper == "I")
			{
				$paciente = new paciente(null, $_POST["bairro"], $_POST["nome"], $_POST["endereco"], $_POST["cpf"], 
				$_POST["rg"], $_POST["telefone"], $_POST["celular"], $_POST["num_sus"], 
				$_POST["datanasc"], $_POST["email"],md5($_POST["senha"]));
				$pacienteDAO = new pacienteDAO();
				$pacienteDAO->inserir($paciente);
			}
			
			//header("location:listarPaciente.php");
		}
	}//if
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Paciente </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut Icon" href="Icons/heartbeat.png">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Hammersmith+One&display=swap" rel="stylesheet">
	</head>
	<body background='images/fundo.jpg'>
	
		<table>
			<td><img src="Icons/heartbeat.png" alt="Icone"></td>
			<td>
				<h2 class="logo"><a href="index.html" class="a">WEBHEALTH 2019</h2>
				</h2></a>
			</td>
		</table>
		<hr style="border-top: 2px #000 solid; margin-top: 0px; margin-bottom: 0px;">
		<br>
	   <nav class="menu">
          <ul>
              <li><a href="paciente.php"><img class="icon" src="Icons/004-notepad.png" alt="Icone 1">Cadastro</a></li>
              <li><a href="agendamento.php"><img class="icon" src="Icons/004-notepad.png" alt="Icone 2">Agendamento</a></li>
              <li><a href="contato.html"><img class="icon" src="Icons/005-mail.png" alt="Icone 3">Contato</a></li>
              <li><a href="lista.html"><img class="icon" src="Icons/002-menu.png" alt="Icone 4">Listas</a></li>
          </ul>
        </nav>
	
		<h1> Paciente </h1>
		<div>
		<form action="#" method="POST" class="1">
		
		    <p>
				<label>Escolha o bairro de atendimento:</label><br>
				<select name="bairro">
				<?php
					$bairroDAO = new bairroDAO();
					$ret = $bairroDAO -> buscarTodos();
					$paciente = new pacienteDAO();
					if(count($ret) > 0)
					{
						foreach($ret as $dado)
						{
							echo "<option value='{$dado->idbairro}'>{$dado->descricao}</option>";
						}
					}
				  
				?>
				</select>
			</p>
			
			<p>
				<label>Nome:</label>
				<input type="text" name="nome" value = '<?php if($id != 0) echo $ret[0]->nome; ?>' required/>
			</p>
			
			<p>
				<label>Endereço:</label>
				<input type="text" name="endereco" value = '<?php if($id != 0) echo $ret[0]->endereco; ?>' required/>
			</p>
			
			<p>
				<label>CPF:</label>
				<input type="text" name="cpf" value = '<?php if($id != 0) echo $ret[0]->cpf; ?>' required/>
			</p>
			
			<p>
				<label>RG:</label>
				<input type="text" name="rg" value = '<?php if($id != 0) echo $ret[0]->rg; ?>' required/>
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
				<label>Número de Cartão do SUS:</label>
				<input type="text" name="num_sus" value = '<?php if($id != 0) echo $ret[0]->num_sus; ?>' required/>
			</p>
			
			<p>
				<label>Data de Nascimento:</label>
				<input type="text" name="datanasc" value = '<?php if($id != 0) echo $ret[0]->datanasc; ?>' required/>
			</p>
			
			<p>
				<label>Email:</label>
				<input type="text" name="email" value = '<?php if($id != 0) echo $ret[0]->email; ?>' required/>
			</p>

			<p>
				<label>Senha:</label>
				<input type="password" name="senha" value = '<?php if($id != 0) echo $ret[0]->senha; ?>' required/>
			</p>
			
			<input type="submit" value="Salvar" name="salvar"/>
		</form>
		</div>
	</body>
</html>