<?php
/* Smarty version 3.1.33, created on 2019-05-01 03:00:08
  from 'C:\xampp\htdocs\Framework-PHP\views\index\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc8ef98d486f9_84054363',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97826432c8553570dee7335f6f35296c7382bcbf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Framework-PHP\\views\\index\\index.tpl',
      1 => 1556672406,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc8ef98d486f9_84054363 (Smarty_Internal_Template $_smarty_tpl) {
?>        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>




   <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
      </div>

      <div class="container">
        
    <table class="table">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>acccion</th>
        </tr>
      </thead>
      <tbody>
       
      <?php echo '<?php ';?>for ($i = 0; $i < count($this->usuarios);$i++) : <?php echo '?>';?>
        <tr>
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
        <!-- /.container-fluid -->


<?php }
}
