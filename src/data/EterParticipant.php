<?php


namespace data;

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
    private $part_id;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $part_inscr;

    /**
     * @var bool
     * @ORM\Column("type=boolean")
     */
    private $part_winner;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}