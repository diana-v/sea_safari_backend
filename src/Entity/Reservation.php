<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Reservation
{
    /**
     * @Assert\NotBlank
     * @Assert\Length (
     *     max = 30,
     * )
     */
    private $name;

    /**
     * @Assert\GreaterThanOrEqual(0)
     * @Assert\LessThanOrEqual(23)
     */
    private $passengers;

    /**
     * @Assert\NotBlank
     * @Assert\Length (
     *     max = 20,
     * )
     */
    private $phone;

    /**
     * @Assert\Email(
     *     message = "Jūsų el. paštas '{{ value }}' nėra teisingas."
     * )
     */
    protected $email;

    /**
     * @Assert\NotBlank
     */
    private $destination;

    /**
     * @Assert\NotBlank
     * @Assert\Date
     * @var string A "Y-m-d" formatted value
     */
    protected $date;


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPassengers()
    {
        return $this->passengers;
    }

    public function setPassengers($passengers)
    {
        $this->passengers = $passengers;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDestination()
    {
        return $this->destination;
    }

    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
}