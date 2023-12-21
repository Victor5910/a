<?php
$dsn = 'mysql:host=localhost;dbname=banco;port=3306;charset=utf8mb4';
$usuario = 'root';
$contrasena = '';
try {
    $conexion = new PDO($dsn, $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlInsert = 'INSERT INTO cuentas (nombre, saldo) VALUES (:nombre, :saldo)';
    $stmtInsert = $conexion->prepare($sqlInsert);

    $cuentas = [
        ['nombre' => 'Carlos', 'saldo' => 1000.00],
        ['nombre' => 'Ana', 'saldo' => 2000.00],
        ['nombre' => 'Luis', 'saldo' => 3000.00],
        ['nombre' => 'María', 'saldo' => 4000.00]
    ];

    foreach ($cuentas as $cuenta) {
        $stmtInsert->execute($cuenta);
    }
} catch (PDOException $e) {
    echo "<br>Error:{$e->getMessage()}<br>Línea del error: {$e->getLine()} <br>Archivo del error: {$e->getFile()} ";
}
