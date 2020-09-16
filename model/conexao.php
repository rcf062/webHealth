<?php
	abstract class conexao
	{
		protected $db;
		//método construtor
		protected function __construct()
		{
			$param = "mysql:host=localhost;dbname=webhealth;charset=utf8mb4";
			try
			{
				$this->db = new PDO($param, "root", "");
				$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}
			catch(Exception $e)
			{
				die("Erro de conexão com o Banco de Dados");
			}
		}
	}//class
?>