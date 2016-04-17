<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="GameBundle\Entity\Town", mappedBy="user")
     */
    protected $town;

    /**
     * @ORM\OneToOne(targetEntity="GameBundle\Entity\Town", cascade={"persist"})
     */
    protected $townCurrant;



    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    


    /**
     * Add town
     *
     * @param \GameBundle\Entity\Town $town
     *
     * @return User
     */
    public function addTown(\GameBundle\Entity\Town $town)
    {
        $this->town[] = $town;

        return $this;
    }

    /**
     * Remove town
     *
     * @param \GameBundle\Entity\Town $town
     */
    public function removeTown(\GameBundle\Entity\Town $town)
    {
        $this->town->removeElement($town);
    }

    /**
     * Get town
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set townCurrant
     *
     * @param \GameBundle\Entity\Town $townCurrant
     *
     * @return User
     */
    public function setTownCurrant(\GameBundle\Entity\Town $townCurrant = null)
    {
        $this->townCurrant = $townCurrant;

        return $this;
    }

    /**
     * Get townCurrant
     *
     * @return \GameBundle\Entity\Town
     */
    public function getTownCurrant()
    {
        return $this->townCurrant;
    }
}
