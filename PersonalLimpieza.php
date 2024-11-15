<?php

require_once 'Persona.php';
/**
 * Clase Personal Limpieza
 * Representa a los del personal de limpieza de la comunidad educativa.
 */
class PersonalLimpieza extends Persona {
    private $añosServicio; //Atributo especifico para añadir años de servicio

     /**
     * Constructor de Personal Limpieza
     * Inicializa los atributos de Persona y el atributo específico aniosServicio.
     */
    public function __construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, $añosServicio) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo);
        $this->añosServicio = $añosServicio;
    }
    /**
     * Método __toString.
     * Devuelve una representación en texto de la instancia de Personal Limpieza
     */
    public function __toString() {
        return parent::__toString() . "Años de servicio: {$this->añosServicio}\n";
    }
    public function getAñosServicio() {
        return $this->añosServicio;
    }
    /**
     * Método trabajar.
     * Devuelve una descripción de la tarea realizada Personal Limpieza
     */

    public function trabajar() {
        return $this->sexo == "M" ? "Soy un personal de limpieza y estoy trabajando." : "Soy una personal de limpieza y estoy trabajando.";
    }
}

?>
