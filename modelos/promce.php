<?php
class Promce
{
    private $idpromce;
    private $idestudiante;
    private $promce;


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