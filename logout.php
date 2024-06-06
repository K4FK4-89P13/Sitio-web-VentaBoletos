<?php
session_start();
session_destroy();
header('Location: controlAcceso.php');
exit();