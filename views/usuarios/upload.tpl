<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Subir carga masiva</h1>
<br>
<form>
  <div id="msjReponseData"></div>
  <div class="form-group">
    <label for="exampleInputEmail1">Archivo Excel : </label>
    <input type="file" id="fileData1" name="fileData1"  accept="image/*">
    <small id="emailHelp" class="form-text text-muted">Si no conoce la estructura del archivo excel puede descargarla dando <a href="#!">click aqui</a>.</small>
  </div>
  <button type="button" onclick="subirArchivoData()" class="btn btn-primary">Cargar</button>
</form>
</div>


<script type="text/javascript">
		
	function subirArchivoData(){

		var file = $("#fileData1").val();

		console.log(file);

		if(file == ""){
			Swal.fire('¡¡Nos falto algo!!','Seleccione el archivo que desea importar','warning');
			return false;
		}


        var fileAux = $('input#fileData1')[0].files[0];

	      var formData = new FormData();//<form></form>
	      formData.append("fileData", fileAux);// <input type="file" name="fileData" value="C:/....">

        	$.ajax({
                  url: '{$_layoutParams.root}usuarios/procesararchivo',
                  type: "POST",
                  data: formData,
                  processData: false,
                  contentType: false,
                  success: function (response) {
                    console.log(response);
                    var obj = JSON.parse(response.trim());
                    Swal.fire('¡¡Se agrego correctamente!!',obj.mensaje,'success');
                    $('input#fileData1').val("");
                    console.log(obj);
                  },error: function (xhr, ajaxOptions, thrownError) {
                  	console.log(xhr);
                  	console.log(thrownError);
                  }
            });


	}

</script>