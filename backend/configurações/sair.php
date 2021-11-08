<?php
session_start();

unset($_SESSION['autorizado']);
header("Location: index.php");
