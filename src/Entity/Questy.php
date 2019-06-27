<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestyRepository")
 */
class Questy
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text",length=1024)
     */
    private $nazwa;

    /**
     * @ORM\Column(type="integer")
     */
    private $lvlMin;

    /**
     * @ORM\Column(type="text",length=1024)
     */
    private $mapa;

//    Getters & Setters

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNazwa(){
        return $this->nazwa;
    }
    public function getLvlMin(){
        return $this->lvlMin;
    }
    public function getMapa(){
        return $this->mapa;
    }

    public function setNazwa($nazwa){
        $this->nazwa = $nazwa;
    }
    public function setLvlMin($lvl){
        $this->lvlMin = $lvl;
    }
    public function setMapa($mapa){
        $this->mapa = $mapa;
    }
}
