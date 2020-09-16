<?php
	class especialidade
	{
		private $idespecialidade;
		private $descricao;

		//método construtor
		function __construct($idespecialidade = null, $descricao = null)
		{
			$this->idespecialidade = $idespecialidade;
			$this->descricao = $descricao;
		}
		
		//get
		function getIdespecialidade()
		{
			return $this->idespecialidade;
		}
		function getDescricao()
		{
			return $this->descricao;
		}

		//set
		function setIdespecialidade($idespecialidade)
		{
			$this -> idespecialidade = $idespecialidade;
		}
		
		function setDescricao($descricao)
		{
			$this -> descricao = $descricao;
		}
		
	}//classe
?>