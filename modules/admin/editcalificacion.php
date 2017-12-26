<?php
include_once "library/inc.sesadmin.php";
include_once "library/inc.library.php";
include_once "library/inc.connection.php";
unset($_SESSION["carrera"]);
unset($_SESSION["semestre"]);
unset($_SESSION["materia"]);
?>
<h1 class="bnr-title" >Seleccionar<span> Datos</span></h1>
              <CENTER><form method="post" id="califica" class="form-inline" role="form" action="?open=act_cali">
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
  </select></div> <div class="form-group">
           <label class="sr-only" for="ejemplo_email_2">Semestre</label>
  <input type="number" name="t11" class="form-control2" id="semestre" min="1" max="9" placeholder="Semestre">
</div> <div class="form-group">
   <label class="sr-only" for="ejemplo_password_2">Materia</label>
      <select name='t12' id="t12" class="form-control2" required >
  </select>
      </div>   
  
  <button type="submit" name="btnSimpan" class="btn btn-success">Cargar</button>
               </form></CENTER>

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
           