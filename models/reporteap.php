<?php
class Reporteap{
    private $idreporteap;
    private $idestudiante;
    private $idtipo;
    private $anio;
    private $seccion;
    private $nota;
    private $observaciones;
    
    

    /**
     * Get the value of idreporteap
     */ 
    public function getIdreporteap()
    {
        return $this->idreporteap;
    }

    /**
     * Set the value of idreporteap
     *
     * @return  self
     */ 
    public function setIdreporteap($idreporteap)
    {
        $this->idreporteap = $idreporteap;

        return $this;
    }

    /**
     * Get the value of idestudiante
     */ 
    public function getIdestudiante()
    {
        return $this->idestudiante;
    }

    /**
     * Set the value of idestudiante
     *
     * @return  self
     */ 
    public function setIdestudiante($idestudiante)
    {
        $this->idestudiante = $idestudiante;

        return $this;
    }

    /**
     * Get the value of idtipo
     */ 
    public function getIdtipo()
    {
        return $this->idtipo;
    }

    /**
     * Set the value of idtipo
     *
     * @return  self
     */ 
    public function setIdtipo($idtipo)
    {
        $this->idtipo = $idtipo;

        return $this;
    }

    /**
     * Get the value of anio
     */ 
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * Set the value of anio
     *
     * @return  self
     */ 
    public function setAnio($anio)
    {
        $this->anio = $anio;

        return $this;
    }

    /**
     * Get the value of seccion
     */ 
    public function getSeccion()
    {
        return $this->seccion;
    }

    /**
     * Set the value of seccion
     *
     * @return  self
     */ 
    public function setSeccion($seccion)
    {
        $this->seccion = $seccion;

        return $this;
    }

    /**
     * Get the value of nota
     */ 
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set the value of nota
     *
     * @return  self
     */ 
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get the value of observaciones
     */ 
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set the value of observaciones
     *
     * @return  self
     */ 
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }
}
?>