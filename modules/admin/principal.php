<?php
session_start();
include_once "library/inc.connection.php";
include_once "library/inc.library.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
<title>Sitema de Control Escolar</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="img/favicon.ico" />
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../../css/sweetalert.css">
<link rel="stylesheet" type="text/css" href="../../css/principal.css">
<link rel="stylesheet" type="text/css" href="hightchart/css/highcharts.css">
<link rel="stylesheet" type="text/css" href="../../css/fontawesome.css">
<script src="../../js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../js/sweetalert.min.js" type="text/javascript"></script>
<script src="hightchart/highcharts.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="hightchart/js/modules/exporting.js" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript" src="../../js/funcion_input_vacio.js"></script>
<style type="text/css" media="screen">
.form-control2 {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 12px;
    line-height: 1.42857143;
    color: #555;
    background-color: #ddd;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}

.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('../../images/loader.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
</style>
<style type="text/css" media="screen">
  .navbar-brand {
  padding: 0px; /* firefox bug fix */
}
.navbar-brand>img {
  height: 100%;
  padding: 15px; /* firefox bug fix */
  width: auto;
}
.navbar-brand {
  background: url(../../images/logo.png) center / contain no-repeat;
  width: 200px;
}
</style>
</head>

<body>
              <div class="loader"></div>
    <div class="header">
      <div class="bg-color">
        <header id="main-header">
        <nav class="navbar navbar-default navbar-fixed-top">
        <a href=""><div class="navbar-brand page-scroll"/></div></a>
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
        
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
             <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Alumnos<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="?open=alumnos">Ver Todos</a></li>
                  <li><a href="?open=agrealumnos">Agregar</a></li>
                  <li><a href="?open=calificacion">Subir Calificación(Final)</a></li>
                  <li><a href="?open=calificacion_kardex">Subir Calificación(Parcial)</a></li>
                  <li><a href="?open=edit_calificacion">Editar Calificación</a></li>

                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Documentos<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="?open=kardex">Acta de Titulación</a></li>
                  <li><a href="?open=constancias">Constancia</a></li>
                  <li><a href="?open=doc_kardex">Constancia con calificasiones</a></li>
                  <li><a href="?open=kardex">Kardex</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="?open=bitacoras">Bitacoras</a></li> 
                </ul>
              </li>
                  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Departamento<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="?open=nuevo_Ad">Nuevo Adeudo</a></li>
                  <li><a href="?open=docentes">Agregar Docente</a></li>
                  <li><a href="?open=verdocentes">Ver Docentes</a></li>
                </ul>
              </li>
               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Datos<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="?open=carreras">Carreras</a></li>
                   <li><a href="?open=materias">Materias</a></li>  
                </ul>
              </li>

                  <li><a href="Log/logout.php"><i class="glyphicon glyphicon-off"></i> Cerrar sesion</a></li>
                </ul>
            </div>
          </div>
        </nav>
        </header>

<br><br>
        
        <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="banner-info text-center wow fadeIn delay-05s">
              <h1 class="bnr-title" >Buscar<span> Alumno</span></h1>
              <CENTER><form method="post" class="form-inline" role="form" action="?open=b_alumnos">
                        <div class="form-group">
    <label class="sr-only" for="ejemplo_email_2">Matricula</label>
    <input type="text" name="FI" class="form-control"
           placeholder="Matricula">
  </div>
  <div class="form-group">
    <label class="sr-only" for="ejemplo_password_2">Nombre</label>
    <input type="text" name="FF" class="form-control" id="FF" 
           placeholder="Nombre" onkeyup="mayus(this);">
  </div>
  <button type="submit" class="btn btn-success">Buscar</button>
               </form></CENTER><hr>
               <?php include "Opciones.php";?>
            </div>
          </div>
        </div>
        </div>
    </body>
<script type="text/javascript">

      $(window).on("load", function() {
          $(".loader").fadeOut("slow");
      });

</script>
<script type="text/javascript">
          function mayus(e) {
              e.value = e.value.toUpperCase();
          }
</script>
</html>