<?php 

    class Videos extends Conexao
    {
        public function __construct(

            private int $idvideo = 0,
            private string $titulo ="",
            private string $descricao = "",
            private string $video = "",
            private string $capa= ""
           
        )
        {
            parent:: __construct();
        }

        public function getIdvideo(){
            return $this->idvideo;
        }
        public function getTitulo(){
            return $this->titulo;
        }
        public function getDescricao(){
            return $this->descricao;
        }
        public function getVideo(){
            return $this->video;
        }
        public function getCapa(){
            return $this->Capa;
        }

        public function setIdvideo($idvideo){
            $this->idvides=$idvideo;
        }
        public function setTitulo($titulo){
            $this->titulo=$titulo;
        }
        public function setDescricao($descricao){
            $this->descricao=$descricao;
        }
        public function setVideo($video){
            $this->video=$video;
        }
        public function setCapa($capa){
            $this->capa=$capa;
        }

        public function inserir()
		{
			$sql = "INSERT INTO videos (titulo, descricao, capa, video) VALUES(?,?,?,?)";
			
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $this->titulo);
			$stm->bindValue(2, $this->descricao);
			$stm->bindValue(3, $this->capa);
			$stm->bindValue(4, $this->video);
			$stm->execute();
			$this->db = null;
        }

        public function buscar_todos_videos()
        {
            $sql = "SELECT * FROM videos";
			$stm = $this->db->prepare($sql);
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function Buscar_video($pesquisa)
        {
            $sql = ("SELECT * FROM videos WHERE titulo LIKE '%". $pesquisa ."%' ");
            $stm = $this->db->prepare($sql);
            $stm->execute();
			$this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function buscar_um_video($video)
        {
            $sql = "SELECT * FROM videos WHERE idvideo = ". $video ."";
			
			$stm = $this->db->prepare($sql);
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        public function verifiacar_salvamento($id)
        {
            $sql = "SELECT video_salvo FROM videos_salvos WHERE idusuario = ". $id ."";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1,$this->email);
            $stm->execute();
			$this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

    }

?>