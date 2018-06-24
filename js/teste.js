$(document).ready(function(){

  $("#viewDirectories").on('submit',function(e){
    //alert($(this).value());
    //console.log($(this).value());
    //( "input[value='Hot Fuzz']" ).next().text( "Hot Fuzz" )
    e.preventDefault();
    //console.log($('input[name="radio-directory"]').val());

    var dados = $("#viewDirectories").serialize();
    $.post( "php/controlers/controler.php",dados,function(e){
      var list = "";
      if (e.length > 2) {
        for (var i = 2; i < e.length; i++) {

          list += "<a href='"+e[i]+"' class='list-group-item list-group-item-action d-flex justify-content-between'>"+e[i]+"<span class='fa fa-download'></span></a>";

        }
        $("#documents").html(list);
      }else{
        list += "<li class='list-group-item list-group-item-danger d-flex justify-content-between'>Não há arquivos</li>";
        $("#documents").html(list);
      }

      //console.log(e);
    });
  });

  /*$('input[name="radio-directory"]:checked').change(function(e){
    alert("oi");
  });*/

  /*("#teste3 a").on("click",function(e){
    e.preventDefault();
    alert($(this).attr('href'));
  });*/
  exibirDiretorios();

  function exibirDiretorios(){
    $.ajax({
        url:    "php/controlers/controler.php",
        cache:    false,
        type:"POST",
        dataType:  "json",
        data:{
          'list': "list"
        },
        beforeSend: function (){
        },
        error: function(){

        },
        success: function(e){
          //console.log(e);
            var list = "";
            var option = "<option value=''>Selecione</option>";
            for (var i = 0; i < e.length; i++) {
              if (i > 1) {
                    //list += e[i]+"<li class=''><input type='radio' name='radio-directory' class='list-group-item list-group-item-action' value='"+e[i]+"'></li>";
                  list += "<li class='list-group-item  d-flex justify-content-between'>"+e[i]+"<input type='radio' class='' name='radio-directory' value='"+e[i]+"'></li>";
                  option += "<option value='"+e[i]+"'>"+e[i]+"</option>";
              }
            }
            $("#directories").html(list);
            $("#selectDirectory").html(option);
        }

      });
    }

    // faz a div ficar  resizable
    //$( ".resizable" ).resizable();
    //alert("oi");

    /*$("a").on("click",function(){
      console.log($(this).text());
    });*/

    $("#formUploadFile").on("submit",function(e){
      e.preventDefault()
      $.ajax({
          url:    "php/controlers/controler.php",
          method:"POST",
          data: new FormData(this),
          contentType: false,
          processData: false,
          beforeSend: function (){

          },
          error: function(){

          },
          success: function(data){
            console.log(data);
            //retorno("alert alert-danger",data);
            $("#retorno").html(data);
            //apagarRetorno();
          }

        });


      });
      /*$("#formUploadFile").on("submit",function(e){
        e.preventDefault();

        $('#formUploadFile').ajaxForm(function() {
          url:    'php/controlers/controler.php',
          type:   'post',
          success: function(data){
            alert("Thank you for your comment!");
          }
        }).submit();
      });*/




      $("#addDirectory").on("submit",function(e){
        e.preventDefault();
        var details = $("#addDirectory").serialize();
        $.post('php/controlers/controler.php',details,function(data){
          //console.log(data);
          exibirDiretorios();
          $("#retorno").html(data);
          apagarRetorno();
        });
      });

      function apagarRetorno(){
        setTimeout(function(){
         $('#retorno').html(" ");
       },5000);}


       function retorno(classe, msg){
         $("#retorno").html("<div class='"+classe+"' role='alert' id='msg'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><small>"+msg+"</small></div>");
       }

       function apagarRetorno(){
         setTimeout(function(){
          $('#retorno').html(" ");
        },5000);}


  });
