<?php

require_once 'Persona.php';

class Profesor extends Persona {
    private static $contador = 0;

    private $añosServicio; //Atributo especifico para añadir años de servicio
    private $materias; //Atributo especifico para añadir materias que imparte
    private $cargoDirectivo; //Atributo especifico para añadir catgo directivo

    /**
     * Constructor de Profesorado
     * Inicializa los atributos de Persona y los atributos especificos años servicio, materia que imparte y cargo directivo
     */

    public function __construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, $añosServicio, $materias, $cargoDirectivo) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo);
        $this->añosServicio = $añosServicio; // Años de servicio aleatorios
        $this->materias = $materias;        // Materia aleatoria
        $this->cargoDirectivo = $cargoDirectivo;    // Cargo directivo aleatorio
    }

    /**
    * Método estático numeroObjetosCreado.
    * Devuelve la cantidad de objetos creados de esta clase.
    */
    public static function numeroObjetosCreado() {
        return self::$contador;
    }

    /**
     * Método __toString.
     * Devuelve una representación en texto de la instancia de Profesorado
     */
    public function __toString() { 
        return parent::__toString() . ", Materias: {$this->materias}, Cargo Directivo: {$this->cargoDirectivo}";
    }
     
    /**
     * Método trabajar.
     * Devuelve una descripción de la tarea realizada por el profesorado.
     */
    public function trabajar() {
        return $this->sexo == "M" ? "Soy un profesor y estoy enseñando." : "Soy una profesora y estoy enseñando.";
    }
    public function getAñosServicio() {
        return $this->añosServicio;
    }

    public function getMaterias() {
        return $this->materias;
    }

    public function getCargoDirectivo() {
        return $this->cargoDirectivo;
    }

       /**
     * Método estático generarAlAzar.
     * Genera una instancia de Persona con datos aleatorios.
     */
    public static function generarAlAzar() {
        $nombres = ["Juan", "María", "Pedro", "Ana"];
        $apellidos = ["García", "López", "Martínez", "Sánchez"];
        $nombre = $nombres[array_rand($nombres)];
        $apellido1 = $apellidos[array_rand($apellidos)];
        $apellido2 = $apellidos[array_rand($apellidos)];
        $fechaNacimiento = rand(1, 28) . '/' . rand(1, 12) . '/' . rand(1980, 2010);
        $dni = rand(10000000, 99999999) . '-' . chr(rand(65, 90));
        $direccion = "Calle Falsa 123";
        $telefono = "+34 " . rand(600000000, 699999999);
        $sexo = rand(0, 1) ? "M" : "F";

        $tipoObjeto = new static();
        switch (get_class($tipoObjeto)) {
            case 1:
                return new Administrativo($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, rand(1, 30));
            case 2:
                return new Conserje($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, rand(1, 30));
            case 3:
                return new PersonalLimpieza($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, rand(1, 30));
            case 4:
                $materias = ["Matemáticas", "Lengua", "Historia"];
                $cargoDirectivo = ["ninguno", "dirección", "secretariado", "jefatura estudios diurno", "jefatura estudios personas adultas", "vicedirección"];  // Seleccionar materia, cargo directivo aleatorio
                return new Profesor($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, rand(1, 30), $materias[array_rand($materias)], $cargoDirectivo[array_rand($cargoDirectivo)]);
            case 5:
                return new AlumnoESO($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, rand(1, 4), chr(rand(65, 68))); // Genera un número aleatorio entre 1 y 4
            case 6:
                return new AlumnoBachillerato($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, rand(1, 2), chr(rand(65, 68))); // Genera un número aleatorio entre 1 y 2
            case 7:
                $ciclosFormativos = ["Informática", "Administración", "Electricidad"]; // Genera aleatoriamente entre las opciones
                return new AlumnoFP($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, $ciclosFormativos[array_rand($ciclosFormativos)], rand(1, 2), chr(rand(65, 68)));
        }
    }
}

?>
