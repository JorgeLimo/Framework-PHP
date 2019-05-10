<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Importar Excel</h1>
<br>
                            <form role="form" id="form_excel" name="form_excel" method="post" action="" enctype="multipart/form-data">

                                <input type="file" name="excel" id="excel" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />

                                <button type="submit" style="margin-left:70px;" class="btn btn-primary">Subir Excel</button>
                            </form>
</div>




<script type="text/javascript">
	
	$('#form_excel').on('submit', function(e) {
    e.preventDefault();

    var formData = new FormData($('#form_excel')[0]);

    var file = $('#excel').val().trim(); // consider giving this an id too

    if (file) {
        $.ajax({
            url: "{$_layoutParams.root}usuarios/subirData",
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

</script>