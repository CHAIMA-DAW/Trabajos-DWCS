<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tarea DWES 2 - Agenda de Contactos</title>
</head>
<body>

<?php
$aviso = "";

// Recupera los contactos del formulario si existen en campos ocultos
$contactos = isset($_POST['contactos']) ? json_decode($_POST['contactos'], true) : [];

// Procesa el formulario al pulsar "Añadir Contacto"
if (isset($_POST['aniadir'])) {
    $nombre = trim($_POST['nombre']);
    $telefono = trim($_POST['telefono']);
//Validacion del campo nombre
    if (empty($nombre)) {
        $aviso = "El Nombre es Obligatorio!!!";
    } elseif (!isset($contactos[$nombre]) && !empty($telefono)) {
        // R1: Añade un nuevo contacto si no existe el nombre y el teléfono no está vacío
        $contactos[$nombre] = ["nombre" => $nombre, "telefono" => $telefono];
        $aviso = "El contacto ha sido creado";
    } elseif (isset($contactos[$nombre]) && !empty($telefono)) {
        // R2: Actualiza el teléfono si el nombre ya existe
        $contactos[$nombre] = ["nombre" => $nombre, "telefono" => $telefono];
        $aviso = "El contacto ha sido actualizado";
    } elseif (isset($contactos[$nombre]) && empty($telefono)) {
        // R3: Elimina el contacto si el nombre existe y el teléfono está vacío
        unset($contactos[$nombre]);
        $aviso = "El contacto ha sido borrado";
    }
}

// Procesa la solicitud de vaciar todos los contactos
if (isset($_GET['vaciar'])) {
    // R4: Borra todos los contactos si la variable 'vaciar' está presente en la URL
    $contactos = [];
    $aviso = "Todos los contactos han sido borrados";
}

// Muestra el mensaje de aviso si existe
if (!empty($aviso)) {
    echo "<p class='aviso'>$aviso</p>";
}
?>

<div class="agenda">
    <h4>AGENDA</h4>

    <!-- Formulario para añadir o modificar contactos -->
    <form action="index.php" method="POST">
        <fieldset>
            <legend>Nuevo Contacto</legend>
            <table>
                <tr>
                    <td><label for="nombre">Nombre: </label></td>
                    <td><input type="text" name="nombre" id="nombre"></td>
                </tr>
                <tr>
                    <td><label for="telefono">Teléfono: </label></td>
                    <td><input type="text" name="telefono" id="telefono"></td>
                </tr>
            </table>
            <button type="submit" name="aniadir">Añadir Contacto</button>
            <button type="reset">Limpiar Campos</button>

            <!-- Campos ocultos para mantener los contactos actuales -->
            <input type="hidden" name="contactos" value='<?php echo json_encode($contactos); ?>'>
        </fieldset>
    </form>

    <!-- Mostramos la lista de contactos si hay alguno registrado -->
    <?php if (count($contactos) > 0): ?>
        <fieldset>
            <legend>Datos Agenda</legend>
            <table>
                <?php foreach ($contactos as $key => $value): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($value['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($value['telefono']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </fieldset>
    <?php endif; ?>

    <!-- Formulario para vaciar la agenda solo si existen contactos -->
    <?php if (count($contactos) > 0): ?>
        <form action="index.php" method="GET">
            <fieldset>
                <legend>Vaciar Agenda</legend>
                <button type="submit" name="vaciar" value="1">Vaciar</button>
            </fieldset>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
