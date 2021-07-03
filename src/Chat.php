<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="chat")
 */
class Chat
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $message;
    /**
     * @ORM\Column(type="string")
     */
    private $response;

    public function getId() {
        return $this->id;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getResponse() {
        return $this->response;
    }

}