<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <title>Bootstrap Sandbox</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row justify-content-center my-4">
        <div class="col-md-6">
          <form id="formUploadFile">
            <div class="form-group mb-2">
              <label for="">Selecione o doretório</label>
              <select name="select-directory" id="select-directory" class="form-control">

              </select>
            </div>
            <div class="form-group">
               <label for="exampleFormControlFile1">Escolha um arquivo</label>
               <input type="file" class="form-control-file" id="file" name="file">
            </div>
            <button class="btn btn-outline-primary float-right">Enviar arquivo</button>


          </form>
          <?php

              $d = "teste.html";
              $diretorio = "documents/DAL";
              $dados = scandir($diretorio);
              echo "<pre>";
              print_r($dados);

              if(in_array($d, $dados)){
                echo "achei";
              }else{
                echo "não tem";
              }
           ?>
        </div>
      </div>
    </div>





    <script src="js/jquery-3.1.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="js/jquery-ui.js" ></script>
     <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="js/teste.js" ></script>
  </body>
</html>
