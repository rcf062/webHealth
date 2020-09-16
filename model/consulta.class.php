<?php
	class consulta
	{
		private $idconsulta;
		private $pac_idpaciente;
		private $posto_idposto;
		private $espec_idespecialidade;
		private $data;
		private $horario;

		//método construtor
		function __construct($idconsulta = null, $pac_idpaciente = null, $posto_idposto = null,
			$espec_idespecialidade = null, $data = null, $horario = null)
		{
			$this->idconsulta = $idconsulta;
			$this->pac_idpaciente = $pac_idpaciente;
			$this->posto_idposto = $posto_idposto;
			$this->espec_idespecialidade = $espec_idespecialidade;
			$this->data = $data;
			$this->horario = $horario;
		}
		
		//get
		function getIdconsulta()
		{
			return $this->idconsulta;
		}
		
		function getPac_idpaciente()
		{
			return $this->pac_idpaciente;
		}
		
		function getPosto_idposto()
		{
			return $this->posto_idposto;
		}
		
		function getEspec_idespecialidade()
		{
			return $this->espec_idespecialidade;
		}
		
		function getData()
		{
			return $this->data;
		}
		
		function getHorario()
		{
			return $this->horario;
		}
		

		//set
		function setIdconsulta($idconsulta)
		{
			$this -> idconsulta = $idconsulta;
		}
		
		function setPac_idpaciente($pac_idpaciente)
		{
			$this -> pac_idpaciente = $pac_idpaciente;
		}
		
		function setPosto_idposto($posto_idposto)
		{
			$this -> posto_idposto = $posto_idposto;
		}
		
		function setEspec_idespecialidade($espec_idespecialidade)
		{
			$this -> espec_idespecialidade = $espec_idespecialidade;
		}
		
		function setData($data)
		{
			$this -> data = $data;
		}
		
		function setHorario($horario)
		{
			$this -> horario = $horario;
		}
		
	}//classe
?>