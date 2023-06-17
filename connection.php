<?php

$database = new mysqli("localhost", "root", "sge12345", "sistema-citas");
if ($database->connect_error) {
    die("Connection failed:  " . $database->connect_error);
}
