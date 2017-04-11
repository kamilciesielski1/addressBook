<?php

namespace Kamil\AddressBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Email
 *
 * @ORM\Table(name="email")
 * @ORM\Entity(repositoryClass="Kamil\AddressBookBundle\Repository\EmailRepository")
 */
class Email
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
     * @ORM\Column(name="emailAddress", type="string", length=255)
     */
    private $emailAddress;
    /**
     * @ORM\Column(name="emailType", type="string", length=100)
     */
    private $emailType;
    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="email")
     */
    private $users;
    
    public function __construct() {
        $this->users = new ArrayCollection;
    }

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
     * Set emailAddress
     *
     * @param string $emailAddress
     * @return Email
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string 
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Add users
     *
     * @param \Kamil\AddressBookBundle\Entity\User $users
     * @return Email
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

    /**
     * Set emailType
     *
     * @param string $emailType
     * @return Email
     */
    public function setEmailType($emailType)
    {
        $this->emailType = $emailType;

        return $this;
    }

    /**
     * Get emailType
     *
     * @return string 
     */
    public function getEmailType()
    {
        return $this->emailType;
    }
}
