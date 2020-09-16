<?php
	class paciente
	{
		private $idpaciente;
		private $bairro_idbairro;
		private $nome;
		private $endereco;
		private $cpf;
		private $rg;
		private $telefone;
		private $celular;
		private $num_sus;
		private $datanasc;
		private $email;
        private $senha;
		
		//método construtor
		function __construct($idpaciente = null,  $bairro_idbairro = null, $nome = null, $endereco = null,
			$cpf = null, $rg = null, $telefone = null, $celular = null,
			$num_sus = null, $datanasc = null, $email = null,$senha = null)
		{
			$this->idpaciente = $idpaciente;
			$this->bairro_idbairro =  $bairro_idbairro;
			$this->nome = $nome;
			$this->endereco = $endereco;
			$this->cpf = $cpf;
			$this->rg = $rg;
			$this->telefone = $telefone;
			$this->celular = $celular;
			$this->num_sus = $num_sus;
			$this->datanasc = $datanasc;
			$this->email = $email;
            $this->senha = $senha;
		}
		
		//get
		function getIdpaciente()
		{
			return $this->idpaciente;
		}
		
		function getBairro_idbairro()
		{
			return $this->bairro_idbairro;
		}
		
		function getNome()
		{
			return $this->nome;
		}
		
		function getEndereco()
		{
			return $this->endereco;
		}
		
		function getCpf()
		{
			return $this->cpf;
		}
		
		function getRg()
		{
			return $this->rg;
		}
		
		function getTelefone()
		{
			return $this->telefone;
		}
		
		function getCelular()
		{
			return $this->celular;
		}
		
		function getNum_sus()
		{
			return $this->num_sus;
		}
		
		function getDatanasc()
		{
			return $this->datanasc;
		}
		
		function getEmail()
		{
			return $this->email;
		}
        function getSenha()
		{
			return $this->senha;
		}


		//set
		function setIdpaciente($idpaciente)
		{
			$this -> idpaciente = $idpaciente;
		}
		
		function setBairro_idbairro( $bairro_idbairro)
		{
			$this->  bairro_idbairro =  $bairro_idbairro;
		}
		
		function setNome($nome)
		{
			$this -> nome = $nome;
		}
		
		function setEndereco($endereco)
		{
			$this -> endereco = $endereco;
		}
		
		function setCpf($cpf)
		{
			$this -> cpf = $cpf;
		}
		
		function setRg($rg)
		{
			$this -> rg = $rg;
		}
		
		function setTelefone($telefone)
		{
			$this -> telefone = $telefone;
		}
		
		function setCelular($celular)
		{
			$this -> celular = $celular;
		}
		
		function setNum_sus($num_sus)
		{
			$this -> num_sus = $num_sus;
		}
		
		function setDatanasc($datanasc)
		{
			$this -> datanasc = $datanasc;
		}
		
		function setEmail($email)
		{
			$this -> email = $email;
		}
        function setSenha($senha)
		{
			$this -> senha = $senha;
		}
		
		
	}//classe
?>