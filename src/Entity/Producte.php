<?php

namespace App\Entity;
use App\Core\Entity;

class Producte implements Entity
{
    const POSTER_PATH = 'images/productes/';
    private ?int $id = null;
    private string $descripcio;
    private int $preu;
    private string $nom;
    private string $valoracio;
    private string $poster;
    private int $usuari_id;

    /**
     * @return string
     */
    public function getPoster(): string
    {
        return $this->poster;
    }

    /**
     * @param string $poster
     */
    public function setPoster(string $poster): void
    {
        $this->poster = $poster;
    }


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
    public function getDescripcio(): string
    {
        return $this->descripcio;
    }

    /**
     * @param string $descripcio
     */
    public function setDescripcio(string $descripcio): void
    {
        $this->descripcio = $descripcio;
    }

    /**
     * @return int
     */
    public function getPreu(): int
    {
        return $this->preu;
    }

    /**
     * @param int $preu
     */
    public function setPreu(int $preu): void
    {
        $this->preu = $preu;
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

    /**
     * @return string
     */
    public function getValoracio(): string
    {
        return $this->valoracio;
    }

    /**
     * @param string $valoracio
     */
    public function setValoracio(string $valoracio): void
    {
        $this->valoracio = $valoracio;
    }

    /**
     * @return int
     */
    public function getUsuariId(): int
    {
        return $this->usuari_id;
    }

    /**
     * @param int $usuari_id
     */
    public function setUsuariId(int $usuari_id): void
    {
        $this->usuari_id = $usuari_id;
    }




    public function toArray(): array
    {
        return [
            "id"=>$this->getId(),
            "nom"=>$this->getNom(),
            "descripcio"=>$this->getDescripcio(),
            "preu" =>$this->getPreu(),
            "poster" =>$this->getPoster(),
            "valoracio" => 0,
            "usuari_id"=>$this->getUsuariId()
        ];
    }
}