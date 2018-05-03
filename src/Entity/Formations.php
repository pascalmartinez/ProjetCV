<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationsRepository")
 */
class Formations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $description;
    /**
     * @ORM\Column(type="string", length=255)
     */

    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $annee;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $icone;




    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getAnnee()
    {
        return $this->annee;
    }
    public function setAnnee($annee)
    {
        $this->annee = $annee;
    }
    public function getIcone()
    {
        return $this->icone;
    }
    public function setIcone($icone)
    {
        $this->icone = $icone;
    }

}
