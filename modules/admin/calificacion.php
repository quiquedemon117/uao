<?php
include_once "library/inc.sesadmin.php"; 
include_once "library/inc.connection.php"; 
include_once "library/inc.library.php";   
unset($_SESSION["cart"]);
unset($_SESSION["carrera"]);
unset($_SESSION["semestre"]);
unset($_SESSION["materia"]);
?>
  <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="banner-info text-center wow fadeIn delay-05s">
              <h1 class="bnr-title" >Seleccionar: Carrera, Semestre y Materia</span></h1>
              <CENTER><form method="post" name="califica" id="califica" class="form-inline" role="form" action="?open=lista_alumnos">
                        <div class="form-group">
    <label class="sr-only" for="ejemplo_email_2">Carrera</label>
     <select name='t10' id="carrera" class="form-control2" required ><option value="">Selecciona una carrera</option>
<?php
$mySql = "SELECT nombre_carrera FROM carrera  ORDER BY nombre_carrera";
$myQry = mysqli_query($koneksidb, $mySql)  or die ("error : ".mysqli_error($koneksidb));
 while ($myData = mysqli_fetch_array($myQry)) {

?>    
 <?php  echo "<option value='".$myData['nombre_carrera']."'>".ucwords($myData['nombre_carrera'])."</option>"; ?>

<?php
 } 
?>
  </select>
  </div>
  <div class="form-group">
    <label class="sr-only" for="ejemplo_password_2">Semestre</label>
  <input type="number" name="t11" class="form-control2" id="semestre" min="1" max="9" placeholder="Semestre">
  </div>
   <div class="form-group">
    <label class="sr-only" for="ejemplo_password_2">Materia</label>
   <select name='t12' id="t12" class="form-control2" required >
  </select>
</div>
  </div><br>
  <button name="btnSimpan" class="btn btn-success">Aceptar</button>
               </form></CENTER><hr>
            </div>
          </div>
        </div>
        </div>

          <script type="text/javascript">
                $(document).ready(function() {
                  $('#semestre').change(function(){
                    $.ajax({
                            type: "POST",
                            url: "selector.php",
                            data: $("#califica").serialize(),
                            success: function(data)
                            {
                                $('#t12').html(data).fadeIn();
                            }
                      });
                    });
                  });
            </script>