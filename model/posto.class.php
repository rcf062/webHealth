<?php
	class posto
	{
		private $idposto;
		private $endereco;
		private $telefone;
		private $bairro;

		//método construtor
		function __construct($idposto = null, $endereco = null, $telefone = null, $bairro = null)
		{
			$this->idposto = $idposto;
			$this->endereco = $endereco;
			$this->telefone = $telefone;
			$this->bairro = $bairro;
		}
		
		//get
		function getIdposto()
		{
			return $this->idposto;
		}
		
		function getEndereco()
		{
			return $this->endereco;
		}
		
		function getTelefone()
		{
			return $this->telefone;
		}
		
		function getBairro()
		{
			return $this->bairro;
		}
		
		//set
		function setIdposto($idposto)
		{
			$this -> idposto = $idposto;
		}
		
		function setEndereco($endereco)
		{
			$this -> endereco = $endereco;
		}
		
		function setTelefone($telefone)
		{
			$this -> telefone = $telefone;
		}
		
		function setBairro($bairro)
		{
			$this -> bairro = $bairro;
		}

	}//classe
?>