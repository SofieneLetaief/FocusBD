<?php

namespace App\Entity;

use App\Repository\GuideRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=GuideRepository::class)
 * @uniqueEntity(
 *     fields={"email"},
 *     message= "l'email que vous avez saisie est deja utilise"
 * )
 */
class Guide
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idguide;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(min="8",minMessage="le Cin doit être composé en 8 chiffres")
     */
    private $cin;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(min="8",minMessage="le Numtel doit être composé en 8 chiffres")
     */
    private $numtel;

    /**
     * @ORM\Column(type="string", length=30)

     */
    private $email;

    /**
     * @ORM\Column(type="string", length=155)
     */
    private $img;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdguide(): ?int
    {
        return $this->idguide;
    }

    public function setIdguide(int $idguide): self
    {
        $this->idguide = $idguide;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getNumtel(): ?int
    {
        return $this->numtel;
    }

    public function setNumtel(int $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }


}
