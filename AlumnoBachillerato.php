<?php

require_once 'Persona.php';
/**
 * Clase Alumnado Bachillerato
 * Representa a los de Alumnado de Bachillerato de la comunidad educativa.
 */
class AlumnoBachillerato extends Persona {
    private $curso; //Atributo especifico para añadir curso
    private $grupo; //Atributo especifico para añadir grupo
    /**
     * Constructor de AlumnadoBachillerato
     * Inicializa los atributos de Persona y atributos especificos curso y grupo
     */
    public function __construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, $curso, $grupo) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo);
        $this->curso = $curso;
        $this->grupo = $grupo;
    }
     /**
     * Método __toString.
     * Devuelve una representación en texto de la instancia de AlumnadoBach
     */
    public function __toString(){
        return parent::__toString()."Curso :{$this->curso}\nGrupo:{$this->grupo}\n";

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
        return $this->sexo == "M" ? "Soy un estudiante de Bachillerato y estoy estudiando." : "Soy una estudiante de Bachillerato y estoy estudiando.";
    }
}

?>
