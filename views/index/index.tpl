        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">{$titulo}</h1>




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
       
      <?php for ($i = 0; $i < count($this->usuarios);$i++) : ?>
        <tr>
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
        <!-- /.container-fluid -->


