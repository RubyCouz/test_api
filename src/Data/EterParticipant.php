<?php
namespace EterelzApi\Data;


use DateTime;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterParticipant
 * @package data
 * @ORM\Entity
 * @ORM\Table(name="eter_participant")
 */
class EterParticipant
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $part_inscr;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $part_winner;

    /**
     * @ORM\ManyToOne(targetEntity="EterUsers", inversedBy="participant")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="EterEvent", inversedBy="participant")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="EterFunction", inversedBy="participant")
     * @ORM\JoinColumn(name="function_id", referencedColumnName="id")
     */
    private $function;


    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}