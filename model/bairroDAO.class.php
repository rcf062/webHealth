<?php
	class bairroDAO extends conexao
	{
		function __construct()
		{
			parent:: __construct();
		}
		
		function buscarTodos()
		{
			$sql = "SELECT * FROM bairro";
			try
			{
				//prepara a frase sql
				$stm = $this->db->prepare($sql);
				//executa frase sql
				$stm->execute();
				//fecha a conexão
				$this->db = null;
				//retorna todos os registros encontrados no formato de uma matriz de objetos
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
		}//buscarTodos
		
	}//class
?>