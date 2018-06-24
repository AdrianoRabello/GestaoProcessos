<?php

  /**
   *
   */
  class Diretory{

    private $directory;

    function __construct(){
      // code...
    }

    public function listarDiretorio($diretorio){
      $linha = array();
      if (is_dir($diretorio)) {
        $linhas = scandir($diretorio);
        /*foreach ($linhas as $linha) {
          if ($linha != ".." and  $linha != ".") {

              //$row = $linha;
              return $linha;
            //print "<li class='list-group-item'>$linha</li>";
            //print "<li class='list-group-item d-flex justify-content-between'>$linha <button class='fas fa-list lista'></button></li>";
            //<li class="list-group-item d-flex justify-content-between align-items-center">My List Item One <span class="badge badge-primary ">30</span></li>
          }
          //return $row;

        }*/
        //$linha;

        foreach ($linhas as $key => $value) {

          if ($linhas != ".." and  $linhas != ".") {
            $linha[$key] = $value;
            //$linha = $value;
          }

        }
        return $linha;
      }
    }









    public function listarArquivos($value){
      $linha = array();
      $this->setDirectory($value);
      $diretorio = "..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."documents".DIRECTORY_SEPARATOR.$value;
      if (is_dir($diretorio)) {
        $linhas = scandir($diretorio);
        /*foreach ($linhas as $linha) {
          if ($linha != ".." and  $linha != ".") {

              //$row = $linha;
              return $linha;
            //print "<li class='list-group-item'>$linha</li>";
            //print "<li class='list-group-item d-flex justify-content-between'>$linha <button class='fas fa-list lista'></button></li>";
            //<li class="list-group-item d-flex justify-content-between align-items-center">My List Item One <span class="badge badge-primary ">30</span></li>
          }
          //return $row;

        }*/
        //$linha;

        foreach ($linhas as $key => $value) {
          if ($linhas != ".." and  $linhas != ".") {
            //$linha[$key] = "..".DIRECTORY_SEPARATOR."documents".DIRECTORY_SEPARATOR.$value;
            $linha[$key] = "documents".DIRECTORY_SEPARATOR.$this->getDirectory().DIRECTORY_SEPARATOR.$value;
            //$linha = $value;
          }

        }
        return $linha;
      }
    }

    public function createDirectory($name){
      $dir = "../../documents/".$name;
      if ($name == null) {
        return $this->alert("alert alert-danger text-center","Favor informar o nome do diretorio");
      }else{
        if (file_exists($dir)) {
          return $this->alert("alert alert-danger text-center","O diretorio já existe");
        }else{
          mkdir($dir,0777);
          return $this->alert("alert alert-success text-center","Diretorio criado com suecesso");
        }

      }

    }



    public function uploadFile($directory,$file){

      if ($file != "") {
          if ($directory != "") {
            $directory .="/";
            $path ="../../documents/".$directory.$_FILES['file']['name'];
            if (move_uploaded_file($file, $path)) {
              //echo "upload ok";
                return $this->alert("alert alert-success text-center","Arquivo enviado com sucesso");
            }else{
              return $this->alert("alert alert-danger text-center","Arquivo não enviado");
            }
          }else{
            return $this->alert("alert alert-danger text-center","Selecione um diretório");
          }

      }else{
        return $this->alert("alert alert-danger text-center","Selecione um arquivo");

      }
    }

    public function uploadMultipleFile($directory,$file){

      if ($file != "") {
          if ($directory != "") {
            $directory .="/";
            $path ="../../documents/".$directory.$_FILES['file']['name'];
            
            if (move_uploaded_file($file, $path)) {
              //echo "upload ok";
                return $this->alert("alert alert-success text-center","Arquivo enviado com sucesso");
            }else{
              return $this->alert("alert alert-danger text-center","Arquivo não enviado");
            }
          }else{
            return $this->alert("alert alert-danger text-center","Selecione um diretório");
          }

      }else{
        return $this->alert("alert alert-danger text-center","Selecione um arquivo");

      }
    }




    public function alert($class,$mensagem){
        $retorno = "<div class='".$class."' role='alert' id='msg'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><small>".$mensagem."</small>
              </div>";
              return $retorno;
    }



    function getDirectory(){
      return $this->directory;
    }

    function setDirectory($value){
       $this->directory = $value;
    }

  }

  /*$d = new Diretory();
  $dados = $d->listarDiretorio("../../documents/DAL");
  print_r($dados);*/



 ?>
