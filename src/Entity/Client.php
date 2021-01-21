<?php

namespace App\Entity;
use App\Core\Entity;

class Client implements Entity
{

    private ?int $id = null;
    private string $rol;
    private string $nom;
    private string $direccio;
    private string $correu;
    private string $contrassenya;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getRol(): string
    {
        return $this->rol;
    }

    /**
     * @param string $rol
     */
    public function setRol(string $rol): void
    {
        $this->rol = $rol;
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
    public function getDireccio(): string
    {
        return $this->direccio;
    }

    /**
     * @param string $direccio
     */
    public function setDireccio(string $direccio): void
    {
        $this->direccio = $direccio;
    }

    /**
     * @return string
     */
    public function getCorreu(): string
    {
        return $this->correu;
    }

    /**
     * @param string $correu
     */
    public function setCorreu(string $correu): void
    {
        $this->correu = $correu;
    }

    /**
     * @return string
     */
    public function getContrassenya(): string
    {
        return $this->contrassenya;
    }

    /**
     * @param string $contrassenya
     */
    public function setContrassenya(string $contrassenya): void
    {
        $this->contrassenya = $contrassenya;
    }


    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }
}