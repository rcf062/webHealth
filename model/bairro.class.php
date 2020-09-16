<?php
	class bairro
	{
		private $idbairro;
		private $posto_idposto;
		private $descricao;
		private $status;

		//método construtor
		function __construct($idbairro = null, $posto_idposto = null, 
		$descricao = null)
		{
			$this->idbairro = $idbairro;
			$this->posto_idposto = $posto_idposto;
			$this->descricao = $descricao;
		}
		
		//get
		function getIdbairro()
		{
			return $this->idbairro;
		}
		
		function getPosto_idposto()
		{
			return $this->posto_idposto;
		}
		
		function getDescricao()
		{
			return $this->descricao;


		//set
		function setIdbairro($idbairro)
		{
			$this -> idbairro = $idbairro;
		}
		
		function setPosto_idposto($posto_idposto)
		{
			$this -> posto_idposto = $posto_idposto;
		}
		
		function setDescricao($descricao)
		{
			$this -> descricao = $descricao;
		}
		
	}
	}//classe
?>