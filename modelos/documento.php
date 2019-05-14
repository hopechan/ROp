<?php
class Documento{
    private $iddocumento;
    private $idestudiante;
    private $tipodocumento;
    private $documento;
    private $descripcion;



    /**
     * Get the value of iddocumento
     */ 
    public function getIddocumento()
    {
        return $this->iddocumento;
    }

    /**
     * Set the value of iddocumento
     *
     * @return  self
     */ 
    public function setIddocumento($iddocumento)
    {
        $this->iddocumento = $iddocumento;

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
     * Get the value of tipodocumento
     */ 
    public function getTipodocumento()
    {
        return $this->tipodocumento;
    }

    /**
     * Set the value of tipodocumento
     *
     * @return  self
     */ 
    public function setTipodocumento($tipodocumento)
    {
        $this->tipodocumento = $tipodocumento;

        return $this;
    }

    /**
     * Get the value of documento
     */ 
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set the value of documento
     *
     * @return  self
     */ 
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}
?>