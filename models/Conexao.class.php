<?php
	class Conexao
	{
		public function __construct(protected $db = null)
		{
			
			$parametros = "mysql:host=localhost;dbname=teste;charset=utf8mb4";
			
			$this->db = new PDO($parametros, "root", "");
			
		}
	}
?>