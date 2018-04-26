<?php
include_once "library/inc.sesadmin.php";
?>
<div class="col-md-offset-3 col-md-6">
<div class="form-group">
<form action="" method="post" enctype="multipart/form-data" name="adeudo" id="adeudo">
<table class="table table-hover table-condensed" width="100%" style="margin-top:0px;">
	<tr>
	  <thead colspan="3" class="thead-inverse"><h1>Nuevo Adeudo</h1></thead>
	</tr>
	  <tr>
	  <td width="10%"><strong>Matricula</strong></td>
	  <td width="1%"><strong>:</strong></td>
	  <td align="left"><input name="t1" class="form-control" required style="width: 200px;"/></td></tr>
	  <tr>
	  	<td><strong>Concepto</strong></td>
	  	<td><strong>:</strong></td>
	  	<td align="left"><textarea name="t2" class="form-control" type="text" value="" rows="12" required></textarea></td>
	  </tr>
	  
	<tr><td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td align="center"><button type="submit" class="btn btn-primary form-control" name="btnSimpan"  style="cursor:pointer;"><i class="
glyphicon glyphicon-floppy-disk"></i>Agregar</button></td>
    </tr>
</table>
</form>
</div>
</div>
<div id="mostrar"></div>
<script type="text/javascript">
                $(document).ready(function() {
                  $('#adeudo').submit(function(){
                    $.ajax({
                            type: "POST",
                            url: "?open=adeudo_existe",
                            data: $("#adeudo").serialize(),
                            success: function(data)
                            {
                                $('#mostrar').html(data);
                            }
                      });
                    });
                  });
</script>
