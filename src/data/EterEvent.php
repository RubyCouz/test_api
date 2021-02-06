<?php


namespace data;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterEvent
 * @package data
 * @ORM\Entity
 * @ORM\Table(name="eter_event')
 */
class EterEvent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $event_id;

    /**
     * @ORM\Column(type=string)
     * @var string
     */
    private $event_name;

    /**
     * @ORM\Column(type=datetime)
     * @var Datetime
     */
    private $event_date;

    /**
     * @ORM\Column(type=string)
     * @var string
     */
    private $event_score;

    /**
     * @ORM\Column(type=datetime)
     * @var DateTime
     */
    private $event_creation;

    /**
     * @ORM\ManyToMany(targetEntity="EterClan", mappedBy="event")
     */
    private $clan;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}