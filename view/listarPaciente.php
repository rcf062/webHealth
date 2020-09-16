<section>
	
	<table border="1">
		<tr>
			<th> Bairro de Atendimento </th>
			<th> Nome </th>
			<th> Endereço </th>
			<th> CPF </th>
			<th> RG </th>
			<th> Telefone </th>
			<th> Celular </th>
			<th> Número Cartão SUS </th>
			<th> Data de Nascimento </th>
			<th> Email </th>
			<th> Senha </th>
		</tr>
		
		<?php		
				require_once "../model/conexao.class.php";
				require_once "../model/pacienteDAO.class.php";
				
				$pacienteDAO = new pacienteDAO();
				$ret = $pacienteDAO -> buscarTodos();
				
				if(count($ret) > 0)
					{
						foreach($ret as $dado)
						{
							echo "<tr><td>{$dado->bairro_idbairro}</td>";
							echo "<td>{$dado->nome}</td>";
							echo "<td>{$dado->endereco}</td>";
							echo "<td>{$dado->cpf}</td>";
							echo "<td>{$dado->rg}</td>";
							echo "<td>{$dado->telefone}</td>";
							echo "<td>{$dado->celular}</td>";
							echo "<td>{$dado->num_sus}</td>";
							echo "<td>{$dado->datanasc}</td>";
							echo "<td>{$dado->email}</td>";
                            echo "<td>{$dado->senha}</td>";
							echo "<td><a href='paciente.php?oper=A&id={$dado->idpaciente}'>Alterar</a></td></tr>";
		
						}
						
					}
					
				else
				{
					header("location:paciente.php?oper=I");
				}
					
				
		?>
	</table>
	
	<td><a href='paciente.php?oper=I'>Novo paciente</a></td></tr>
</section>