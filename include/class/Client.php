<?php
class Client
{
    private $id;
    private $name;
    private $email;
    private $adress;
    private $postal_code;
    private $city;

    public function __construct($id, $name, $email, $adress, $postal_code, $city)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->adress = $adress;
        $this->postal_code = $postal_code;
        $this->city = $city;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAdress()
    {
        return $this->adress;
    }

    public function getPostalCode()
    {
        return $this->postal_code;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setAdress($adress): void
    {
        $this->adress = $adress;
    }

    public function setPostalCode($postal_code): void
    {
        $this->postal_code = $postal_code;
    }

    public function setCity($city): void
    {
        $this->city = $city;
    }
}