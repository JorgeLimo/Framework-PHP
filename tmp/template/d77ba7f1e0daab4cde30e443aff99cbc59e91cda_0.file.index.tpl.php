<?php
/* Smarty version 3.1.33, created on 2019-05-03 02:35:09
  from 'C:\xampp\htdocs\Framework-PHP\views\usuarios\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ccb8cbd1a6da3_47843258',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd77ba7f1e0daab4cde30e443aff99cbc59e91cda' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Framework-PHP\\views\\usuarios\\index.tpl',
      1 => 1556247954,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ccb8cbd1a6da3_47843258 (Smarty_Internal_Template $_smarty_tpl) {
?>  <!-- Custom styles for this page -->
  <link href="<?php echo '<?php ';?>echo $_params['ruta_vendor'] <?php echo '?>';?>datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?php echo '<?php ';?>echo $this->titulo;<?php echo '?>';?></h1>
          <p class="mb-4">Esta seccion administra los usuarios creados en el sistema, si desea agregar mas usuarios puede dar click <a href="<?php echo '<?php ';?>echo BASE_URL <?php echo '?>';?>usuarios/agregar/">aqui</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lista de usuarios</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
			          <th>Check</th>
			          <th>Firstname</th>
			          <th>Lastname</th>
			          <th>Email</th>
			          <th>acccion</th>
                    </tr>
                  </thead>
                  <tbody>
				     <?php echo '<?php ';?>for ($i = 0; $i < count($this->usuarios);$i++) : <?php echo '?>';?>
				        <tr>
				          <td><input type="checkbox" name="usuarios[]" value="<?php echo '<?php ';?>echo  $this->usuarios[$i]['idusuario']<?php echo '?>';?>"></td>
				          <td><?php echo '<?php ';?>echo  $this->usuarios[$i]['nombres']<?php echo '?>';?></td>
				          <td><?php echo '<?php ';?>echo  $this->usuarios[$i]['apellidos']<?php echo '?>';?></td>
				          <td><?php echo '<?php ';?>echo  $this->usuarios[$i]['email']<?php echo '?>';?></td>

				          <td><a class="btn btn-danger" href="<?php echo '<?php ';?>echo BASE_URL <?php echo '?>';?>index/eliminar/<?php echo '<?php ';?>echo  $this->usuarios[$i]['idusuario']<?php echo '?>';?>" >Eliminar</a>

				  <a class="btn btn-success" href="<?php echo '<?php ';?>echo BASE_URL <?php echo '?>';?>index/editar/<?php echo '<?php ';?>echo  $this->usuarios[$i]['idusuario']<?php echo '?>';?>" >Editar</a>

				          </td>
				        </tr>
				      <?php echo '<?php ';?>endfor; <?php echo '?>';?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>


  <?php echo '<script'; ?>
 src="<?php echo '<?php ';?>echo $_params['ruta_vendor'] <?php echo '?>';?>datatables/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo '<?php ';?>echo $_params['ruta_vendor'] <?php echo '?>';?>datatables/dataTables.bootstrap4.min.js"><?php echo '</script'; ?>
>

  <?php echo '<script'; ?>
 type="text/javascript">
  	
  	// Call the dataTables jQuery plugin
	$(document).ready(function() {
	  $('#dataTable').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ usuarios",
            "zeroRecords": "Nothing found - sorry",
            "info": "Mostrando _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    } );
	});


  <?php echo '</script'; ?>
>
<?php }
}
