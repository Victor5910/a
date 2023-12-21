<?php
//Debéis crear un método en el controlador que se encargue de generar el código QR
// Generar un código QR con PHP
//Para instalar el paquete endroid/qr-code
// composer require endroid/qr-code
// Información sobre el paquete endroid/qr-code
// https://packagist.org/packages/endroid/qr-code

require '../vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

// Tus datos
$id_usuario = 'serafina';
$butaca = 'butaca12';
$id_sesion = 'id_sesion12';

// Generar el contenido del QR
$contenido = $id_usuario . '-' . $butaca . '-' . $id_sesion;

// Crear el objeto QR
$qrCode = QrCode::create($contenido)
    ->setSize(300) // Tamaño en píxeles
    ->setMargin(10);

// Generar un nombre único para la imagen
$nombre_imagen = 'QR' . uniqid() . '.png';

// Ruta de la carpeta donde se almacenará la imagen
$ruta_carpeta = 'QR/';

// Asegurarse de que la carpeta existe
if (!file_exists($ruta_carpeta)) {
    mkdir($ruta_carpeta, 0777, true);
}

// Ruta completa del archivo
$ruta_archivo = $ruta_carpeta . $nombre_imagen;

// Esta clase se utiliza para generar una imagen PNG de un código QR.
$writer = new PngWriter();

// Generar el código QR y guardar la imagen en un archivo
$result = $writer->write($qrCode);
file_put_contents($ruta_archivo, $result->getString());

echo "<br><h2>El código QR se ha guardado en carpeta:</h2> " . $ruta_archivo;
// Mostrar la imagen PNG
echo '<br><img src="' . $ruta_archivo . '" alt="Código QR">';
// Después debes guardar la ruta de la imagen en la base de datos
// En la tabla compra_butacasC