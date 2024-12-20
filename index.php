<?php
// Importa las clases necesarias
require_once 'Administrativo.php';
require_once 'Conserje.php';
require_once 'PersonalLimpieza.php';
require_once 'Profesor.php';
require_once 'AlumnoESO.php';
require_once 'AlumnoBachillerato.php';
require_once 'AlumnoFP.php';

// Crear un array de 100 objetos al azar
$personas = [];
for ($i = 0; $i < 100; $i++) {
    $personas[] = Persona::generarAlAzar();
}

// Contar cuántos objetos se crearon de cada clase
$contador = [
    'Administrativo' => 0,
    'Conserje' => 0,
    'PersonalLimpieza' => 0,
    'Profesor' => 0,
    'AlumnoESO' => 0,
    'AlumnoBachillerato' => 0,
    'AlumnoFP' => 0,
];
// Contar los objetos creados por clase
foreach ($personas as $persona) {
    if ($persona instanceof Administrativo) {
        $contador['Administrativo']++;
    } elseif ($persona instanceof Conserje) {
        $contador['Conserje']++;
    } elseif ($persona instanceof PersonalLimpieza) {
        $contador['PersonalLimpieza']++;
    } elseif ($persona instanceof Profesor) {
        $contador['Profesor']++;
    } elseif ($persona instanceof AlumnoESO) {
        $contador['AlumnoESO']++;
    } elseif ($persona instanceof AlumnoBachillerato) {
        $contador['AlumnoBachillerato']++;
    } elseif ($persona instanceof AlumnoFP) {
        $contador['AlumnoFP']++;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunidad Educativa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        h1, h2 {
            text-align: center;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .person-info {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #fff;
        }

        .person-info h3 {
            margin-top: 0;
        }

        .person-info li {
            font-size: 16px;
            color: #34495e;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Comunidad Educativa</h1>

        <div>
            <h2>Número de objetos creados de cada clase</h2>
            <table>
                <thead>
                    <tr>
                        <th>Clase</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contador as $clase => $cantidad): ?>
                    <tr>
                        <td><?php echo $clase; ?></td>
                        <td><?php echo $cantidad; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div>
            <h2>Datos Personales de cada persona</h2>
            <?php foreach ($personas as $persona): ?>
            <div class="person-info">
                <h3>Persona</h3>
                <ul> <!-- Muestra la información de persona aleatoria-->
                    <li><strong>Nombre:</strong> <?php echo $persona->getNombre(); ?></li>
                    <li><strong>Apellidos:</strong> <?php echo $persona->getApellido1() . ' ' . $persona->getApellido2(); ?></li>
                    <li><strong>Fecha de Nacimiento:</strong> <?php echo $persona->getFechaNacimiento(); ?></li>
                    <li><strong>DNI:</strong> <?php echo $persona->getDNI(); ?></li>
                    <li><strong>Dirección:</strong> <?php echo $persona->getDireccion(); ?></li>
                    <li><strong>Teléfono:</strong> <?php echo $persona->getTelefono(); ?></li>
                    <li><strong>Sexo:</strong> <?php echo $persona->getSexo(); ?></li>

                    <?php if ($persona instanceof Administrativo): ?>
                    <li><strong>Años de Servicio:</strong> <?php echo $persona->getAñosServicio(); ?></li>
                    <?php elseif ($persona instanceof Conserje): ?>
                    <li><strong>Años de Servicio:</strong> <?php echo $persona->getAñosServicio(); ?></li>
                    <?php elseif ($persona instanceof PersonalLimpieza): ?>
                    <li><strong>Años de Servicio:</strong> <?php echo $persona->getAñosServicio(); ?></li>
                    <?php elseif ($persona instanceof Profesor): ?>
                    <li><strong>Años de Servicio:</strong> <?php echo $persona->getAñosServicio(); ?></li>
                    <li><strong>Materias:</strong> <?php echo $persona->getMaterias(); ?></li>
                    <li><strong>Cargo Directivo:</strong> <?php echo $persona->getCargoDirectivo(); ?></li>
                    <?php elseif ($persona instanceof AlumnoESO): ?>
                    <li><strong>Curso:</strong> <?php echo $persona->getCurso(); ?></li>
                    <li><strong>Grupo:</strong> <?php echo $persona->getGrupo(); ?></li>
                    <?php elseif ($persona instanceof AlumnoBachillerato): ?>
                    <li><strong>Curso:</strong> <?php echo $persona->getCurso(); ?></li>
                    <li><strong>Grupo:</strong> <?php echo $persona->getGrupo(); ?></li>
                    <?php elseif ($persona instanceof AlumnoFP): ?>
                    <li><strong>Ciclo Formativo:</strong> <?php echo $persona->getCicloFormativo(); ?></li>
                    <li><strong>Curso:</strong> <?php echo $persona->getCurso(); ?></li>
                    <li><strong>Grupo:</strong> <?php echo $persona->getGrupo(); ?></li>
                    <?php endif; ?>
                </ul> 
                    <!-- Llamar al método trabajar() para cada objeto-->
                <p><strong>Acción:</strong> <?php echo $persona->trabajar(); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
