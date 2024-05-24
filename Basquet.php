<?php
class Basquet extends Partido{
    private $infracciones;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2, $infracciones) {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->infracciones = $infracciones;
    }
    public function getInfracciones(){
        return $this->infracciones;
    }
    public function setInfracciones($infracciones){
        $this->infracciones = $infracciones;
    }
}
?>