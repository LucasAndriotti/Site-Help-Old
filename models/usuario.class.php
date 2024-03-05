<?php 

    class Usuario extends Conexao
    {
        public function __construct(

            private int $idusuario = 0,
            private string $nome= "",
            private string $sobrenome= "",
            private string $email = "",
            private string $senha = "",
            private string $tipo = "",
            private string $foto=""
             
        )
        {
            parent:: __construct();
        }

        public function getIdusuario(){
            return $this->idusuario;
        }
        public function getNome(){
            return $this->nome;
        }
        public function getSobrenome(){
            return $this->sobrenome;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getSenha(){
            return $this->senha;
        }
        public function getTipo(){
            return $this->tipo;
        }
        public function getFoto(){
            return $this->foto;
        }
        

        public function setIdusuario($idusuario){
            $this->idusuario=$idusuario;
        }
        public function setNome($nome){
            $this->nome=$nome;
        }
        public function setSobrenome($sobrenome){
            $this->sobrenome=$sobrenome;
        }
        public function setEmail($email){
            $this->email=$email;
        }
        public function setSenha($senha){
            $this->senha=$senha;
        }
        public function setTipo($tipo){
            $this->tipo=$tipo;
        }
        public function setFoto($foto){
            $this->foto=$foto;
        }

        public function verificar_usuario()
		{
			$sql = "SELECT idusuario, nome,foto, tipo FROM usuario WHERE email = ? AND senha = ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1,$this->email);
			$stm->bindValue(2,$this->senha);
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}

        public function verifiacar_email()
        {
            $sql = "SELECT email FROM usuario WHERE email = ?";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1,$this->email);
            $stm->execute();
			$this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function inserir()
		{
			$sql = "INSERT INTO usuario (nome,sobrenome,email,senha,tipo,foto) VALUES(?,?,?,?,?,?)";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1,$this->nome);
            $stm->bindValue(2,$this->sobrenome);
			$stm->bindValue(3,$this->email);
			$stm->bindValue(4,$this->senha);
			$stm->bindValue(5,$this->tipo);
            $stm->bindValue(6,$this->foto);
			$stm->execute();
			$this->db = null;
		}

        public function buscar_um_usuario()
		{
			$sql = "SELECT * FROM usuario WHERE idusuario = ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $this->idusuario);
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
        public function alterar()
		{
			$sql = "UPDATE usuario SET nome = ?, sobrenome = ?, email = ?, senha = ?
            WHERE idusuario = ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $this->nome);
			$stm->bindValue(2, $this->sobrenome);
			$stm->bindValue(3, $this->email);
			$stm->bindValue(4, $this->senha);
			$stm->bindValue(5, $this->idusuario);
			$stm->execute();
			$this->db = null;
		}

    }
      
?>