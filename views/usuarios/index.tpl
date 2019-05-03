  <!-- Custom styles for this page -->
  <link href="<?php echo $_params['ruta_vendor'] ?>datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?php echo $this->titulo;?></h1>
          <p class="mb-4">Esta seccion administra los usuarios creados en el sistema, si desea agregar mas usuarios puede dar click <a href="<?php echo BASE_URL ?>usuarios/agregar/">aqui</a>.</p>

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
				     <?php for ($i = 0; $i < count($this->usuarios);$i++) : ?>
				        <tr>
				          <td><input type="checkbox" name="usuarios[]" value="<?php echo  $this->usuarios[$i]['idusuario']?>"></td>
				          <td><?php echo  $this->usuarios[$i]['nombres']?></td>
				          <td><?php echo  $this->usuarios[$i]['apellidos']?></td>
				          <td><?php echo  $this->usuarios[$i]['email']?></td>

				          <td><a class="btn btn-danger" href="<?php echo BASE_URL ?>index/eliminar/<?php echo  $this->usuarios[$i]['idusuario']?>" >Eliminar</a>

				  <a class="btn btn-success" href="<?php echo BASE_URL ?>index/editar/<?php echo  $this->usuarios[$i]['idusuario']?>" >Editar</a>

				          </td>
				        </tr>
				      <?php endfor; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>


  <script src="<?php echo $_params['ruta_vendor'] ?>datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo $_params['ruta_vendor'] ?>datatables/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">
  	
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


  </script>
