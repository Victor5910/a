<?php
//incluir base de datos modelo
class ControladorErrores
{
    public static $errores = [
        "registro" => [
            1=>"Datos incorrectos",
            2=>"Alguno de los campos está vacio",
        ],
    ];

    public static function error($pantalla, $error){
        //Recorre todos los errores posibles y los devuelve
        //Util cuando son varios errores en el formulario
        foreach ($error as $valor) {
            $listaErrores[] = self::$errores[$pantalla][$valor];
        }

        return $listaErrores;
    }
}
