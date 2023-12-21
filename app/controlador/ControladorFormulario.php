<?php
//incluir base de datos modelo
class ControladorFormulario
{
    public static $error=0;

    private $datos;

    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    public static function valorVacio(...$valores)
    {
        $vacio=false;
        foreach ($valores as $valor) {
            if (empty($valor)) {
                return $vacio;
            }
            else{
                $vacio = false;
            }
        }
        return $vacio;
    }

    public static function validarNIF($nif)
    {
        $nif = strtoupper($nif);
        if (self::valorVacio($nif) && preg_match('/^[0-9]{8}[A-Z]$/', $nif)) {
            return true;
        } else {
            return false;
        }
    }

    public static function validarCorreo($correo)
    {
        if (self::valorVacio($correo) && preg_match('/^[a-z0-9_.+-]+@[a-z0-9-]+.[a-z0-9-.]+$/i', $correo)) {
            return true;
        } else {
            return false;
        }
    }

    public static function validarPass($pass, $pass2)
    {
        if (self::valorVacio($pass) && $pass == $pass2) {
            return password_hash($pass,PASSWORD_DEFAULT);
        } else {
            return false;
        }
    }

    public static function validar()
    {
        foreach (self::$datos as $clave => $valor) {

            switch ($clave) {
                case 'nif':
                    self::validarNIF($valor) ? (self::$datos[$clave] = "El NIF no es válido." && self::$error = 2): true;
                    empty($valor) ? self::$datos[$clave] = "El campo $clave no puede estar vacío." && self::$error = 1 : true;
                    break;
                case 'correo':
                    self::validarCorreo($valor) ? (self::$datos[$clave] = "El correo no es correcto" && self::$error = 2): true;

                    break;
                case 'pass':
                    ($pass = self::validarPass($valor, self::$datos["pass2"])) == false ? (self::$datos[$clave] = "Las contraseñas no coinciden" && self::$error = 2): self::$datos[$clave] = $pass;
                    
                    break;
                default:
                    break;
            }
            
        }

        self::$error == 0 ? BaseDatos::registro(self::$datos) : $_SESSION["errores"][] = ["registro"][self::$error];
        
        return self::$datos;
    }
}
