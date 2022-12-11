$('#formLogin').submit(function(e){
    e.preventDefault();
    var usuario = $.trim($("#usuario").val());
    var password = $.trim($("#password").val());

    console.log(usuario.lenght);
    
    if(usuario.lenght == "" || password == ""){
        Swal.fire({
            icon:'warning',
            title: 'Debe ingresar un Usuario y/o Constraseña',
        });
        return false;
    }else{
        $.ajax({
            url:"bd/login.php",
            type:"POST",
            datatype:"json",
            data: {usuario:usuario, password:password},
            success:function(data){
                if(data == "null"){
                    Swal.fire({
                        icon:'error',
                        title:'Usuario y/o Contraseña incorrecta',
                    });
                }else{
                    Swal.fire({
                        icon:'success',
                        title:'La Conexion es exitosa',
                        confirmButtonColor:'#3085d6',
                        confirmButtonText:'Ingresar'
                    }).then((result) => {
                        if(result.value){
                            window.location.href = "vistas/cv/index.html";
                        }
                    }
                    )
                }
            }
        });
    }
});