<?php
session_start();

session_destroy();
connection_aborted();
header("location:../index.php");

exit();

?>