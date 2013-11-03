<?php

session_start();

class validacionseSession {

    function verificacionDeLogue() {
        $usuario = $_SESSION['Usuario'];
        if ($usuario == null) {
            header('Location: login.php');
        }
    }

    function verificacionSession() {
        $usuarioSession = $_SESSION['Usuario'];
        if ($usuarioSession != null) {
            header('Location: index.php');
        }
    }

}

?>
