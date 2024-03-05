<?php 

class Comentario extends Conexao
{
    public function __construct(

        private int $idcomentario = 0,
        private $usuario = null,
        private $video = null,
        private string $texto = ""

    )
    {
        parent:: __construct();
    }

    public function getIdcomentario(){
        return $this->idcomentario;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function getVideo(){
        return $this->video;
    }
    public function getTexto(){
        return $this->texto;
    }


    public function setIdcomentario($idcomentario){
        $this->idcomentario=$idcomentario;
    }
    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }
    public function setVideo($video){
        $this->video=$video;
    }
    public function setTexto($texto){
        $this->texto=$texto;
    }

    public function inserir()
    {
        $sql = "INSERT  INTO comentarios (idusuario ,idvideo, texto) VALUES(?,?,?)";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(1,$this->usuario);
        $stm->bindValue(2,$this->video);
        $stm->bindValue(3,$this->texto);
        $stm->execute();
        $this->db = null;

    }
    public function buscar_comentarios($vi)
    {
        $sql = "SELECT u.nome, u.sobrenome, c.texto  FROM comentarios c INNER JOIN usuario u
        ON(u.idusuario = c.idusuario)
        WHERE c.idvideo = ". $vi ."";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        $this->db = null;
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

}

?>