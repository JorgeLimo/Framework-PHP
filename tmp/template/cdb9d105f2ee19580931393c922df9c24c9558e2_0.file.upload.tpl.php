<?php
/* Smarty version 3.1.33, created on 2019-05-03 03:32:08
  from 'C:\xampp\htdocs\Framework-PHP\views\usuarios\upload.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ccb9a1871d3f6_00975981',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cdb9d105f2ee19580931393c922df9c24c9558e2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Framework-PHP\\views\\usuarios\\upload.tpl',
      1 => 1556847126,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ccb9a1871d3f6_00975981 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@8"><?php echo '</script'; ?>
>

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


<?php echo '<script'; ?>
 type="text/javascript">
		
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
                  url: '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/procesararchivo',
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

<?php echo '</script'; ?>
><?php }
}
