$(function(){
    $("#btnCategoria").click(function(){
        //alert("....");
        var nameCategoria = $("#nameCategoria").val();
/**/
        $.post("biblioteca/categorias", {"nombre": "loquesea"},  function(data){
            alert("Nombre  " + data[1].nombre);
        }
        );


        /* $.ajax({
            url: "https://dl.dropboxusercontent.com/s/0fjiokudqozthny/TestJSON?dl=0",
            method: "GET",
          //  data: {"nombre": nameCategoria},
            success: function(data){
                alert("Nombre  " + data[1].id);
              $('#sltCategoria').html('');

                $.each(result, function (i, item) {
                    $('#sltCategoria').append($('<option>', {
                        value: item.id,
                        text : item.nombre
                    }));
                });;
            }
        });  */
    });
});