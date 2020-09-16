<?php
	class medico
	{
		private $idmedico;
		private $nome;
		private $telefone;
		private $celular;
		private $crm;
		private $email;
		private $espec_idespecialidade;

		//método construtor
		function __construct($idmedico = null,
			$nome = null, $telefone = null, $celular = null, 
			$crm = null, $email = null, $espec_idespecialidade = null)
		{
			$this->idmedico = $idmedico;
			$this->nome = $nome;
			$this->telefone = $telefone;
			$this->celular = $celular;
			$this->crm = $crm;
			$this->email = $email;
			$this ->espec_idespecialidade = $espec_idespecialidade;
		}
		
		//get
		function getIdmedico()
		{
			return $this->idmedico;
		}
		
		function getNome()
		{
			return $this->nome;
		}
		
		function getTelefone()
		{
			return $this->telefone;
		}
		
		function getCelular()
		{
			return $this->celular;
		}
		
		function getCrm()
		{
			return $this->crm;
		}
		
		function getEmail()
		{
			return $this->email;
		}
		
		function getEspec_idespecialidade()
		{
			return $this -> espec_idespecialidade;
		}

		//set
		function setIdmedico($idmedico)
		{
			$this -> idmedico = $idmedico;
		}
		
		
		function setNome($nome)
		{
			$this -> nome = $nome;
		}
		
		function setTelefone($telefone)
		{
			$this -> telefone = $telefone;
		}
		
		function setCelular($celular)
		{
			$this -> celular = $celular;
		}
		
		function setCrm($crm)
		{
			$this -> crm = $crm;
		}
		
		function setEmail($email)
		{
			$this -> email = $email;
		}
		
		function setEspec_idspecialidade($espec_idespecialidade)
		{
			$this -> espec_idespecialidade = $espec_idespecialidade;
		}
		
	}//classe
?>