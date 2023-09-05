<?php
session_start();
if (!isset($_SESSION['idUsuario'])){
    header("Location: ../dist/login.php");
}

$nombre = $_SESSION['idUsuario'];


?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inicio de Sesión</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/pwdInfoBox.css" rel="stylesheet" />
        <style type="text/css">
            
            .confirmacion{background:#C6FFD5;border:1px solid green;}
            .negacion{background:#ffcccc;
                border:1px solid red;
               
        
        
        }
            
        </style>

    </head>
    <body style="background-color: #808080;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Cambiar contraseña</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="../negocio/Ng_Usuario.php">
                                            
                                            
                                            
                                            <!-- Mensajes de Verificación -->

                                            <div class="form-group">
                                                <label class="small mb-1" for="newpwd">Ingresar nueva contraseña</label>
                                                <input class="form-control py-4" id="newpwd" name="newpwd" type="password" placeholder="Ingresar nueva contraseña" />
                                                <input type="hidden" id="txtaccion" name="txtaccion" value="3"/>
                                                <input type="hidden" name="idUsuario" id="idUsuario" />
                                            </div>
                                            <div id="pswd_info">
                                                <h6>La contraseña debe cumplir con los siguientes requisitos:</h6>
                                                <ul>
                                                <li id="letter" class="invalid">Al menos <strong>1 minuscula</strong></li>
                                                <li id="capital" class="invalid">Al menos <strong>1 mayuscula</strong></li>
                                                <li id="number" class="invalid">Al menos <strong>1 número</strong></li>
                                                <li id="length" class="invalid">Como minimo <strong>8 carácteres</strong></li>
                                                </ul>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="Cnewpwd">Confirmar nueva contraseña</label>
                                                <input class="form-control py-4" id="Cnewpwd" name="Cnewpwd"type="password" placeholder="Confirmar contraseña" />
                                            </div>
                                                                                     
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a ></a>
                                                <a ></a>
                                                <button type = "submit" class="btn btn-primary" >Cambiar Contraseña</button>
                                                
                                            </div>
                                            
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer" >
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Todos los derechos Reservados &copy; Versatec-Nicaragua 2022</div>
                            <div>
                                <a href="#">Politica de Privacidad</a> &middot;
                                <a href="#">Terminos  &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

        <script>
            function setValoresEmp()
            {
                $("#idUsuario").val("<?php echo $nombre ?>");
               
            }

        </script>

        <script>
            $(document).ready(function() {

                $('input[id=newpwd]').keyup(function() {
                    // set password variable
                    var pswd = $(this).val();
                    //validate the length
                    if ( pswd.length < 8 ) {
                        $('#length').removeClass('valid').addClass('invalid');
                    } else {
                        $('#length').removeClass('invalid').addClass('valid');
                    }

                    //validate letter
                    if ( pswd.match(/[a-z]/) ) {
                        $('#letter').removeClass('invalid').addClass('valid');
                    } else {
                        $('#letter').removeClass('valid').addClass('invalid');
                    }

                    //validate capital letter
                    if ( pswd.match(/[A-Z]/) ) {
                        $('#capital').removeClass('invalid').addClass('valid');
                    } else {
                        $('#capital').removeClass('valid').addClass('invalid');
                    }

                    //validate number
                    if ( pswd.match(/\d/) ) {
                        $('#number').removeClass('invalid').addClass('valid');
                    } else {
                        $('#number').removeClass('valid').addClass('invalid');
                    }

                }).focus(function() {
                    $('#pswd_info').show();
                }).blur(function() {
                    $('#pswd_info').hide();
                });

            });
        </script>
        <script>
            $(document).ready(function() {
                //variables
                var pass1 = $('[name=newpwd]');
                var pass2 = $('[name=Cnewpwd]');
                var confirmacion = "Las contraseñas si coinciden";
                var negacion = "No coinciden las contraseñas";
                //oculto por defecto el elemento span
                var span = $('<div ></div>').insertAfter(pass2);
                span.hide();
                //función que comprueba las dos contraseñas
                function coincidePassword(){
                var valor1 = pass1.val();
                var valor2 = pass2.val();
                //muestro el span
                span.show().removeClass();
                //condiciones dentro de la función
                if(valor1 != valor2){
                span.text(negacion).removeClass("confirmacion").addClass('negacion');	
                }
                
                if(valor1.length!=0 && valor1==valor2){
                span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
                
                }
                }
                //ejecuto la función al soltar la tecla
                pass2.keyup(function(){
                coincidePassword();
                });
            });
        </script>
        



    </body>
</html>
