<?php

require_once 'Persona.php';

class AlumnoESO extends Persona {
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
}

?>
