<?php

require_once 'Persona.php';

class Profesor extends Persona {
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
}

?>
