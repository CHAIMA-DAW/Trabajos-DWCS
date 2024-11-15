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

        $tipo = rand(1, 7);
        switch ($tipo) {
            case 1:
                return new Administrativo($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, rand(1, 30));
            case 2:
                return new Conserje($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, rand(1, 30));
            case 3:
                return new PersonalLimpieza($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, rand(1, 30));
            case 4:
                $materias = ["Matemáticas", "Lengua", "Historia"];
                $cargoDirectivo = ["ninguno", "dirección", "secretariado", "jefatura estudios diurno", "jefatura estudios personas adultas", "vicedirección"];  // Seleccionar materia, cargo directivo aleatorio
                return new Profesor($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, rand(1, 30), $materias[array_rand($materias)], $cargoDirectivo[array_rand($cargoDirectivo)]);
            case 5:
                return new AlumnoESO($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, rand(1, 4), chr(rand(65, 68))); // Genera un número aleatorio entre 1 y 4
            case 6:
                return new AlumnoBachillerato($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, rand(1, 2), chr(rand(65, 68))); // Genera un número aleatorio entre 1 y 2
            case 7:
                $ciclosFormativos = ["Informática", "Administración", "Electricidad"]; // Genera aleatoriamente entre las opciones
                return new AlumnoFP($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo, $ciclosFormativos[array_rand($ciclosFormativos)], rand(1, 2), chr(rand(65, 68)));
        }
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
