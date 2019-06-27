<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MapyGlowneRepository")
 */
class MapyGlowne
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="integer")
     */
    private $mapID;
    /**
     * @ORM\Column(type="text",length=50)
     */
    private $nazwaMapy;


//Getters & Setters

    public function getId()
    {
        return $this->id;
    }
    public function getMapId()
    {
        return $this->mapID;
    }
    public function getNazwaMapy()
    {
        return $this->nazwaMapy;
    }
    public function setMapId($mapId){
        $this->mapID = $mapId;
    }
    public function setNazwaMapy($nazwaMapy){
        $this->nazwaMapy = $nazwaMapy;
    }
}
