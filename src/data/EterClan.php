<?php


namespace data;

use Cassandra\Date;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterClan
 * @package data
 * @ORM\Table(name="eter_clan")
 * @ORM\Entity
 */
class EterClan
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $clan_id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $clan_name;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $clan_desc;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $clan_ban;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $clan_create;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $clan_slogan;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $clan_discord;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $clan_recrut;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $clan_activity;

    /**
     * @ORM\ManyToMany(targetEntity="EterGame", mappedBy="game_clan")
     */
    private $games;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $clan_update;

    /**
     * @ORM\ManyToMany(targetEntity="EterEvent", inversedBy="clan")
     * @ORM\JoinTable(name="clan_event")
     */
    private $event;

    /**
     * @ORM\ManyToMany(targetEntity="EterGameplay", inversedBy="clan")
     * @ORM\JoinTable(name="clan_gameplay")
     */
    private $gameplay;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}