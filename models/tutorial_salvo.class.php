<?php 

    class Tutorial_salvo extends Conexao
    {
        public function __construct(

            private int $idusu_tutorial = 0,
            private string $tutorial_salvo = "",
            private $usuario = null,
            private $tutorial = null

        )
        {
            parent:: __construct();
        }

        public function getIdusu_tutorial(){
            return $this->idusu_tutorial;
        }
        public function getTutorial_salvo(){
            return $this->tutorial_salvo;
        }
        public function getUsuario(){
            return $this->usuario;
        }
        public function getTutorial(){
            return $this->Tutorial;
        }

        public function setIdusu_tutorial($idusu_tutorial){
            $this->idusu_tutorial=$idusu_tutorial;
        }
        public function setTutorial_salvo($tutorial_salvo){
            $this->tutorial_salvos=$tutorial_salvo;
        }
        public function setUsuario($usuario){
            $this->usuario=$usuario;
        }
        public function setTutorial($tutorial){
            $this->tutorial=$tutorial;
        }
        public function inserir()
        {
            $sql = "INSERT INTO tutoriais_salvos (idtutorial,idusuario) VALUES(?,?)";
            $stm = $this->db->prepare($sql);
			$stm->bindValue(1,$this->tutorial);
            $stm->bindValue(2,$this->usuario);
            $stm->execute();
			$this->db = null;
        }

        public function tutoriais_salvos($id)
        {
            $sql = "SELECT s.idtutorial,t.titulo ,t.texto
            FROM tutoriais_salvos s INNER JOIN tutorial t
            ON(t.idtutorial=s.idtutorial)
            WHERE idusuario = ". $id ."";
            $stm = $this->db->prepare($sql);
            $stm->execute();
			$this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function buscar_um_tutorial($vi, $usu)
        {
            $sql = "SELECT * FROM videos_salvos 
            WHERE idusuario = ". $usu ." AND idtutorial = ". $vi ."";
			$stm = $this->db->prepare($sql);
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
        }

    }

?>