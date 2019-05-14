<?php
class Promfunda{
    private $idpromfunda;
    private $idestudiante;
    private $promce;


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
     * Get the value of promce
     */ 
    public function getPromce()
    {
        return $this->promce;
    }

    /**
     * Set the value of promce
     *
     * @return  self
     */ 
    public function setPromce($promce)
    {
        $this->promce = $promce;

        return $this;
    }
}
?>