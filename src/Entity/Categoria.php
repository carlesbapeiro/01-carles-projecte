<?php


namespace App\Entity;


use App\Core\Entity;

class Categoria implements Entity
{
    private ?int $id = null;
    private string $nom;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }



    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }


    public function toArray(): array
    {
        return[
            "nom"=>$this->getNom(),
            "id"=>$this->getId()

            
        ];
    }
}