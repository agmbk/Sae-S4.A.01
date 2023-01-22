<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[ORM\Table(name: 'SaeA01.article')]
class Article
{
    #[ORM\Id]
    //#[ORM\GeneratedValue]
    #[ORM\Column(length: 50)]
    private ?string $codearticle = null;

    #[ORM\Column(length: 50)]
    private ?string $libellearticle = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    private array $typearticle = [];

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prixunitactuelht = null;

    public function getCodeArticle(): ?string
    {
        return $this->codearticle;
    }

    public function setCodeArticle(string $codearticle): self
    {
        $this->codearticle = $codearticle;

        return $this;
    }

    public function getLibelleArticle(): ?string
    {
        return $this->libellearticle;
    }

    public function setLibelleArticle(string $libellearticle): self
    {
        $this->libellearticle = $libellearticle;

        return $this;
    }

    public function getTypeArticle(): array
    {
        return $this->typearticle;
    }

    public function setTypeArticle(array $typearticle): self
    {
        $this->typearticle = $typearticle;

        return $this;
    }

    public function getPrixunitactuelht(): ?string
    {
        return $this->prixunitactuelht;
    }

    public function setPrixunitactuelht(string $prixunitactuelht): self
    {
        $this->prixunitactuelht = $prixunitactuelht;

        return $this;
    }
}
