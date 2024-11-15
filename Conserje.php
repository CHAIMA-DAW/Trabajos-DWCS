<?php

require_once 'Persona.php';
/**
 * Clase Conserje
 * Representa a los conserjes de la comunidad educativa.
 */
class Conserje extends Persona {
    private $añosServicio; //Atributo especifico para añadir años de servicio
    /**
     * Constructor de Conserje.
     * Inicializa los atributos de Persona y el atributo específico aniosServicio.
     */
    public function __construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, $añosServicio) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo);
        $this->añosServicio = $añosServicio;
    }
    /**
     * Método __toString.
     * Devuelve una representación en texto de la instancia de Conserje.
     */
    public function __toString() {
        return parent::__toString() . "Años de servicio: {$this->añosServicio}\n";
    }
    public function getAñosServicio() {
        return $this->añosServicio;
    }

    public function trabajar() {
        return $this->sexo == "M" ? "Soy un conserje y estoy trabajando." : "Soy una conserje y estoy trabajando.";
    }
}

?>
