<?php
	require_once "cabec.php";
?>

<section>
	<table border="1">
			
			<tr>
				<th> Nome </th>
				<th> Telefone </th>
				<th> Celular </th>
				<th> Crm </th>
				<th> Email </th>
				<th> Especialidade </th>
			</tr>
	
<?php
			require_once "../model/conexao.class.php";
			require_once "../model/medicoDAO.class.php";
			require_once "../model/especialidade.class.php";
			require_once "../model/especialidadeDAO.class.php";
			
			$medicoDAO = new medicoDAO();
			$ret = $medicoDAO -> buscarTodas();
			
			
			if(count($ret) > 0)
			{
				foreach($ret as $dado)
				{
					echo "<td>{$dado->nome}</td>";
					echo "<td>{$dado->telefone}</td>";
					echo "<td>{$dado->celular}</td>";
					echo "<td>{$dado->crm}</td>";
					echo "<td>{$dado->email}</td>";
					echo "<td>{$dado->espec_idespecialidade}</td>";
					echo "<td><a href='medico.php?oper=A&id=
					{$dado->idmedico}'>Alterar</a></td></tr>";
				}
			
			}
		else
		{
			header("location:medico.php?oper=I");
		}
?>

	</table>
	<td><a href='medico.php?oper=I'>Novo médico</a></td></tr>
</section>