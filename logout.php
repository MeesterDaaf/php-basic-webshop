<?php

//ga door op de volgende sessie 
session_start();

//eindig de sessie
session_destroy();

//stuur de gebruiker naar het begin van de app
header("location: index.php");