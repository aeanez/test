
<form action="<?php echo base_url('test')?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="fecha">Fecha</label>
    <textarea id="fecha" class="form-control" name="fecha" rows="3"></textarea>
    <input id="datepicker" type="hidden">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Adjunta imagenes</label>
    <input type="file" class="form-control-file" name="images[]" multiple="multiple">
  </div>
  <input type="submit" value="enviar" />
</form>


<script>

	//selector de fechas
	$(function () {
	    $('#datepicker').datepicker({
	        dateFormat: "dd/mm/yy",
	        showOn: "button",
	        buttonText: "Selecciona la fecha de publicacion",
	        onSelect: function (selected_date) {
	            $('#fecha').val(selected_date);
	        }
	    });
	});

	//Funciona para limitar la cantidad de archivos que se pueden subir
	$(function(){
	    $("input[type='submit']").click(function(){
	        var $fileUpload = $("input[type='file']");
	        if (parseInt($fileUpload.get(0).files.length)>2){
	        	alert("Maximo 2 archivos");
	        	return false;
	        }
	    });    
	});
</script>
