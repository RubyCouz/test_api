<?php
namespace EterelzApi\Data;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterFunction
 * @package data
 * @ORM\Entity
 * @ORM\Table(name="eter_function")
 */
class EterFunction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column (type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $function_name;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="EterParticipant", mappedBy="function")
     */
    private $participant;

    public function __construct(array $data)
    {
        $this->participant = new ArrayCollection();
        Utils::assign($this, $data);
    }
}