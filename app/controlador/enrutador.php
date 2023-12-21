<?php
include "app/controlador/ControladorFormulario.php";
include "app/controlador/ControllerCorreo.php";

session_start();

// var_dump($_SESSION["usuario"]["correo"]);
// var_dump($_REQUEST);

$datos = array(
    'nombre' => '',
    'apellidos' => '',
    'nif' => '',
    'correo' => '',
    'pass' => '',
    'pass2' => ''
);

isset($_REQUEST["peticion"]) ? $peticion = $_REQUEST["peticion"] : $peticion = "";

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $peticion = "register";
}

// var_dump($_REQUEST["peticion"]);

switch ($peticion) {
    case 'register':
        $datos = ControladorFormulario::validar($_POST); 
        break;
    case 'correo':
        ControllerCorreo::activacion($_GET);
        break;
    default:

        break;
}

//Incluimos la vista correspondiente

// ControladorVistas::vistas();
include "app/vista/formulario.php";
