<?php
	class medicoDAO extends conexao
	{
		function __construct()
		{
			parent:: __construct();
		}
		
	
		function buscarTodas()
		{
			$sql = "SELECT * FROM medico";
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
		
			function buscarUm($medico)
			{
				$sql = "SELECT * FROM medico WHERE idmedico = ?";
				try
				{
					$stm = $this->db->prepare($sql);
					$stm->bindValue(1, $medico->getIdmedico());
					$stm->execute();
					$this->db = null;
					return $stm->fetchAll(PDO::FETCH_OBJ);
				}
				catch(Exception $e)
				{
					echo $e->getMessage();
				}
			}
			
		function Alterar($medico)
		{
			$sql = "UPDATE medico SET nome=?, telefone=?, celular=?, crm=?, email=?, espec_idespecialidade=?
			WHERE = ?";
			try
			{ 
				$stm = $this->db->prepare($sql);
				//substitui os pontos de interrogação
				$stm->bindValue(1,$medico->getNome());
				$stm->bindValue(2,$medico->getTelefone());
				$stm->bindValue(3,$medico->getCelular());
				$stm->bindValue(4,$medico->getCrm());
				$stm->bindValue(5,$medico->getEmail());
				$stm->bindValue(6,$medico->getEspec_idespecialidade());
				$stm->bindValue(7,$medico->getIdmedico());
				$stm->execute();
				$this->db = null;
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
		}//alterar
		
		
		function Inserir($medico)
		{
			$sql = "INSERT INTO medico (nome, telefone, celular, crm, email, espec_idespecialidade) VALUES (?,?,?,?,?,?)";
			try
			{ 
				$stm = $this->db->prepare($sql);
				//substitui os pontos de interrogação
				$stm->bindValue(1,$medico->getNome());
				$stm->bindValue(2,$medico->getTelefone());
				$stm->bindValue(3,$medico->getCelular());
				$stm->bindValue(4,$medico->getCrm());
				$stm->bindValue(5,$medico->getEmail());
				$stm->bindValue(6,$medico->getEspec_idespecialidade());
				$stm->execute();
				$this->db = null;
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
		}//alterar
	
	}//class

?>