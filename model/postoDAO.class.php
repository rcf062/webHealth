<?php
	class postoDAO extends conexao
	{
		function __construct()
		{
			parent:: __construct();
		}
		
		function buscarPorBairro($posto)
		{
			$sql = "SELECT * FROM posto WHERE bairro_idbairro = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm -> bindValue(1, $posto -> getBairro() -> getIdbairro());
				$stm->execute();
				$this->db = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
		}
	}
?>