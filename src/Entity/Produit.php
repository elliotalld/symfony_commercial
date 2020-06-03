<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $libelle;

    /**
     * @ORM\Column(type="float")
     */
    private $pa;

    /**
     * @ORM\Column(type="float")
     */
    private $pv;

    /**
     * @ORM\Column(type="integer")
     */
    private $tva;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

   
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Famille", inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_famille;

    
  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPa(): ?float
    {
        return $this->pa;
    }

    public function setPa(float $pa): self
    {
        $this->pa = $pa;

        return $this;
    }

    public function getPv(): ?float
    {
        return $this->pv;
    }

    public function setPv(float $pv): self
    {
        $this->pv = $pv;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getStkinit(): ?int
    {
        return $this->stkinit;
    }

    public function setStkinit(int $stkinit): self
    {
        $this->stkinit = $stkinit;

        return $this;
    }

    public function getStkal(): ?int
    {
        return $this->stkal;
    }

    public function setStkal(int $stkal): self
    {
        $this->stkal = $stkal;

        return $this;
    }

       /**
    * toString
    * @return string
    */
    public function __toString()
    {
            return $this->getLibelle();
    }

    public function getIdFamille(): ?Famille
    {
        return $this->id_famille;
    }

    public function setIdFamille(?Famille $id_famille): self
    {
        $this->id_famille = $id_famille;

        return $this;
    }

 
}
