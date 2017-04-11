<?php

namespace Kamil\AddressBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Telephone
 *
 * @ORM\Table(name="telephone")
 * @ORM\Entity(repositoryClass="Kamil\AddressBookBundle\Repository\TelephoneRepository")
 */
class Telephone
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
     * @var int
     *
     * @ORM\Column(name="telephoneNumber", type="string", length=10)
     */
    private $telephoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="telephoneType", type="string", length=255)
     */
    private $telephoneType;
    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="telephone")
     */
    private $users;


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
     * Set telephoneNumber
     *
     * @param integer $telephoneNumber
     * @return Telephone
     */
    public function setTelephoneNumber($telephoneNumber)
    {
        $this->telephoneNumber = $telephoneNumber;

        return $this;
    }

    /**
     * Get telephoneNumber
     *
     * @return integer 
     */
    public function getTelephoneNumber()
    {
        return $this->telephoneNumber;
    }

    /**
     * Set telephoneType
     *
     * @param string $telephoneType
     * @return Telephone
     */
    public function setTelephoneType($telephoneType)
    {
        $this->telephoneType = $telephoneType;

        return $this;
    }

    /**
     * Get telephoneType
     *
     * @return string 
     */
    public function getTelephoneType()
    {
        return $this->telephoneType;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * Add users
     *
     * @param \Kamil\AddressBookBundle\Entity\User $users
     * @return Telephone
     */
    public function addUser(\Kamil\AddressBookBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Kamil\AddressBookBundle\Entity\User $users
     */
    public function removeUser(\Kamil\AddressBookBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
