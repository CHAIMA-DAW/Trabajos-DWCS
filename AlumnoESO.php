<?php

require_once 'Persona.php';

class AlumnoESO extends Persona {
    private static $contador = 0;

    private $curso;//Atributo especifico para añadir curso
    private $grupo;//Atributo especifico para añadir grupo
    /**
     * Constructor de AlumnadoEso 
     * Inicializa los atributos de Persona y atributos especificos curso y grupo
     */
    public function __construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, $curso, $grupo) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo);
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
     * Devuelve una representación en texto de la instancia de AlumnadoEso
     */
    public function __toString(){
        return parent::__toString()."Curso :{$this->curso}\nGrupo:{$this->grupo}\n";

     }
     public function getCurso() {
        return $this->curso;
    }

    public function getGrupo() {
        return $this->grupo;
    }
    /**
     * Método trabajar.
     * Devuelve una descripción de la tarea realizada AlumnadoEso
     */
    public function trabajar() {
        return $this->sexo == "M" ? "Soy un estudiante de la ESO y estoy estudiando." : "Soy una estudiante de la ESO y estoy estudiando.";
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

         return new AlumnoESO($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, rand(1, 4), chr(rand(65, 68))); // Genera un número aleatorio entre 1 y 4
        
    }
}

?>
