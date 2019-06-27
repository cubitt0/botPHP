<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExpowiskaRepository")
 */
class Expowiska
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text",length=50)
     */
    private $mapa;

    /**
     * @ORM\Column(type="integer")
     */
    private $od;

    /**
     * @ORM\Column(type="integer")
     */
    private $do;

    /**
     * @ORM\Column(type="text",length=512)
     */
    private $moby;

    //Getters & Setters
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getMapa()
    {
        return $this->mapa;
    }
    public function getOd()
    {
        return $this->od;
    }
    public function getDo()
    {
        return $this->do;
    }
    public function getMoby()
    {
        return $this->moby;
    }

    public function setMapa($mapa){
        $this->mapa = $mapa;
    }
    public function setOd($od){
        $this->od = $od;
    }
    public function setDo($do){
        $this->do = $do;
    }
    public function setMoby($moby){
        $this->moby = $moby;
    }
}
