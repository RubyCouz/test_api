<?php
namespace EterelzApi\Data;

use Cassandra\Date;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
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
    private $id;

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
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $clan_update;

    /**
     * @ORM\ManyToMany(targetEntity="EterGame", mappedBy="game_clan")
     * @ORM\JoinTable(name="clan_game",
     * joinColumns={@ORM\JoinColumn(name="clan_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="game_id", referencedColumnName="id")}
     *     )
     */
    private $games;

    /**
     * @ORM\ManyToMany(targetEntity="EterEvent", inversedBy="clan")
     * @ORM\JoinTable(name="clan_event",
     * joinColumns={@ORM\JoinColumn(name="clan_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="event_id", referencedColumnName="id")}
     * )
     */
    private $event;

    /**
     * @ORM\ManyToMany(targetEntity="EterGameplay", inversedBy="clan")
     * @ORM\JoinTable(name="clan_gameplay",
     * joinColumns={@ORM\JoinColumn(name="clan_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="gameplay_id", referencedColumnName="id")}
     *     )
     */
    private $gameplay;

    /**
     * @ORM\OneToMany(targetEntity="EterMember", mappedBy="clan")
     */
    private $member;

    public function __construct(array $data)
    {
        $this->member = new ArrayCollection();
        $this->gameplay = new ArrayCollection();
        $this->event = new ArrayCollection();
        Utils::assign($this, $data);
    }
}