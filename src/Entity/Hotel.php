<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HotelRepository::class)
 */
class Hotel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $nom_hotel;

    /**
     * @ORM\Column(type="string", length=33)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=44)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_tel;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbre_chambre;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Promotion::class, mappedBy="id_hotel",cascade={"all"},orphanRemoval=true)
     */
    private $promotions;

    public function __construct()
    {
        $this->promotions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomHotel(): ?string
    {
        return $this->nom_hotel;
    }

    public function setNomHotel(string $nom_hotel): self
    {
        $this->nom_hotel = $nom_hotel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->num_tel;
    }

    public function setNumTel(string $num_tel): self
    {
        $this->num_tel = $num_tel;

        return $this;
    }

    public function getNbreChambre(): ?int
    {
        return $this->nbre_chambre;
    }

    public function setNbreChambre(int $nbre_chambre): self
    {
        $this->nbre_chambre = $nbre_chambre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Promotion[]
     */
    public function getPromotions(): Collection
    {
        return $this->promotions;
    }

    public function addPromotion(Promotion $promotion): self
    {
        if (!$this->promotions->contains($promotion)) {
            $this->promotions[] = $promotion;
            $promotion->setIdHotel($this);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): self
    {
        if ($this->promotions->removeElement($promotion)) {
            // set the owning side to null (unless already changed)
            if ($promotion->getIdHotel() === $this) {
                $promotion->setIdHotel(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->id;
    }
}
