<?php
class Promcertificacion{
    private $idpromcertificacion;
    private $idestudiante;
    private $promcertificacion;



    /**
     * Get the value of idpromcertificacion
     */ 
    public function getIdpromcertificacion()
    {
        return $this->idpromcertificacion;
    }

    /**
     * Set the value of idpromcertificacion
     *
     * @return  self
     */ 
    public function setIdpromcertificacion($idpromcertificacion)
    {
        $this->idpromcertificacion = $idpromcertificacion;

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
     * Get the value of promcertificacion
     */ 
    public function getPromcertificacion()
    {
        return $this->promcertificacion;
    }

    /**
     * Set the value of promcertificacion
     *
     * @return  self
     */ 
    public function setPromcertificacion($promcertificacion)
    {
        $this->promcertificacion = $promcertificacion;

        return $this;
    }
}
    

