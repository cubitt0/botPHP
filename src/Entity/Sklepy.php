<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SklepyRepository")
 */
class Sklepy
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
     * @ORM\Column(type="text",length=50)
     */
    private $nick;
    /**
     * @ORM\Column(type="integer")
     */
    private $x;
    /**
     * @ORM\Column(type="integer")
     */
    private $y;
    /**
     * @ORM\Column(type="integer")
     */
    private $shopID;
    /**
     * @ORM\Column(type="integer")
     */
    private $procent;
    /**
     * @ORM\Column(type="text",length=200)
     */
    private $skupuje;

    //Getters & Setters
    public function getId(){
        return $this->id;
    }
    public function getMapa(){
        return $this->mapa;
    }
    public function getNick(){
        return $this->nick;
    }
    public function getX(){
        return $this->x;
    }
    public function getY(){
        return $this->y;
    }
    public function getShopId(){
        return $this->shopID;
    }
    public function getProcent(){
        return $this->procent;
    }
    public function getSkup(){
        return $this->skupuje;
    }


    public function setMapa($mapa){
        $this->mapa = $mapa;
    }
    public function setNick($nick){
        $this->nick = $nick;
    }
    public function setX($x){
        $this->x = $x;
    }
    public function setY($y){
        $this->y = $y;
    }
    public function setShopId($shopID){
        $this->shopID = $shopID;
    }
    public function setProcent($procent){
        $this->procent = $procent;
    }
    public function setSkup($skup){
        $this->skupuje = $skup;
    }
}
