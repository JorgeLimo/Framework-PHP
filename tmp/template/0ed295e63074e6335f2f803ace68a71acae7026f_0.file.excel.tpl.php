<?php
/* Smarty version 3.1.33, created on 2019-05-10 01:22:00
  from 'C:\xampp\htdocs\Framework-PHP\views\usuarios\excel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd4b618bf5e74_03689135',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ed295e63074e6335f2f803ace68a71acae7026f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Framework-PHP\\views\\usuarios\\excel.tpl',
      1 => 1557444119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd4b618bf5e74_03689135 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Importar Excel</h1>
<br>
                            <form role="form" id="form_excel" name="form_excel" method="post" action="" enctype="multipart/form-data">

                                <input type="file" name="excel" id="excel" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />

                                <button type="submit" style="margin-left:70px;" class="btn btn-primary">Subir Excel</button>
                            </form>
</div>




<?php echo '<script'; ?>
 type="text/javascript">
	
	$('#form_excel').on('submit', function(e) {
    e.preventDefault();

    var formData = new FormData($('#form_excel')[0]);

    var file = $('#excel').val().trim(); // consider giving this an id too

    if (file) {
        $.ajax({
            url: "<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/subirData",
            type: 'POST',
            data: formData,
            contentType:false,
            cache:false,
            processData:false,
            success: function(response) {

             console.log(response.trim());

            }

        });
    } else {
        alert("Seleccione un archivo excel");
    }
});

<?php echo '</script'; ?>
><?php }
}
