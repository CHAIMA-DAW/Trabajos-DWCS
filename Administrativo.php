<?php
 
require_once 'Persona.php';
/**
 * Clase Administrativo
 * Representa a los administrativos de la comunidad educativa.
 */
class Administrativo extends Persona {
    private $añosServicio; //Atributo especifico para añadir años de servicio
    /**
     * Constructor de Administrativo.
     * Inicializa los atributos de Persona y el atributo específico aniosServicio.
     */
    public function __construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, $añosServicio) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo);
        $this->añosServicio = $añosServicio;
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
}

?>
