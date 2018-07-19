  $('#departamento').on('change', function(e){
        console.log(e);
        var id_departamento = e.target.value;
        $.get('/json-municipios?id_departamento=' + id_departamento,function(data) {
          console.log(data);
           $('#ciudad').empty();
          $('#ciudad').append('<option value="0" disable="true" selected="true">Seleccionar municipio</option>');

          $.each(data, function(index, municipioObj){
            $('#ciudad').append('<option value="'+ municipioObj.municipio +'">'+ municipioObj.municipio +'</option>');
          })
          });
        });
