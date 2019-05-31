<?php

class NotaCe
{
    private $idnotace;
    private $idestudiante;
    private $idtipo;
    private $nota;


    /**
     * Get the value of idnotace
     */ 
    public function getIdnotace()
    {
        return $this->idnotace;
    }

    /**
     * Set the value of idnotace
     *
     * @return  self
     */ 
    public function setIdnotace($idnotace)
    {
        $this->idnotace = $idnotace;

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
}


?>