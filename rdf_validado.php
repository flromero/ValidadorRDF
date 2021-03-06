<?php
include ('inc/config.php');
include ('inc/validate_by_uri.php');
//include ('inc/expresiones_regulares.php');
//include ('inc/validate_by_uri.php');
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

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/rdfval.css" rel="stylesheet">

</head>
<!-- Header -->
    <header class='rdfval' id="rdfval">
        <div class="container">
        <div class="row text-left">
        <a href="http://www.w3.org/RDF/" title="RDF Resource Description Framework"> <img border="0" src="http://www.w3.org/RDF/icons/rdf_w3c_icon.64" alt="RDF Resource Description Framework Icon"/></a><div class="col-lg-10 col-lg-offset-1">
        <h2><strong>Resultados de Validación</strong></h2>
        <p>Presentación de errores encontrados</p>
        </div>
        </div>
        </div>
    </header>

<!-- About -->
    <section id="about" class="about">
      <div class="container text-center">
        <table border style="margin: 0 auto; width: 75%">
        	<tr ><th colspan="2">DETALLES GENERALES</th></tr>
        	<tr><th>URL</th><td><?php $url = $_POST['url']; echo ($url)?></td></tr>
        	<tr><th>Doctype:</th><td>RDF/XML</td>
        	</tr>
        	<tr><th>Número de errores:</th><td><?php echo $validador->count_errors;?></td></tr>
        </table>
      </div> 
    </section>
    <div class="boton" id="boton">
    <input type="button" value="Detalle de errores:">
    </div>  
    <div class="resultados" id="resultados">
    <?php
    include('inc/validar_uri.php');
      //var_dump($validador->errores);
      foreach ($validador->errores as $error){
        echo "<div class='errores'>".$error."</div>";
      }
    ?>   
    </div>
    <h2>Modelo de datos</h2>
    <div class="tripletas" id="tripletas"><br>
        <?php
      include('inc/modelo_datos.php'); 
      ?>   
      </div>
<?php
    include ("template_path/footer.php");
?> 
