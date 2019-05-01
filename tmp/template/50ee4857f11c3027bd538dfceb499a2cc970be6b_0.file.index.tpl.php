<?php
/* Smarty version 3.1.33, created on 2019-05-01 02:57:45
  from 'C:\xampp\htdocs\Framework-PHP\views\login\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc8ef092dc4e0_26751426',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50ee4857f11c3027bd538dfceb499a2cc970be6b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Framework-PHP\\views\\login\\index.tpl',
      1 => 1556672256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc8ef092dc4e0_26751426 (Smarty_Internal_Template $_smarty_tpl) {
?><style type="text/css">
	body{
	  background-color: #4e73df;
	  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(10%, #4e73df), to(#224abe));
	  background-image: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
	  background-size: cover;
	}
</style>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form id="formLoginData" action="" method="post" onsubmit="return validarLogin()">
                  	 	<input type="hidden" name="enviar" value="1">
						<div id="msjResponse"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['_errormsj']->value)===null||$tmp==='' ? '' : $tmp);?>
</div>
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="pwd" name="pwd" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Acceder</button>

                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>







<!--

<?php echo '<script'; ?>
 type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">




<div class="container">
	
	 <form >

	  <div class="form-group">
	    <label for="email">Email:</label>
	    <input type="text" class="form-control" name="email" id="email">
	  </div>
	  <div class="form-group">
	    <label for="pwd">Contraseña:</label>
	    <input type="password" class="form-control" name="pwd" id="pwd" >
	  </div>
	  <button type="submit" class="btn btn-info">Acceder</button>
	
	</form> 



	-->

		<?php echo '<script'; ?>
 type="text/javascript">
		
		function validarLogin(){
			
			var dato1 =	$("#email").val();
			var dato2 =	$("#pwd").val();

			if(dato1 == ""){
				$("#msjResponse").html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Ingresa un email</div>');
				//alert("Ingresa un email");
				return false;
			}	

			if(dato2 == ""){
				$("#msjResponse").html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Ingresa una contraseña</div>');
				//alert("Ingresa una contraseña");
				return false;
			}


			return true
				//$("#msjResponse").html('<div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> Login Correcto</div>');
		}

	<?php echo '</script'; ?>
>
<?php }
}
