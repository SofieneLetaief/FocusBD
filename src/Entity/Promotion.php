<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromotionRepository::class)
 */
class Promotion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_d;

    /**
     * @ORM\Column(type="date")
     */
    private $date_f;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Vols::class, inversedBy="promotions" ,cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false,referencedColumnName="id")
     */
    private $id_vol;

    /**
     * @ORM\ManyToOne(targetEntity=Hotel::class, inversedBy="promotions" ,cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false,referencedColumnName="id")
     */
    private $id_hotel;

    /**
     * @ORM\ManyToOne(targetEntity=Transport::class, inversedBy="promotions" ,cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false,referencedColumnName="id")
     */
    private $id_transport;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateD(): ?\DateTimeInterface
    {
        return $this->date_d;
    }

    public function setDateD(\DateTimeInterface $date_d): self
    {
        $this->date_d = $date_d;

        return $this;
    }

    public function getDateF(): ?\DateTimeInterface
    {
        return $this->date_f;
    }

    public function setDateF(\DateTimeInterface $date_f): self
    {
        $this->date_f = $date_f;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getIdVol(): ?Vols
    {
        return $this->id_vol;
    }

    public function setIdVol(?Vols $id_vol): self
    {
        $this->id_vol = $id_vol;

        return $this;
    }

    public function getIdHotel(): ?Hotel
    {
        return $this->id_hotel;
    }

    public function setIdHotel(?Hotel $id_hotel): self
    {
        $this->id_hotel = $id_hotel;

        return $this;
    }

    public function getIdTransport(): ?Transport
    {
        return $this->id_transport;
    }

    public function setIdTransport(?Transport $id_transport): self
    {
        $this->id_transport = $id_transport;

        return $this;
    }
    public function __toString(): string
    {
        return $this->id_vol;
    }

}
