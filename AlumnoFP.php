<?php

require_once 'Persona.php';
/**
 * Clase Alumnado fP
 * Representa a los de Alumnado de Formación Profesional de la comunidad educativa.
 */
class AlumnoFP extends Persona {
    private static $contador = 0;

    private $cicloFormativo;//Atributo especifico para añadir ciclo
    private $curso; //Atributo especifico para añadir curso
    private $grupo;//Atributo especifico para añadir grupo
    /**
     * Constructor de AlumnadoFp
     * Inicializa los atributos de Persona y atributos especificos curso, grupo y ciclo
     */
    public function __construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, $cicloFormativo, $curso, $grupo) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo);
        $this->cicloFormativo = $cicloFormativo;
        $this->curso = $curso;
        $this->grupo = $grupo;
        self::$contador++;
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
     * Devuelve una representación en texto de la instancia de AlumnadoBach
     */
    public function __toString(){
        return parent::__toString()."Curso :{$this->curso}\nGrupo:{$this->grupo}\nCiclo:{$this->cicloFormativo }";

     }
     public function getCicloFormativo() {
        return $this->cicloFormativo;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function getGrupo() {
        return $this->grupo;}
    /**
     * Método trabajar.
     * Devuelve una descripción de la tarea realizada AlumnadoBach
     */
    public function trabajar() {
        return $this->sexo == "M" ? "Soy un estudiante de Formación Profesional y estoy estudiando." : "Soy una estudiante de Formación Profesional y estoy estudiando.";
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

        $ciclosFormativos = ["Informática", "Administración", "Electricidad"]; // Genera aleatoriamente entre las opciones
        return new AlumnoFP($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, $ciclosFormativos[array_rand($ciclosFormativos)], rand(1, 2), chr(rand(65, 68)));
    }
}

?>
