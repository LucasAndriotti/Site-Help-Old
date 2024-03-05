<?php
  require_once "../models/Conexao.class.php";
  require_once "../models/videos.class.php";
  
  $msg = array("","","","");
  
  if($_POST)
  {
  
    $erro = false;
    if(empty($_POST["titulo"]))
    {
      $msg[0] = "Preencha o Titulo do Video";
      $erro = true;
    }
    if(empty($_POST["descricao"]))
    {
      $msg[1] = "Preencha descrição do Video";
      $erro = true;
    }
    if($_FILES["video"]["name"] == "")
    {
      $msg[2] = "Escolha um Video";
      $erro = true;
    }
    if($_FILES["capa"]["name"] == "")
    {
      $msg[3] = "Escolha uma imagem";
      $erro = true;
    }
    if(!$erro)
    {
      
      $video = new Videos(titulo:$_POST['titulo'],descricao:$_POST['descricao'], capa:$_FILES['capa']['name'], video:$_FILES['video']['name']);
        
      $retorno = $video->inserir();
  
      $capa = $_FILES['capa'];
      $arquivo = explode('.',$capa['name']);
      move_uploaded_file($capa['tmp_name'], '../videos/capas/'.$capa['name']);
  
      $video = $_FILES["video"];
      $arquivov = explode('.',$video['name']);
      move_uploaded_file($video['tmp_name'], '../videos/'.$video['name']);
  
    
    }
  
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title>Formulário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style="color: white ;background: #23272A;">
    <?php
        require_once "menu.php";
    ?>
    <section class='container' style='margin-top:50px'>
      <div class='row mt-4'>
        <div class='col'>

          <div class="d-flex justify-content-center">
            <form method="post" enctype="multipart/form-data">
              <div>
                <label>Titulo</label>
                <input type="text" name="titulo" class="form-control" value="<?php if(isset($_POST['titulo'])) echo $_POST['titulo']; ?>">
              </div>
              <div><?php echo $msg[0];?></div>
              <br>
              <div>
                <label>Arquivo Video</label>
                <input type="file" name="video" class="form-control">
              </div>
              <div><?php echo $msg[1];?></div>
              <div>
              <br>
                <label>Capa Do video</label>
                <input type="file" class="form-control" name="capa" onchange="mostrar(this)">
                <div><?php echo $msg[2];?></div>
              </div>
              <br>
              <div>
                <label>Descrição</label>
                <textarea name="descricao" class="form-control" value="<?php if(isset($_POST['descricao'])) echo $_POST['descricao']; ?>"></textarea>
              </div>
              <div><?php echo $msg[3];?></div>
              <br>
              <input type="submit" class="btn btn-primary" value="Enviar">
            </form>
              
          </div>
        </div>
        <div class='col'>
          <h4>Preview:</h4>
          <div class="justify-content-center">
              <img  class='rounded-4' src="" id="img">
          </div>
        </div>

      </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
          <script>
            function mostrar(img)
            {
              if(img.files  && img.files[0])
              {
                var reader = new FileReader();
                reader.onload = function(e){
                  $('#img')
                  .attr('src', e.target.result)
                  .width(360)
                  .height(205);
                };
                reader.readAsDataURL(img.files[0]);
              }
            }
          </script>
  </body>
</html>
