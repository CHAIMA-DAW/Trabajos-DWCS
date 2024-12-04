<?php
 
require_once 'Persona.php';
/**
 * Clase Administrativo
 * Representa a los administrativos de la comunidad educativa.
 */
class Administrativo extends Persona {
    private static $contador = 0;

    private $añosServicio; //Atributo especifico para añadir años de servicio
    /**
     * Constructor de Administrativo.
     * Inicializa los atributos de Persona y el atributo específico aniosServicio.
     */
    public function __construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, $añosServicio) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo);
        $this->añosServicio = $añosServicio;
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
     * Devuelve una representación en texto de la instancia de Administrativo.
     */
    public function __toString() {
        return parent::__toString() . "Años de servicio: {$this->añosServicio}\n";
    }
    public function getAñosServicio() {
        return $this->añosServicio;
    }
    /**
     * Método trabajar.
     * Devuelve una descripción de la tarea realizada por el administrativo.
     */
    public function trabajar() {
        return $this->sexo == "M" ? "Soy un administrativo y estoy trabajando." : "Soy una administrativa y estoy trabajando.";
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

        return new Administrativo($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, rand(1, 30));
    }
}

?>
