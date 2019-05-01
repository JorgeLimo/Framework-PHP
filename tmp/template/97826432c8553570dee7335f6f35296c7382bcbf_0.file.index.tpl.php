<?php
/* Smarty version 3.1.33, created on 2019-05-01 05:13:43
  from 'C:\xampp\htdocs\Framework-PHP\views\index\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc90ee7234246_61750492',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97826432c8553570dee7335f6f35296c7382bcbf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Framework-PHP\\views\\index\\index.tpl',
      1 => 1556680421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc90ee7234246_61750492 (Smarty_Internal_Template $_smarty_tpl) {
?>   <div class="container-fluid">
   <h1 class="h3 mb-4 text-gray-800"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['tituloPagina']->value)===null||$tmp==='' ? "Pagina administrable" : $tmp);?>
</h1>
   <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
      </div>
      <div class="container">
    <?php if (isset($_smarty_tpl->tpl_vars['usuarios']->value)) {?>
    <table class="table">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>Estado</th>
          <th>acccion</th>
        </tr>
      </thead>
      <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'usuario');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['usuario']->value) {
?>
        <tr>
          <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['nombres'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['apellidos'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['email'];?>
</td>
          <?php if ($_smarty_tpl->tpl_vars['usuario']->value['estado'] == 1) {?>
          <td>Activado</td>
          <?php } else { ?>
          <td>Borrado</td>
          <?php }?>
          <td>
            <a class="btn btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
index/eliminar/<?php echo $_smarty_tpl->tpl_vars['usuario']->value['idusuario'];?>
" >Eliminar</a>
            <a class="btn btn-success" onclick="editarUsuario('<?php echo $_smarty_tpl->tpl_vars['usuario']->value['idusuario'];?>
','<?php echo $_smarty_tpl->tpl_vars['usuario']->value['nombres'];?>
','<?php echo $_smarty_tpl->tpl_vars['usuario']->value['apellidos'];?>
','<?php echo $_smarty_tpl->tpl_vars['usuario']->value['email'];?>
','<?php echo $_smarty_tpl->tpl_vars['usuario']->value['estado'];?>
')" >Editar</a>
          </td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </tbody>
    </table>
    <?php } else { ?>
      <div class="alert alert-danger">No hay usuarios disponibles</div>
    <?php }?>
    </div>

    <?php echo '<script'; ?>
 type="text/javascript">
      
      function editarUsuario(idusuario, nombres,apellidos, email, estado){

          $("#nombresData").val(nombres);
          $("#apellidosData").val(apellidos);
          $("#correoData").val(email);
          $("#estadoData").val(estado);
          $("#idusuarioData").val(idusuario);


        $("#exampleModal").modal("show");
      }

      function procesarData(){

         var dat1 =  $("#nombresData").val();
         var dat2 =  $("#apellidosData").val();
         var dat3 =  $("#correoData").val();
         var dat4 =  $("#estadoData").val();
         var dat5 =  $("#idusuarioData").val();



         if(dat1 == "" ||dat2 == "" ||dat3 == "" ||dat4 == ""){
            $("#msjResponse").html('<div class="alert alert-danger">Ingrese todos los campos</div>');
            $("#exampleModal").scrollTop(0);
            return false;
         }


        var formdata = new FormData();
        formdata.append("nombre", dat1);// <input  type= "text" name="nombre" value="jorge" />
        formdata.append("apellidos", dat2);
        formdata.append("email", dat3);
        formdata.append("estado", dat4);
        formdata.append("idusuario", dat5);

            $.ajax({
                  url: '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
index/procesar',
                  type: "POST",
                  data: formdata,
                  processData: false,
                  contentType: false,
                  success: function (response) {
                    console.log(response);
                    var obj = JSON.parse(response.trim());
                    
                    if(obj.estado){
                      $("#msjResponse").html('<div class="alert alert-success">'+obj.mensaje+'</div>');
                      $("#exampleModal").scrollTop(0);

                       setTimeout(function(){ 
                        window.location.href= "<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
index/";
                       }, 2000);

                      return false;
                    }else{
                      $("#msjResponse").html('<div class="alert alert-danger">'+obj.mensaje+'</div>');
                      $("#exampleModal").scrollTop(0);
                      return false;                      
                    }

                  },error: function (xhr, ajaxOptions, thrownError) {

                  }
            });


      }

    <?php echo '</script'; ?>
>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="msjResponse"></div>
            <input type="hidden" name="idusuario" id="idusuarioData">
            <div class="form-group">
              <label for="nombresData">Nombres</label>
              <input type="text" class="form-control" id="nombresData" name="nombresData" placeholder="Ingrese su(s) nombre(s)">
            </div>

              <div class="form-group">
              <label for="apellidosData">Apellidos</label>
              <input type="text" class="form-control" id="apellidosData"  name="apellidosData"  placeholder="Ingrese sus apellidos">
            </div>

              <div class="form-group">
              <label for="correoData">Correo</label>
              <input type="text" class="form-control" id="correoData"  name="correoData"  placeholder="Ingrese un email">
            </div>
           
              <div class="form-group">
              <label for="estadoData">Estado</label>
              <select class="form-control" id="estadoData" name="estadoData">
                <option value="1">Si</option>
                <option value="0">No</option>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" onclick="procesarData()" class="btn btn-primary">Editar</button>
          </div>
        </div>
      </div>
    </div>

<?php }
}
