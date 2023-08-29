<?php

$database = new mysqli("database1web.mysql.database.azure.com", "Admininistrador", "serverMartinWeb1_1", "citas-senati");
if ($database->connect_error) {
    die("Connection failed:  " . $database->connect_error);
}
