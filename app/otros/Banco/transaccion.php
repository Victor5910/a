<?php
$dsn = 'mysql:host=localhost;dbname=banco;port=3306;charset=utf8mb4';
$usuario = 'root';
$contrasena = '';
$monto = 1000;
$idOrigen = 1;
$idDestino = 555;

try {
    $conexion = new PDO($dsn, $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Iniciar la transacción
    $conexion->beginTransaction();

    // Realizar la operación de débito   
    $sqlDebito = 'UPDATE cuentas SET saldo = saldo - :monto WHERE id = :id_origen';
    $stmtDebito = $conexion->prepare($sqlDebito);
    $stmtDebito->execute(['monto' => $monto, 'id_origen' => $idOrigen]);

    //Verificar si la operación de débito afectó alguna fila
    if ($stmtDebito->rowCount() == 0) {
        throw new PDOException('La cuenta de origen no existe');
    }

    // Realizar la operación de crédito
    $sqlCredito = 'UPDATE cuentas SET saldo = saldo + :monto WHERE id = :id_destino';
    $stmtCredito = $conexion->prepare($sqlCredito);
    $stmtCredito->execute(['monto' => $monto, 'id_destino' => $idDestino]);

    //Verificar si la operación de débito afectó alguna fila
    if ($stmtCredito->rowCount() == 0) {
        throw new PDOException('La cuenta de destino no existe');
    }
    // Confirmar la transacción
    $conexion->commit();
    echo "Transacción realizada con éxito";
} catch (PDOException $e) {
    // Si algo sale mal, revertir la transacción
    $conexion->rollBack();
    echo "Error en la transacción";
    echo "<br>Error:{$e->getMessage()}<br>Línea del error: {$e->getLine()} <br>Archivo del error: {$e->getFile()} ";
}
