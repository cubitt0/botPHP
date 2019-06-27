<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MapyRepository")
 */
class Mapy
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
    private $mapaId;
    /**
     * @ORM\Column(type="integer")
     */
    private $pvp;
    /**
     * @ORM\Column(type="text",length=1024)
     */
    private $jsonPrzejscia;

//Getters and setters

    public function getMapa(){
        return $this->mapa;
    }

    public function getPvp(){
        return $this->pvp;
    }
    public function getMapaId(){
        return $this->mapaId;
    }
    public function getPrzejscia(){
        return $this->jsonPrzejscia;
    }

    public function setMapa($mapa){
        $this->mapa = $mapa;
    }
    public function setPvp($pvp){
        $this->pvp = $pvp;
    }
    public function setMapaId($mapaId){
        $this->mapaId = $mapaId;
    }
    public function setPrzejscia($jsonPrzejscia){
        $this->jsonPrzejscia = $jsonPrzejscia;
    }
}
