<?php

namespace App\Entity;

use App\Repository\MatchesRepository;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatchesRepository::class)]
class Matches
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id_match;

    #[ORM\OneToMany(mappedBy: 'id', targetEntity: Equipes::class)]
    private string $equipe_locale;

    #[ORM\Column(type: Types::SMALLINT)]
    private int $domicile_exterieur;

    #[ORM\OneToMany(mappedBy: 'id', targetEntity: Equipes::class)]
    private string $equipe_adverse;

    #[ORM\Column(length: 64, nullable: true)]
    private ?string $hote = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $date_heure = null;

    #[ORM\Column]
    private int $num_semaine;

    #[ORM\Column(nullable: true)]
    private int $num_journee;

    #[ORM\Column(length: 64, nullable: true)]
    private ?string $gymnase = null;

    public function getId(): ?int
    {
        return $this->id_match;
    }

    public function getIdMatch(): ?int
    {
        return $this->id_match;
    }

    public function setIdMatch(int $id_match): self
    {
        $this->id_match = $id_match;

        return $this;
    }

    public function getEquipeLocale(): ?string
    {
        return $this->equipe_locale;
    }

    public function setEquipeLocale(string $equipe_locale): self
    {
        $this->equipe_locale = $equipe_locale;

        return $this;
    }

    public function getDomicileExterieur(): ?int
    {
        return $this->domicile_exterieur;
    }

    public function setDomicileExterieur(int $domicile_exterieur): self
    {
        $this->domicile_exterieur = $domicile_exterieur;

        return $this;
    }

    public function getEquipeAdverse(): ?string
    {
        return $this->equipe_adverse;
    }

    public function setEquipeAdverse(string $equipe_adverse): self
    {
        $this->equipe_adverse = $equipe_adverse;

        return $this;
    }

    public function getHote(): ?string
    {
        return $this->hote;
    }

    public function setHote(?string $hote): self
    {
        $this->hote = $hote;

        return $this;
    }

    public function getDateHeure(): ?DateTimeInterface
    {
        return $this->date_heure;
    }

    public function setDateHeure(?DateTimeInterface $date_heure): self
    {
        $this->date_heure = $date_heure;

        return $this;
    }

    public function getNumSemaine(): ?int
    {
        return $this->num_semaine;
    }

    public function setNumSemaine(int $num_semaine): self
    {
        $this->num_semaine = $num_semaine;

        return $this;
    }

    public function getNumJournee(): ?int
    {
        return $this->num_journee;
    }

    public function setNumJournee(?int $num_journee): self
    {
        $this->num_journee = $num_journee;

        return $this;
    }

    public function getGymnase(): ?string
    {
        return $this->gymnase;
    }

    public function setGymnase(string $gymnase): self
    {
        $this->gymnase = $gymnase;

        return $this;
    }
}
