<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location: signin", true, 302); //to redirect back to "signin" after logging out
exit();
?>