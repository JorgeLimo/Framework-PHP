    <script type="text/javascript">
      
      var tablaActual = {json_encode($usuarios)};
  
    </script>



   <div class="container-fluid">
   <h1 class="h3 mb-4 text-gray-800">{$tituloPagina|default:"Pagina administrable"}</h1>
   <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
      </div>

      <button style="float:right;margin-bottom: 50px;"  data-toggle="modal" data-target="#agregarUsuarioModal" class="btn btn-primary">Agregar Usuario</button>
      <div class="container">
    {if isset($usuarios)}
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
        {foreach item=usuario from=$usuarios}
        <tr data-user="{$usuario.idusuario}">
          <td><span id="editarNombre{$usuario.idusuario}">{$usuario.nombres}</span></td>
          <td><span id="editarApellido{$usuario.idusuario}">{$usuario.apellidos}</span></td>
          <td><span id="editarEmail{$usuario.idusuario}">{$usuario.email}</span></td>
          {if $usuario.estado == 1}
          <td><span id="editarEstado{$usuario.idusuario}">Activado</span></td>
          {else}
          <td><span id="editarEstado{$usuario.idusuario}">Borrado</span></td>
          {/if}
          <td>
            <a class="btn btn-danger" href="{$_layoutParams.root}index/eliminar/{$usuario.idusuario}" >Eliminar</a>
            <a id="btnCustomEdit{$usuario.idusuario}" class="btn btn-success" onclick="editarUsuario('{$usuario.idusuario}','{$usuario.nombres}','{$usuario.apellidos}','{$usuario.email}','{$usuario.estado}')" >Editar</a>
          </td>
        </tr>
        {/foreach}
      </tbody>
    </table>
    {else}
      <div class="alert alert-danger">No hay usuarios disponibles</div>
    {/if}
    </div>

<br>

<br>

<hr>

<br>

<br>

  <div class="container">
    


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
      <tbody id="loadBodyTable"></tbody>
     </table>


  </div>


    <script type="text/javascript">

      $( document ).ready(function() {
          

          var trString = "";

          for (var i = 0; i < tablaActual.length; i++) {

            var trInternal = "<tr data-userInfo='"+tablaActual[i].idusuario+"' ><td>"+tablaActual[i].nombres+"</td><td>"+tablaActual[i].apellidos+"</td><td>"+tablaActual[i].email+"</td><td>"+tablaActual[i].estado+"</td><td><button class='btn btn-success'>Editar</button></td></tr>";

            
            trString +=  trInternal;
          }

          $("#loadBodyTable").html(trString);


      });

      
      function editarUsuario(idusuario, nombres,apellidos, email, estado){

          $("#nombresData").val(nombres);
          $("#apellidosData").val(apellidos);
          $("#correoData").val(email);
          $("#estadoData").val(estado);
          $("#idusuarioData").val(idusuario);


        $("#exampleModal").modal("show");
      }


      function procesarDataGuardar(){


         var dat1 =  $("#nombresData2").val();
         var dat2 =  $("#apellidosData2").val();
         var dat3 =  $("#correoData2").val();
         var dat4 =  $("#estadoData2").val();

         if(dat1 == "" ||dat2 == "" ||dat3 == "" ||dat4 == ""){
            $("#msjResponse2").html('<div class="alert alert-danger">Ingrese todos los campos</div>');
            $("#agregarUsuarioModal").scrollTop(0);
            return false;
         }

        var formdata = new FormData();
        formdata.append("nombre", dat1);// <input  type= "text" name="nombre" value="jorge" />
        formdata.append("apellidos", dat2);
        formdata.append("email", dat3);
        formdata.append("estado", dat4);

              $.ajax({
                  url: '{$_layoutParams.root}index/agregarUsuario',
                  type: "POST",
                  data: formdata,
                  processData: false,
                  contentType: false,
                  success: function (response) {
                    console.log(response);
                    var obj = JSON.parse(response.trim());

                    if(obj.estado){
                        $("#msjResponse2").html('<div class="alert alert-success">'+obj.mensaje+'</div>');
            $("#agregarUsuarioModal").scrollTop(0);
                          $("#agregarUsuarioModal").modal("hide");

                    }else{
                        $("#msjResponse2").html('<div class="alert alert-danger">'+obj.mensaje+'</div>');
            $("#agregarUsuarioModal").scrollTop(0);
                    }
              
                  },error: function (xhr, ajaxOptions, thrownError) {

                  }
            });


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
                  url: '{$_layoutParams.root}index/procesar',
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

                      $("#editarNombre"+dat5).text(dat1);
                      $("#editarApellido"+dat5).text(dat2);
                      $("#editarEmail"+dat5).text(dat3);
                      if(dat4 == 0){
                        $("#editarEstado"+dat5).text("Borrado");
                      }else{
                        $("#editarEstado"+dat5).text("Activado");
                      }


                      $("#btnCustomEdit"+dat5).attr("onclick","editarUsuario('" + dat5 + "', '" + dat1 +"', '" + dat2 + "', '" + dat3 +"', '"+dat4+"')");

                       /**setTimeout(function(){ 
                        window.location.href= "{$_layoutParams.root}index/";
                       }, 2000);**/

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

    </script>


    <!-- Modal -->
    <div class="modal fade" id="agregarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="msjResponse2"></div>
            <div class="form-group">
              <label for="nombresData2">Nombres</label>
              <input type="text" class="form-control" id="nombresData2" name="nombresData2" placeholder="Ingrese su(s) nombre(s)">
            </div>

              <div class="form-group">
              <label for="apellidosData2">Apellidos</label>
              <input type="text" class="form-control" id="apellidosData2"  name="apellidosData2"  placeholder="Ingrese sus apellidos">
            </div>

              <div class="form-group">
              <label for="correoData2">Correo</label>
              <input type="text" class="form-control" id="correoData2"  name="correoData2"  placeholder="Ingrese un email">
            </div>
           
              <div class="form-group">
              <label for="estadoData2">Estado</label>
              <select class="form-control" id="estadoData2" name="estadoData2">
                <option value="1">Si</option>
                <option value="0">No</option>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" onclick="procesarDataGuardar()" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>




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

