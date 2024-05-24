<?php
Class Torneo{
    private $colecionPartidos;
    private $importePremio;
    private $deporte;

    public function __construct($colecionPartidos, $importePremio, $deporte){
        $this->colecionPartidos = $colecionPartidos;
        $this->importePremio = $importePremio;
        $this->deporte = $deporte;
    }
    public function getColecionPartidos(){
        return $this->colecionPartidos;
    }
    public function getImportePremio(){
        return $this->importePremio;
    }

    public function setColecionPartidos($colecionPartidos){
        $this->colecionPartidos = $colecionPartidos;
    }
    public function setImportePremio($importePremio){
        $this->importePremio = $importePremio;
    }
    public function getDeporte(){
        return $this->deporte;
    }
    public function setDeporte($deporte){
        $this->deporte = $deporte;
    }

    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido){
        $colPartidos = [];
        if ($objEquipo1->getObjCategoria() != $objEquipo2->getObjCategoria() || $objEquipo1->getCantJugadores() != $objEquipo2->getCantJugadores()){
            $colPartidos = null;
        } else {
            $objPartido = new Partido(0, $fecha, $objEquipo1, 0, $objEquipo2, 0);
            $colPartidos[] = $objPartido;
            }
        return $colPartidos;
    }

    public function darGanadores($deporte) {
        $ganadores = [];

        foreach ($this->colecionPartidos as $partido) {
            if ($partido->getDeporte() == $deporte) {
                $equipoGanador = $partido->darEquipoGanador($partido);
                if ($equipoGanador) {
                    $ganadores[] = $equipoGanador;
                }
            }
        }

        return $ganadores;
    }
    public function calcularPremioPartido($objPartido){
        $resultado = [];
        $equipoGanador = $objPartido->darEquipoGanador();
        $coeficiente = $objPartido->coeficientePartido();
        $premioPartido = $coeficiente * $this->getImportePremio();

        if(count($equipoGanador) > 1) {
            $premioDividido = $premioPartido / (count($equipoGanador));
            $resultado = [
                "equipoGanador" => $equipoGanador,
                "premioPartido" => $premioDividido];
        } else {
            $resultado = [
            "equipoGanador" => $equipoGanador[0],    
            "premioPartido" => $premioPartido];
        }
        return $resultado;
    }


}
?>