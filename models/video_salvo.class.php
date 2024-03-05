<?php 

    class Video_salvo extends Conexao
    {
        public function __construct(

            private string $video_salvo = "",
            private $usuario = null,
            private $video = null

        )
        {
            parent:: __construct();
        }

        public function getVideo_salvo(){
            return $this->video_salvo;
        }
        public function getUsuario(){
            return $this->usuario;
        }
        public function getvideo(){
            return $this->video;
        }

        public function setVideo_salvo($video_salvo){
            $this->video_salvos=$video_salvo;
        }
        public function setUsuario($usuario){
            $this->usuario=$usuario;
        }
        public function setVideo($video){
            $this->video=$video;
        }

        public function inserir()
        {
            $sql = "INSERT INTO videos_salvos (idvideo,idusuario) VALUES(?,?)";
            $stm = $this->db->prepare($sql);
			$stm->bindValue(1,$this->video);
            $stm->bindValue(2,$this->usuario);
            $stm->execute();
			$this->db = null;
        }

        public function videos_salvos($id)
        {
            $sql = "SELECT s.idvideo,v.capa,v.titulo 
            FROM videos_salvos s INNER JOIN videos v
            ON(v.idvideo=s.idvideo)
            WHERE idusuario = ". $id ."";
            $stm = $this->db->prepare($sql);
            $stm->execute();
			$this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function buscar_um_video($vi)
        {
            $sql = "SELECT * FROM videos
            WHERE idvideo = ". $vi ."";
			$stm = $this->db->prepare($sql);
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        
        public function verificar_salvo($vi,$usu)
        {
            $sql = "SELECT * FROM videos_salvos
            WHERE idusuario=  ". $usu ." AND idvideo = ". $vi ."";
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }


    }

?>