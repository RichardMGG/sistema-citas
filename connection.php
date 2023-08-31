<?php

$servername = "database1web.mysql.database.azure.com";
$username = "Admininistrador";
$password = "serverMartinWeb1_1";
$dbname = "citas-senati";

$database = mysqli_init();
mysqli_ssl_set($database,NULL,NULL, "ssl/DigiCertGlobalRootG2.crt.pem", NULL, NULL);
mysqli_real_connect($database, $servername, $username, $password, $dbname, 3306, MYSQLI_CLIENT_SSL);

if (!$database) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>