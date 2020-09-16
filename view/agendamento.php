<?php
	
	require_once "cabec.php";
	if(isset($_SESSION["idpaciente"]))
	{
		header("location:consulta.php");
	}

?>
			
                <?php
				
				require_once "../model/conexao.class.php";
				require_once "../model/paciente.class.php";
				require_once "../model/pacienteDAO.class.php";

				
				//verificar se o email esta cadastrado
				if(isset($_POST["Enviar"]))
				{
					$erro = 0;
					
					if($_POST["email"] == "")
					{
						echo "<script>alert('Preencha o e-Mail');</script>";
						$erro++;
					}
					if($_POST["senha"] == "")
					{
						echo "<script>alert('Preencha a senha');</script>";
						$erro++;
					}
					
					
					if($erro == 0)
					{
						$paciente = new paciente(null, null, null, null, null, null, null, null, null, null, $_POST["email"], md5($_POST["senha"]));
						$pacienteDAO = new pacienteDAO();
						$ret = $pacienteDAO -> verificar($paciente);
						
						if(count($ret) > 0)
						{
							//logado
							
							$_SESSION['nome'] = $ret[0]->nome;
							$_SESSION['idpaciente'] = $ret[0]->idpaciente;
							$_SESSION['bairro'] = $ret[0]->bairro_idbairro;
							$_SESSION['email'] = $ret[0]->email;
							header("location:consulta.php");
						}
						
						else
						{
							echo "<script> alert('Email / Senha não conferem!'); </script>";
						}
					}
					
					
				}
				
                ?>
		<section id="1">
            <form action="#" method="POST">
			
				<?php
				
					if(isset($_SESSION['idpaciente']))
					{
						echo"<a href ='sair.php'>Sair</a>";
					}
					
					else
					{
						echo "<a href='paciente.php?oper=I' >Cadastre-se</a>&nbsp;&nbsp;";
					}
					
				?>
				<br><br>
				<b><label>E-mail:</label></b><input type="text" name="email" placeholder="Digite seu e-mail">
                <br><br><br>
                <b><label>Senha:</label></b><input type="password" name="senha" placeholder="Digite sua senha"><br><br>
				
				<input type="submit" name="Enviar" value="Entrar">
				
				
				
            </form>
        </section>
</body>
</html>
