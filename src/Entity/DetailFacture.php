<?php

namespace App\Entity;

use App\Repository\DetailFactureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\FactureProformat;

#[ORM\Entity(repositoryClass: DetailFactureRepository::class)]
class DetailFacture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

//    #[ORM\Column(length: 255)]
//    private ?string $libelle = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column(length: 255)]
    private ?string $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $montantTTC = null;

    #[ORM\Column(length: 255)]
    private ?string $montantHT = null;

    #[ORM\Column(length: 255)]
    private ?string $montantTVA = null;

    #[ORM\Column(length: 255,nullable: true)]
    private ?string $remise = null;

//    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
//    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'detailFactures')]
    private ?Produit $produit = null;

    #[ORM\ManyToOne(targetEntity: Facture::class, inversedBy: 'detailFactures')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Facture $facture = null;

    #[ORM\ManyToOne(targetEntity: FactureProformat::class, inversedBy: 'detailFacture')]
    private ?FactureProformat $factureProformat;


    #[ORM\Column(length: 255)]
    private ?string $montantBrut = null;



    public function getId(): ?int
    {
        return $this->id;
    }

////    public function getLibelle(): ?string
////    {
////        return $this->libelle;
////    }
//
//    public function setLibelle(string $libelle): static
//    {
//        $this->libelle = $libelle;
//
//        return $this;
//    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getMontantTTC(): ?string
    {
        return $this->montantTTC;
    }

    public function setMontantTTC(string $montantTTC): static
    {
        $this->montantTTC = $montantTTC;

        return $this;
    }

    public function getMontantHT(): ?string
    {
        return $this->montantHT;
    }

    public function setMontantHT(string $montantHT): static
    {
        $this->montantHT = $montantHT;

        return $this;
    }

    public function getMontantTVA(): ?string
    {
        return $this->montantTVA;
    }

    public function setMontantTVA(string $montantTVA): static
    {
        $this->montantTVA = $montantTVA;

        return $this;
    }

    public function getRemise(): ?string
    {
        return $this->remise;
    }

    public function setRemise(string $remise): static
    {
        $this->remise = $remise;

        return $this;
    }

//    public function getDate(): ?\DateTimeInterface
//    {
//        return $this->date;
//    }
//
//    public function setDate(\DateTimeInterface $date): static
//    {
//        $this->date = $date;
//
//        return $this;
//    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): static
    {
        $this->produit = $produit;

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->facture;
    }

    public function setFacture(?Facture $facture): static
    {
        $this->facture = $facture;

        return $this;
    }

    public function getFactureProformat(): ?FactureProformat
    {
        return $this->factureProformat;
    }

    public function setFactureProformat(?FactureProformat $factureProformat): static
    {
        $this->factureProformat = $factureProformat;

        return $this;
    }

    public function getMontantBrut(): ?string
    {
        return $this->montantBrut;
    }

    public function setMontantBrut(string $montantBrut): static
    {
        $this->montantBrut = $montantBrut;

        return $this;
    }

}
