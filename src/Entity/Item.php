<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champ est obligatoire")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Ce champ est obligatoire")
     * @Assert\Type(
     *  type="string",
     *  message="Il faut renseigner une chaîne de caractère"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champ est obligatoire")
     * @Assert\Type(
     *  type="string",
     *  message="Il faut renseigner une chaîne de caractère"
     * )
     */
    private $image;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Ce champ est obligatoire")
     * @Assert\Type(
     *  type="integer",
     *  message="Il faut renseigner une valeur comprise entre 1 et 5 inclus"
     * )
     */
    private $water;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Ce champ est obligatoire")
     * @Assert\Type(
     *  type="integer",
     *  message="Il faut renseigner une valeur comprise entre 1 et 5 inclus"
     * )
     */
    private $light;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="items")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\Type(
     *  type="App\Entity\Category",
     *  message="Il faut renseigner une catégorie existante"
     * )
     */
    private $category;

    /**
     * @ORM\Column(type="float", precision=5, scale=2)
     * @Assert\NotBlank(message="Ce champ est obligatoire")
     * @Assert\Type(
     *  type="float",
     *  message="Il faut renseigner un décimal"
     * )
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getWater(): ?int
    {
        return $this->water;
    }

    public function setWater(int $water): self
    {
        $this->water = $water;

        return $this;
    }

    public function getLight(): ?int
    {
        return $this->light;
    }

    public function setLight(int $light): self
    {
        $this->light = $light;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
