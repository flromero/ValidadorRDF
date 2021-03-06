<?php
include ('inc/config.php');
include('inc/validate_by_direct.php');
include ("template_path/head.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/rdf.png">

    <title>VALIDADOR|RDF</title>

    <!-- Custom CSS -->
    <link href="css/rdfval.css" rel="stylesheet">

</head>
<!-- Header -->
    <header class='rdfval' id="rdfval">
        <div class="container">
        <div class="row text-left">
        <a href="http://www.w3.org/RDF/" title="RDF Resource Description Framework"> <img border="0" src="http://www.w3.org/RDF/icons/rdf_w3c_icon.64" alt="RDF Resource Description Framework Icon"/></a><div class="col-lg-10 col-lg-offset-1">
        <h2><strong>Resultados de Validación</strong></h2>
        <p>Mostrando resultados</p>
        </div>
        </div>
    </header>

<!-- About -->
    <section id="about" class="about">
      <div class="container text-center">
        <table border style="margin: 0 auto; width: 75%">
        	<tr ><th colspan="2">DETALLES GENERALES</th></tr>
        	<tr><th>Doctype:</th><td>RDF/XML</td>
        	</tr>
        	<tr><th>Número de errores:</th><td><?php echo $validador->count_errors+$clase->getSizeErrores();?></td></tr>
        </table>
      </div> 
    </section>
        <div class="container">
                    <fieldset class="front">
                      <legend class="main">Mensajes</legend>
                      <div class="resultados" id="resultados">
    <?php
    $num=$validador->count_errors+$clase->getSizeErrores();
    if ($num==0){
    echo"En hora buena. Su archivo no contiene errores.";
  }else{
    

    if ($validador->count_errors>0) {
      # code...
          foreach ($validador->errores as $error){
            if ($error) {
              echo "<strong>Revise sintaxis:</strong>";
              echo "<div class='errores'>".$error."</div>";
            } 
          } 
    }

          /*Recorrer los errores DUPLICIDAD*/
          $errores=$clase->getErrores();

          foreach ($errores as  $value) {
            if ($value) {
              echo "<strong>Revise datos duplicados:</strong>";
              echo  "<div class='errores'>".htmlspecialchars($value)."</div>";
            }
          }

          //Errores de etiquetas
          foreach(libxml_get_errors() as $error) {
            echo "<strong>Revise etiquetas:</strong>";
          echo "<div class='errores'>".$error->message."</div>";
        }
  }
      
    ?> 
    </div>
    </fieldset><br>
    <fieldset>
      <legend class="main">Modelo de datos</legend>
        <?php
        $num=$validador->count_errors+$clase->getSizeErrores();
    if ($num>0){
    echo"Corrija los errores para mostrar el modelo de datos";
  }else{

      include('inc/modelo_datos.php'); 
    }
      ?>   
      </div>
    </fieldset>
<?php
    include ("template_path/footer.php");
?> 
