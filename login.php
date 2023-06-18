<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon.ico">

    <title>Acceder</title>

</head>

<body>
    <?php

    //learn from w3schools.com
    //Unset all the server side variables

    session_start();

    $_SESSION["user"] = "";
    $_SESSION["usertype"] = "";

    // Set the new timezone
    date_default_timezone_set('America/Bogota');
    $date = date('Y-m-d');

    $_SESSION["date"] = $date;


    //import database
    include("connection.php");





    if ($_POST) {

        $email = $_POST['useremail'];
        $password = $_POST['userpassword'];

        $error = '<label for="promter" class="form-label"></label>';

        $result = $database->query("select * from webuser where email='$email'");
        if ($result->num_rows == 1) {
            $utype = $result->fetch_assoc()['usertype'];
            if ($utype == 'p') {
                $checker = $database->query("select * from patient where pemail='$email' and ppassword='$password'");
                if ($checker->num_rows == 1) {


                    //   Patient dashbord
                    $_SESSION['user'] = $email;
                    $_SESSION['usertype'] = 'p';

                    header('location: patient/index.php');
                } else {
                    $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Credenciales incorrectas: correo electrónico o contraseña no válidos</label>';
                }
            } elseif ($utype == 'a') {
                $checker = $database->query("select * from admin where aemail='$email' and apassword='$password'");
                if ($checker->num_rows == 1) {


                    //   Admin dashbord
                    $_SESSION['user'] = $email;
                    $_SESSION['usertype'] = 'a';

                    header('location: admin/index.php');
                } else {
                    $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Credenciales incorrectas: correo electrónico o contraseña no válidos</label>';
                }
            } elseif ($utype == 'd') {
                $checker = $database->query("select * from doctor where docemail='$email' and docpassword='$password'");
                if ($checker->num_rows == 1) {


                    //   doctor dashbord
                    $_SESSION['user'] = $email;
                    $_SESSION['usertype'] = 'd';
                    header('location: doctor/index.php');
                } else {
                    $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Credenciales incorrectas: correo electrónico o contraseña no válidos</label>';
                }
            }
        } else {
            $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">No podemos encontrar ninguna cuenta para este correo electrónico</label>';
        }
    } else {
        $error = '<label for="promter" class="form-label">&nbsp;</label>';
    }

    ?>

    <div id="padre">
        <div class="fullPage">
            <div class="brandingWrapper">
                <div class="branding"></div>
            </div>

            <div class="contentWrapper">
                <div class="header">                          
                    <img src="./img/logoSenati.png"> 
                    <h1 class="heading-text">BIENVENIDO ESTUDIANTE</h1>
                </div>

                <div class="content">

                    <form class="login-form" action="" method="POST">
                        <h3 class="sub-text">Ingresa tu cuenta</h3>
                        
                        <!-- <label for="useremail" class="form-label">Correo Electrónico: </label> -->
                        <div class="label-td">
                                <input type="email" name="useremail" class="input-text" placeholder="Correo Electrónico" required>
                        </div>

                        <!-- <label for="userpassword" class="form-label">Contraseña: </label> -->
                        <div class="label-td">
                                <input type="Password" name="userpassword" class="input-text" placeholder="Contraseña" required>
                        </div>

                        <div><br>
                            <?php echo $error ?>
                        </div>

                        <div>
                            <input type="submit" value="Acceder" class="login-btn btn-primary btn">
                        </div>
                    </form>
                
                    <!-- <tr>
                        <td>
                            <br>
                            <label for="" class="sub-text" style="font-weight: 280;">Aún no tienes cuenta&#63 </label>
                            <a href="signup.php" class="hover-link1 non-style-link">Regístrate</a>
                            <br><br><br>
                        </td>
                    </tr> -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>