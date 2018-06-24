<?php
  require "../class/Diretory.php";

  if (isset($_POST['list'])) {
    $d = new Diretory();
    $result = $d->listarDiretorio("../../documents");

    header('Content-type: application/json');
		echo json_encode($result,JSON_PRETTY_PRINT);
    //print_r($result);
    //print_r($result);
    //echo $result;
  }

  if (isset($_POST['directory-name'])) {
    $d = new Diretory();
    //$d->listar("../../documents");
    $name = $_POST;
    echo $d->createDirectory($name['directory-name']);
    //print_r($name);
  }

  if (isset($_POST['radio-directory'])) {
    $dados = $_POST['radio-directory'];
    //echo $dados;
      $d = new Diretory();
      $diretorio = "..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."documents".DIRECTORY_SEPARATOR.$_POST['radio-directory'];
      //$diretorio = $_POST['radio-directory'];
      $result = $d->listarArquivos($dados);
      header('Content-type: application/json');
  		echo json_encode($result,JSON_PRETTY_PRINT);
      //$d
  }

  // verifica se esta sendo postado um arquivo com o nome do campo file
  /*if (isset($_FILES['file']['name'])) {
    if ($_FILES['file']['name'] != "") {
      // pega o tipo de extensão
      $extension = end(explode(".",$_FILES['file']['name']));
      // cria o array com os tipos de extensão permitidos
      $allowed_type = array("jpg","jpeg","gif","rtf");
      // verifica se a extensão é permitida
      if (in_array($extension, $allowed_type)) {
        // renomeia o nome do arquivo
        $new_name = rand().".".$extension;
        //cria o caminho do diretorio ja com arquivo no final com sua extensão
        $path ="../../documents/DAL/".$new_name;
        // move o arquivo do diretorio temporario para dendo do caminho que especificamos
        if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
          echo "upload ok";
        }
      }else{

        echo "invalid file format";
      }
      //var_dump($extension);
    }else{
      echo "Please select something";
    }
  }*/

    if (isset($_FILES['files']['name'])) {
        /*if ($_FILES['file']['name'] != "") {
            $directory = $_POST['select-directory']."/";
            $path ="../../documents/".$directory.$_FILES['file']['name'];
            if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
              echo "upload ok";
              echo $directory;
            }else{
              echo "Please select something";
            }
        }*/
        /*$directory = $_POST['select-directory'];
        $d = new Diretory();
        echo $d->uploadFile($directory,$_FILES['files']['tmp_name']);*/

        /*subndo varios arquivos */
        /*echo "<pre>";
        print_r($_FILES);*/




        /* fazendo uploa de varios arquivos*/

        /*$i = 0;
        $directory = $_POST['select-directory'];
        
        //conta a quantidade de arquivos postatdos pelo nome 
        while ( $i < count($_FILES['files']['name'])) {
         
          $path ="../../documents/".$directory.DIRECTORY_SEPARATOR.$_FILES['files']['name'][$i];
         
          move_uploaded_file($_FILES['files']['tmp_name'][$i], $path);
          $i++;
        }*/
       





        if (!empty($_FILES['files']['name'][0])) {
          
          //echo "ok";
          $files = $_FILES['files'];
          $uploaded = array();
          $failed = array();
          $allowed = array('txt','png','jpg');

          // recebe o nome do diretorio par adestino 
          $directory = $_POST['select-directory'];
          foreach ($files['name'] as $position => $fileName) {
           
            $file_tmp   =  $files['tmp_name'][$position];
            $file_size  =  $files['size'][$position];
            $file_error =  $files['error'][$position];

            $file_ext = explode('.',$fileName);
            //print_r($file_ext);
            $file_ext = strtolower(end($file_ext));

            if (in_array($file_ext, $allowed)) {
              if ($file_error === 0) {
                
                /* o tamnho do arquivo que queremos */
                if ($file_size <=  2097152) {
                  
                  // para gerar um rash unico para o arquivo 
                  //$file_name_new = uniqid('',true).'.'.$file_ext;
                 

                  //$file_destination = '../../uploads/'.$file_name_new;
                  //$file_destination = "../../documents/".$directory.DIRECTORY_SEPARATOR.$file_name_new;
                  $file_destination = "../../documents/".$directory.DIRECTORY_SEPARATOR.$fileName;

                  /* envia o arquivo para o local especificado */
                  if(move_uploaded_file($file_tmp, $file_destination)){

                    echo "upload ok ";

                  }else{

                    $failed[$position] = $fileName. " erro a upload";
                  }
                  
                }else{

                   $failed[$position] = $fileName. " tamanho do arquivo excede o tamanho permitido";
                }

              }else{

                $failed[$position] = $fileName. " erro ao fazer upload";
              }

            }else{

              $failed[$position] = $fileName. " extensão ".$file_ext." não é permitida";
            }
            
          }

          if (!empty($uploaded)) {
           print_r($uploaded);
          }

          if (!empty($failed)) {
            print_r($failed);
          }


        }

      }

 ?>
