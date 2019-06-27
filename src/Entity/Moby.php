<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MobyRepository")
 */
class Moby
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
    private $min;

    /**
     * @ORM\Column(type="integer")
     */
    private $max;

    /**
     * @ORM\Column(type="text",length=2048)
     */
    private $unikalneMoby;

    //Getters & Setters
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getMapa(){
        return $this->mapa;
    }
    public function getMin(){
        return $this->min;
    }
    public function getMax(){
        return $this->max;
    }
    public function getUnikalneMoby(){
        return $this->unikalneMoby;
    }

    public function setMapa($mapa){
        $this->mapa = $mapa;
    }
    public function setMin($min){
        $this->min = $min;
    }
    public function setMax($max){
        $this->max = $max;
    }
    public function setUnikalneMoby($unikalnemoby){
        $this->unikalneMoby = $unikalnemoby;
    }
}
