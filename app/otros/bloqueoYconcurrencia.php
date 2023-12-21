<?php
// Con este código debéis crear un método de clase que se pueda llamar desde cualquier parte de la aplicación
// La consulta es un SELECT ... FOR UPDATE que se utiliza para bloquear las filas seleccionadas en una transacción.
// El FOR UPDATE al final de la consulta indica que las filas seleccionadas deben ser bloqueadas para actualizaciones
// hasta que la transacción actual sea confirmada o revertida.

// En este ejemplo, se bloquea la fila de la tabla sesionesC que corresponde a la sesión seleccionada
// para reservar una butaca en esa sesión.
// También se bloquea la tabla NumeracionFacturas para generar una factura.

try {
    // Conexión a la base de datos
    $pdo = new PDO('mysql:host=localhost;dbname=nombre_base_datos', 'usuario', 'contraseña');

    // Iniciar la transacción
    // OJO,el método beginTransaction() se llama sobre el objeto PDO, no sobre el objeto PDOStatement
    // Es decir, debe llamarse sobre la conexión, no sobre la consulta
    $pdo->beginTransaction();

    // Bloqueo de lectura en la tabla sesionesC para reservar una butaca en una sesión
    $stmt = $pdo->prepare('SELECT * FROM sesionesC WHERE sesion_id = :id_sesion FOR UPDATE');
    $stmt->execute(['id_sesion' => $id_sesion]);

    // Lógica para reservar la butaca en la sesión seleccionada
    // ...

    // Bloqueo de escritura en la tabla NumeracionFacturas para generar una factura
    $stmt = $pdo->prepare('SELECT * FROM NumeracionFacturas FOR UPDATE');
    $stmt->execute();

    // Lógica para generar la factura
    // ...

    // Confirmar la transacción
    $pdo->commit();
} catch (Exception $e) {
    // Si algo sale mal, revertir la transacción
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
