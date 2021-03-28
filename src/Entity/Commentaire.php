<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity=Evennement::class, inversedBy="commentaires" ,cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="id_event", referencedColumnName="id")
     */
    public $id_event;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getIdEvent(): ?Evennement
    {
        return $this->id_event;
    }

    public function setIdEvent(?Evennement $id_event): self
    {
        $this->id_event = $id_event;

        return $this;
    }
    public function __toString(): String
    {
        return $this->id;
    }
}
