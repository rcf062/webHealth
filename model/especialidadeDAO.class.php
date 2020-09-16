<?php
	class especialidadeDAO extends conexao
	{
		function __construct()
		{
			parent:: __construct();
		}
		function inserir($especialidade)
		{
			$sql = "INSERT INTO especialidade (descricao) VALUES(?)";
			try
			{ 
				$stm = $this->db->prepare($sql);
				//substitui os pontos de interrogação
				$stm->bindValue(1,$especialidade->getDescricao());
				$stm->execute();
				$this->db = null;
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
		}//inserir
		
		function buscarTodas()
		{
			$sql = "SELECT * FROM especialidade";
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
		}//buscarTodas
		function excluir($med)
		{
			$sql = "DELETE FROM especialidade WHERE idespecialidade = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $espec->getIdespecialidade());
				$stm->execute();
				$this->db = null;
				
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
		}
		function excluirLogica($espec)
		{
			
			$sql = "UPDATE especialidade SET descricao=? WHERE idespecialidade = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $espec->getDescricao());
				$stm->bindValue(2, $espec->getIdespecialidade());
				$stm->execute();
				$this->db = null;
				
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
		}//excluirLogica
		function buscarUm($med)
		{
			$sql = "SELECT medico FROM nome WHERE idmedico = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $med->getNome());
				$stm->bindValue(2, $med->getIdmedico());
				$stm->execute();
				$this->db = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
		}
		
		/*function buscarTodasAtivas()
		{
			$sql = "SELECT * FROM especialidade WHERE descricao = ?";
			try
			{
				//prepara a frase sql
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, "A");
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
		}//buscarTodas*/
	}//class
?>