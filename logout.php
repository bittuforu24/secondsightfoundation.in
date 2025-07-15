<?php
session_start();
require_once("admin/inc/config.php");

session_destroy();
header("Location: index.php");
?>