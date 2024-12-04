<?php
    /**
 * Clase abstracta Persona
 * Define los atributos y métodos comunes para todas las personas de la comunidad educativa.
 * No puede ser instanciada directamente.
 */
abstract class Persona {
    private static $contador = 0;
    protected $nombre;
    protected $apellido1;
    protected $apellido2;
    protected $fechaNacimiento;
    protected $dni;
    protected $direccion;
    protected $telefono;
    protected $sexo;
    /**
     * Constructor de Persona.
     * Inicializa todos los atributos y aumenta el contador de objetos creados.
     */
    public function __construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo) {
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->sexo = $sexo;
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
    * Método mágico __toString.
    * Devuelve una representación en texto de la instancia.
    */
    public function __toString() {
        return "{$this->nombre} {$this->apellido1} {$this->apellido2}, {$this->sexo}, {$this->dni}, {$this->direccion}, {$this->telefono}, {$this->fechaNacimiento}";
    }

    // Métodos getter
    // Getter para nombre
    public function getNombre() {
        return $this->nombre;
    }
    // Getter para apellido1
    public function getApellido1() {
        return $this->apellido1;
    }
    // Getter para apellido2
    public function getApellido2() {
        return $this->apellido2;
    }
    // Getter para fechaNacimiento
    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }
    // Getter para dni
    public function getDNI() {
        return $this->dni;
    }
    // Getter para direccion
    public function getDireccion() {
        return $this->direccion;
    }
     // Getter para telefono
    public function getTelefono() {
        return $this->telefono;
    }
    // Getter para sexo
    public function getSexo() {
        return $this->sexo;
    }
     /**
     * Método abstracto trabajar.
     * Este método debe ser implementado por todas las clases hijas.
     */
    abstract public function trabajar();
}

?>
