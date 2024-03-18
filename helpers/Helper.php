<?php
class Helper {
	
    public static function borrarSesion($nombre) {
        if (isset($_SESSION[$nombre])) {
            unset($_SESSION[$nombre]);
        }
    }
	  
}
?>