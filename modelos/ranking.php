<?php
class Ranking{
    private $idranking;
    private $idestudiante;
    private $idpromfunda;
    private $idpromce;
    private $idpromcertificacion;
    private $promfundayce;
    private $diferencia;
    private $idnota_ap;
    private $puntuacion;

    /**
     * Get the value of idranking
     */ 
    public function getIdranking()
    {
        return $this->idranking;
    }

    /**
     * Set the value of idranking
     *
     * @return  self
     */ 
    public function setIdranking($idranking)
    {
        $this->idranking = $idranking;

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
     * Get the value of idpromfunda
     */ 
    public function getIdpromfunda()
    {
        return $this->idpromfunda;
    }

    /**
     * Set the value of idpromfunda
     *
     * @return  self
     */ 
    public function setIdpromfunda($idpromfunda)
    {
        $this->idpromfunda = $idpromfunda;

        return $this;
    }

    /**
     * Get the value of idpromce
     */ 
    public function getIdpromce()
    {
        return $this->idpromce;
    }

    /**
     * Set the value of idpromce
     *
     * @return  self
     */ 
    public function setIdpromce($idpromce)
    {
        $this->idpromce = $idpromce;

        return $this;
    }

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
     * Get the value of promfundayce
     */ 
    public function getPromfundayce()
    {
        return $this->promfundayce;
    }

    /**
     * Set the value of promfundayce
     *
     * @return  self
     */ 
    public function setPromfundayce($promfundayce)
    {
        $this->promfundayce = $promfundayce;

        return $this;
    }

    /**
     * Get the value of diferencia
     */ 
    public function getDiferencia()
    {
        return $this->diferencia;
    }

    /**
     * Set the value of diferencia
     *
     * @return  self
     */ 
    public function setDiferencia($diferencia)
    {
        $this->diferencia = $diferencia;

        return $this;
    }

    /**
     * Get the value of idnota_ap
     */ 
    public function getIdnota_ap()
    {
        return $this->idnota_ap;
    }

    /**
     * Set the value of idnota_ap
     *
     * @return  self
     */ 
    public function setIdnota_ap($idnota_ap)
    {
        $this->idnota_ap = $idnota_ap;

        return $this;
    }

    /**
     * Get the value of puntuacion
     */ 
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    /**
     * Set the value of puntuacion
     *
     * @return  self
     */ 
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }
}
?>