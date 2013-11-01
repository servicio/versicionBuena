<?php

class Utilerias {

    function genera_password($longitud, $tipo = "alfanumerico") {

        if ($tipo == "alfanumerico") {
            $exp_reg = "[^A-Z0-9]";

//        return substr(eregi_replace($exp_reg, "", md5(rand())) .
//                eregi_replace($exp_reg, "", md5(rand())) .
//                eregi_replace($exp_reg, "", md5(rand())), 0, $longitud);

            return substr(eregi_replace($exp_reg, "", md5(rand())), 0, $longitud);
        }
    }

    function genera_md5($clave) {
        $codificado = md5($clave);
        return $codificado;
    }

}

?>