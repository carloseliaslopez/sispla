
<?php
error_reporting(0);
require "../Datos/Conexion.php";

session_start();

if ($_POST){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username )||empty($password)){

         $smg_error = "Debe Ingresar un Usuario e ingresar una Clave";
         echo "<script> alert('".$smg_error."'); </script>";

    }else{

        $sql = "SELECT idRolUsuario, idUsuario, idRol, idOpciones, usuario, pwd, nombres, apellidos, correo, idEstado,firt_time, RolDescripcion, opcionDescripcion, num_intentos
            from vw_usuario_per_opc where usuario = '$username' and idEstado<>3";
            
        $resultado = $conexion -> query($sql);
        $num = $resultado -> num_rows;


        if ($num>0){

            $row = $resultado -> fetch_assoc();
            $password_bd = $row['pwd'];
            $pass_c = sha1($password);

            $_SESSION ['idUsuario'] = $row['idUsuario'];
            $_SESSION ['num_intentos'] = $row['num_intentos'];

            $idUsuario = $_SESSION ['idUsuario'];
            $intentos = $_SESSION ['num_intentos'];

                if ($password_bd == $pass_c){
                    $_SESSION ['usuario'] = $row['usuario'];
                    $_SESSION ['idRol'] = $row['idRol'];
                    $_SESSION ['idOpciones'] = $row['idOpciones'];
                    $_SESSION ['firt_time'] = $row['firt_time'];
                    
                    session_start();

                    $first_time = $_SESSION ['firt_time'];
                    
                    

                    if ($first_time == 0){
                        header("Location: password.php");
                    }else{
                        //header("Location: index.php");                    
                    }
                    
                }else{
                    
                        $cont_int =  $intentos -1;
                        $sql2 = "UPDATE intentos_permitido SET num_intentos  = '$cont_int' WHERE idUsuario = '$idUsuario' ";
                            
                        $resultado = $conexion -> query($sql2);

                    if($intentos == 0){
                           
                        $smg_error = "EL USUARIO HA SIDO BLOQUEADO CONTACTARSE CON SU ADMINISTRADOR  ";
                        echo "<script> alert('".$smg_error."'); </script>";

                    }else{

                                            
                        $smg_error = "Credenciales incorrectas - Intentos permitidos [".$cont_int."] antes que la cuenta se bloquee.";
                        echo "<script> alert('".$smg_error."'); </script>";
                    }  
                }

        }else{
            echo ("Credenciales incorrectas");

        }
    }
   
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="./dist/images/VERSATEC.svg" rel="icon" >
        <title>Inicio de Sesión</title>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body style="background-color: #606060;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Inicio de Sesión</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo $$_SERVER['PHP_SELF'];?>">
                                            <div class="form-group">
                                                <label class="small mb-1" for="username">Usuario</label>
                                                <input class="form-control py-4" id="username" name="username" type="text" placeholder="Usuario" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="password">Contraseña</label>
                                                <input class="form-control py-4" id="password" name="password"type="password" placeholder="Contraseña" />
                                            </div>
                                            <span span style="color:Red" id="smg_error"></span>                                          

                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!--<a class="small" href="#">¿Olvidó su Contraseña?</a>
                                                <a ></a>-->
                                                <button type = "submit" class="btn btn-primary" >Acceder</button>                                                
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

         
    </body>
</html>
