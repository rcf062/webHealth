<?php
		require_once "cabec.php";
		require_once "../model/conexao.class.php";
		require_once "../model/consultaDAO.class.php";
		require_once "../model/consulta.class.php";
		require_once "../model/posto.class.php";
		require_once "../model/postoDAO.class.php";
		require_once "../model/bairro.class.php";
		require_once "../model/paciente.class.php";
		require_once "../model/especialidade.class.php";

   if($_GET)
   {
	   $data = $_GET["data"];
	   $espec = $_GET["espec"];
	   $bairro = new bairro($_SESSION["bairro"]);
	   $posto = new posto(null, null, null, $bairro);
	   $postoDAO = new postoDAO();
	   $ret = $postoDAO -> buscarPorBairro($posto);
	   $posto -> setIdposto($ret[0]->idposto);
	   
	   $consulta = new consulta(null,null,$posto,null,$data);
	   $consultaDAO = new consultaDAO();
	   $retorno = $consultaDAO -> buscarConsulta($consulta);
	   //var_dump($retorno);
   }
	

?>


<label>Escolha um horário:</label>
<div>
<form action="#" method="POST">
	<?php	
		$horario = array("07:00:00","07:30:00","08:00:00","08:30:00","09:00:00","09:30:00","10:00:00");
		//var_dump($retorno);
		foreach($horario as $hora)
		{
			$encontrou = false;
			foreach($retorno as $dado)
			{
				//echo $dado -> horario;
				//echo $hora;
				if($dado -> horario == $hora)
				{
					$encontrou = true;
				}
			}
			if(!$encontrou)
			{
				echo"<input type='radio' name='hora' value='$hora'>";
				echo"<label>$hora</label>";
			}
		}

	?>	
</div>
<br>
<input type="submit" value="Agendar">
</form>		
<?php		
	if($_POST)
	{
		//inserir consulta
			$paciente = new paciente($_SESSION["idpaciente"]);
			$espec = new especialidade($espec);
			$consulta = new consulta(null,$paciente,$posto,$espec,$data,$_POST["hora"]);
			$consultaDAO = new consultaDAO();
			$ret = $consultaDAO -> inserir($consulta);
		
			//mandar dados da consulta via email
		
			if($ret) 
			{
				require_once "config.php";
				//enviar o link por email
				
				$assunto = "Agendamento Médico";
				$remetente = "milenamarqs8@gmail.com";
				$nomeRemetente = "WebHealth";
				$destino = $_SESSION['email'];
				$nomeDestino = $_SESSION['nome'];
				$mensagem = "<h2> Olá ". $_SESSION['nome'] . "<h2\><br/><p>
					Recebemos o seu agendamento para o dia" . $data .
					"às" . $_POST['hora'] . $nomeRemetente . "<p>";
				$retorno = sendMail($assunto, $mensagem, $remetente, $nomeRemetente, $destino, $nomeDestino);
				if($ret == true)
				{
					echo "<script> alert('Verifique se foi enviado um 
						email com a confirmação do agendamento'); </script>";
				}
							
				else
				{
					echo "<script> alert('Problema no envio do email'); </script>";
				}	
						
			}
			
			
			
		
	}
		?>