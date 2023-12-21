<?php
// Con este código debéis crear un método de clase que se pueda llamar desde cualquier parte de la aplicación
// Verificar si los parámetros 'correo' y 'hash' están presentes en la URL
if (isset($_GET['correo']) && isset($_GET['hash'])) {
    // Obtiene los valores de 'correo' y 'hash' desde la URL
    $correo_recibido = $_GET['correo'];
    $hash_recibido = $_GET['hash'];

    // Verificar si el correo recibido coincide con el hash recibido
    if (password_verify($correo_recibido, $hash_recibido)) {
        echo "El correo recibido coincide con el hash recibido.";
        // Activar la cuenta del usuario en la base de datos, enviar un correo al usuario informando de que se ha activado la cuenta
    } else {
        echo "El correo recibido no coincide con el hash recibido.";
        // Enviar un correo al usuario informando de que el hash no coincide y no se ha activado la cuenta
    }
} else {
    echo "No se han recibido los parámetros esperados en la URL.";
    // En caso de que falten parámetros en la URL, enviar un correo al usuario informando de que no se ha activado la cuenta
}
