<?php
	
	class consultaDAO extends conexao
	{
		function __construct()
		{
			parent:: __construct();
		}
		
			function buscarUma($consulta)
			{
				$sql = "SELECT * FROM consulta WHERE idconsulta = ?";
				try
				{
					$stm = $this->db->prepare($sql);
					$stm->bindValue(1, $consulta->getIdconsulta());
					$stm->execute();
					$this->db = null;
					return $stm->fetchAll(PDO::FETCH_OBJ);
				}
				catch(Exception $e)
				{
					echo $e->getMessage();
				}
			}
			
		function buscarConsulta($consulta)
			{
				
				$sql = "SELECT * FROM consulta WHERE posto_idposto = ? and data = ? ORDER BY horario";
				try
				{
					$stm = $this->db->prepare($sql);
					$stm->bindValue(1, $consulta->getPosto_idposto()-> getIdposto());
					$stm->bindValue(2, $consulta->getData());
					$stm->execute();
					$this->db = null;
					return $stm->fetchAll(PDO::FETCH_OBJ);
				}
				catch(Exception $e)
				{
					echo $e->getMessage();
				}
			}	
		
			function inserir($consulta)
			{
				$sql = "INSERT INTO consulta (pac_idpaciente,posto_idposto,espec_idespecialidade,data,horario)
				VALUES (?,?,?,?,?)";
				try
				{
					$stm = $this->db->prepare($sql);
					$stm->bindValue(1, $consulta->getPac_idpaciente()-> getIdpaciente());
					$stm->bindValue(2, $consulta->getPosto_idposto()-> getIdposto());
					$stm->bindValue(3, $consulta->getEspec_idespecialidade()-> getIdespecialidade());
					$stm->bindValue(4, $consulta->getData());
					$stm->bindValue(5, $consulta->getHorario());
					$ret = $stm->execute();
					$this->db = null;
					return $ret;
				}
				
				catch(Exception $e)
				{
					echo $e->getMessage();
				}
				
			}
	
	
	
	}
?>