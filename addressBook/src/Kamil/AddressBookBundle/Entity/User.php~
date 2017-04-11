<?php

namespace Kamil\AddressBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Kamil\AddressBookBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=100)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
    /**
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="users")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;
    /**
     * @ORM\ManyToOne(targetEntity="Email", inversedBy="users")
     * @ORM\JoinColumn(name="email_id", referencedColumnName="id")
     */
    private $email;
    /**
     * @ORM\ManyToOne(targetEntity="Telephone", inversedBy="users")
     * @ORM\JoinColumn(name="telephone_id", referencedColumnName="id")
     */
    private $telephone;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set address
     *
     * @param \Kamil\AddressBookBundle\Entity\Address $address
     * @return User
     */
    public function setAddress(\Kamil\AddressBookBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \Kamil\AddressBookBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set email
     *
     * @param \Kamil\AddressBookBundle\Entity\Email $email
     * @return User
     */
    public function setEmail(\Kamil\AddressBookBundle\Entity\Email $email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return \Kamil\AddressBookBundle\Entity\Email 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param \Kamil\AddressBookBundle\Entity\Telephone $telephone
     * @return User
     */
    public function setTelephone(\Kamil\AddressBookBundle\Entity\Telephone $telephone = null)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return \Kamil\AddressBookBundle\Entity\Telephone 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }
}
