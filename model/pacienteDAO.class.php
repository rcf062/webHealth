<?php

	class pacienteDAO extends conexao
	{
		function __construct()
		{
			parent:: __construct();
		}
		
		function buscarTodos()
		{
			$sql = "SELECT * FROM paciente";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->execute();
				$this->db = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e )
			{
				die ($e->getMessage());
			}
		}
		
		function verificar($paciente)
		{
			$sql = "SELECT idpaciente, nome, bairro_idbairro, email FROM paciente WHERE email = ? and senha = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $paciente->getEmail());
				$stm->bindValue(2, $paciente->getSenha());
				$stm->execute();
				$this->db = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e )
			{
				die ($e->getMessage());
			}
		}//buscarUm
		
		
		
		
		function buscarUm($paciente)
		{
			$sql = "SELECT * FROM paciente WHERE idpaciente = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $paciente->getIdpaciente());
				$stm->execute();
				$this->db = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e )
			{
				die ($e->getMessage());
			}
		}//buscarUm
		
		function alterar($paciente)
		{
			
			$sql = "UPDATE paciente SET bairro_idbairro=?, nome=?, endereco=?, cpf=?, rg=?, 
			telefone=?, celular=?, num_sus=?, datanasc=?, email=? 
			WHERE idpaciente = ?";   
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $paciente->getBairro_idbairro());
				$stm->bindValue(2, $paciente->getNome());
				$stm->bindValue(3, $paciente->getEndereco());
				$stm->bindValue(4, $paciente->getCpf());
				$stm->bindValue(5, $paciente->getRg());
				$stm->bindValue(6, $paciente->getTelefone());
				$stm->bindValue(7, $paciente->getCelular());
				$stm->bindValue(8, $paciente->getNum_sus());
				$stm->bindValue(9, $paciente->getDatanasc());
				$stm->bindValue(10, $paciente->getEmail());
				$stm->bindValue(11, $paciente->getIdpaciente());
				$stm->execute();
			}
			catch(Exception $e )
			{
				die ($e->getMessage());
			}
		}//alterar
		
		
		function inserir($paciente)
		{
			$sql = "INSERT INTO paciente (bairro_idbairro, nome, endereco, cpf, rg, 
			telefone, celular, num_sus, datanasc, email, senha) VALUES (?,?,?,?,?,?,?,?,?,?,?)"
		;   
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $paciente->getBairro_idbairro());
				$stm->bindValue(2, $paciente->getNome());
				$stm->bindValue(3, $paciente->getEndereco());
				$stm->bindValue(4, $paciente->getCpf());
				$stm->bindValue(5, $paciente->getRg());
				$stm->bindValue(6, $paciente->getTelefone());
				$stm->bindValue(7, $paciente->getCelular());
				$stm->bindValue(8, $paciente->getNum_sus());
				$stm->bindValue(9, $paciente->getDatanasc());
				$stm->bindValue(10, $paciente->getEmail());
				$stm->bindValue(11, $paciente->getSenha());
				$stm->execute();
			}
			catch(Exception $e )
			{
				die ($e->getMessage());
			}
		}//alterar
		
	}//class
	
?>