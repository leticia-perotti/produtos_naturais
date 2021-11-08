<?php

session_start();

if (isset ($SESSION['autorizado']) | $SESSION['autorizado']=false )
if ( ! (isset($_SESSION['autorizado']) && $_SESSION['autorizado']==true)) {

    header("location: ../index.php");
}
