<?php 

    class Tutorial extends Conexao
    {
        public function __construct(

            private int $idtutorial = 0,
            private string $titulo ="",
            private string $texto = "",
    
        )
        {
            parent:: __construct();
        }

        public function getIdtutorial(){
            return $this->idtutorial;
        }
        public function getTitulo(){
            return $this->titulo;
        }
        public function getTexto(){
            return $this->texto;
        }
 

        public function setIdtutorial($idtutorial){
            $this->idtutorial=$idtutorial;
        }
        public function setTitulo($titulo){
            $this->titulo=$titulo;
        }
        public function setTexto($texto){
            $this->texto=$texto;
        }

        public function inserir()
		{
			$sql = "INSERT INTO tutorial (titulo,texto) VALUES(?,?)";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1,$this->titulo);
            $stm->bindValue(2,$this->texto);
			$stm->execute();
			$this->db = null;

		}

        public function buscar_todos_tutoriais()
        {
            $sql = "SELECT * FROM tutorial";
			$stm = $this->db->prepare($sql);
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function Buscar_tutorial($pesquisa)
        {
            $sql = ("SELECT * FROM tutorial WHERE titulo LIKE '%". $pesquisa ."%' ");
            $stm = $this->db->prepare($sql);
            $stm->execute();
			$this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

    }

?>