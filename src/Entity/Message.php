<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nom;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $mail;

    /**
     * @ORM\Column(type="string", length=100)
     */

    protected $titre;

    /**
     * @ORM\Column(type="text")
     */

    protected $message;


    public function getId()
    {
        return $this->$id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        return $this->nom = $nom;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        return $this->mail = $mail;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        return $this->titre = $titre;
    }

    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message)
    {
        return $this->message = $message;
    }


    // add your own fields
}
