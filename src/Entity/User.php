<?php


namespace App\Entity;


use App\Core\Entity;

class User implements Entity
{
    //TODO:FICAR UNA IMATGE DE PERFIL
    //TODO:CREAR UNA PAGINA SEPARA DE EDITAR USUARIS AIXI COM PER A CAMBIAR LA CONTRASSENYA
    private ?int $id = null;
    private string $username;
    private string $password;
    private string $role;
    private string $mail;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return User
     */
    public function setRole(string $role): User
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }


    /**
     * @return array|mixed
     */


    public function toArray(): array
    {
        return [
            "id"=>$this->getId(),
            "username"=>$this->getUsername(),
            "password"=>$this->getPassword(),
            "role"=>$this->getRole(),
            "mail"=>$this->getMail()
        ];
    }
}