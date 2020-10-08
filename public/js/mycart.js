$(document).ready(function () {
    //Delete course into my cart
    $(document).on('click','.deleteCart',function (e) {
        e.preventDefault();
        let idCourse = $(this).attr('id');
        let id_user_generate = $('#id_generate_user').text();
        let nameCourse = $('.nombre-producto').text();
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
            title: "Desea eliminarlo de su carrito?",
            text: "Curso: "+nameCourse,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "in_shopping_carts/"+idCourse,
                    dataType: "JSON",
                    data: {
                        "id":idCourse,
                        "_token":token,
                        "id_user_generate":id_user_generate,
                        "_method":'DELETE'
                    },
                    success: function (response) {
                        $(".mycartcircule").html(response.products_count);
                        swal("Bien! El producto "+nameCourse+" ha sido eliminado", {
                            icon: "success",
                        });
                        $('.mycartcircule').css('background-color', "#922403");
                        setTimeout(function () { 
                            restartButton2();
                            location.reload('/mycart');
                        },5000);
                    },
                    error:function(response){
                        swal("No se eliminó de su carrito!");
                    }
                });
            } else {
              swal("No se eliminó de su carrito!");
            }
          }); 
    });

    // add courses into my cart
    $(".add-to-cart").on("submit",function (ev) {
        ev.preventDefault();
        
        var $form = $(this);
        var $button = $form.find("[type='submit']");

        // Petición ajax

        $.ajax({
            url:$form.attr("action"),
            method:$form.attr("method"),
            data:$form.serialize(),
            dataType:"JSON",
            beforeSend:function () { 
                $button.val("Cargando...");
            },
            success:function (data) {
                $button.css("background-color","#00c852").val("Agregado");
                $('.mycartcircule').css('background-color', "#922403");
                // Actualizar contador de carritos
                $(".mycartcircule").html(data.products_count);

                setTimeout(function () { 
                    restartButton($button);
                },2000);
            },
            error:function (err) {
                $button.css("background-color","#d50000").val("Hubo un error");
                setTimeout(function () { 
                    restartButton($button);
                },2000);
            }
        });
        return false;
    });

    function restartButton($button) { 
        $button.val("Agregar al carrito").attr("style","");
        $('.mycartcircule').css('background-color', "#33b5e5");
    }
    function restartButton2() {
        $('.mycartcircule').css('background-color', "#33b5e5");
    }

    $(document).on('click','.input-pago',function (e) {
        var radioBTN = $(this).attr('id');
        console.log(radioBTN);
        if (radioBTN==="gridRadios1") {//credit-card
            $('#box-paypal').hide(1000);
            $('#box-oxxo').hide(1000);
            $('#box-spei').hide(1000);
            $('#box-creditdebi').show(1000);
        }else if(radioBTN==="gridRadios2"){//paypal
            $('#box-creditdebi').hide(1000);
            $('#box-oxxo').hide(1000);
            $('#box-spei').hide(1000);
            $('#box-paypal').show(1000);
        }else if(radioBTN==="gridRadios3"){ //oxxo
            $('#box-creditdebi').hide(1000);
            $('#box-paypal').hide(1000);
            $('#box-spei').hide(1000);
            $('#box-oxxo').show(1000);
        }else if(radioBTN==="gridRadios4"){ //spei
            $('#box-creditdebi').hide(1000);
            $('#box-paypal').hide(1000);
            $('#box-oxxo').hide(1000);
            $('#box-spei').show(1000);
        }
        // dvPassport.style.display = chkYes.checked ? "block" : "none";
    });
});