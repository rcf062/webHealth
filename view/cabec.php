<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Health</title>
    <link rel="shortcut Icon" href="Icons/heartbeat.png">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Hammersmith+One&display=swap" rel="stylesheet">
</head>

<body background="images/fundo.jpg" bgproperties='fixed'>
    <table>
        <td><img src="Icons/heartbeat.png" alt="Icone"></td>
        <td>
            <h2 class="logo"><a href="index.php" class="a">WEBHEALTH 2019</h2>
            </h2></a>
        </td>
    </table>
    <hr style="border-top: 2px #000 solid; margin-top: 0px; margin-bottom: 0px;">
    <br>
    <nav class="menu">
	<div id="menucentro">
        <ul>
            <li><a href="paciente.php?oper=I"><img class="icon" src="Icons/004-notepad.png" alt="Icone 1">Cadastro</a></li>
            <li><a href="agendamento.php"><img class="icon" src="Icons/004-notepad.png" alt="Icone 2">Agendamento</a></li>
            <li><a href="contato.php"><img class="icon" src="Icons/005-mail.png" alt="Icone 3">Contato</a></li>
            <li><a href="lista.php"><img class="icon" src="Icons/002-menu.png" alt="Icone 4">Listas</a></li>
        <?php
		
			if(isset($_SESSION['idpaciente']))
			{
				echo"<li><a href='sair.php'><img class='icon' src='Icons/open.png' alt='block'>Sair</a></li>";
			}
			
			else
			{
				echo"<li><a href='agendamento.php'><img class='icon' src='Icons/block.png' alt='Icone 4' height='42' width='42'>Entrar</a></li>";
			}
		
		?>
		</ul>
	</div>
	</nav>
        
	