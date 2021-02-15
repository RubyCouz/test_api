<?php
namespace EterelzApi\Data;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * @ORM\Entity
 * @ORM\Table(name="eter_users")
 * Class EterUsers
 */
class EterUsers
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $user_login;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $user_date_inscr;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $user_mail;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $user_password;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $user_address;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $user_zip;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $user_city;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $user_discord;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $user_statut;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $user_sexe;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $user_description;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $user_date_update;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $user_avatar;

//    relations

    /**
     * @ORM\ManyToMany(targetEntity="EterLabel", inversedBy="users")
     * @ORM\JoinTable(name="users_label",
     * joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="label_id", referencedColumnName="id")})
     */
    private $user_label;

    /**
     * @ORM\ManyToMany(targetEntity="EterGame", inversedBy="users")
     * @ORM\JoinTable(name="users_game",
     * joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="game_id", referencedColumnName="id")})
     */
    private $user_game;

    /**
     * @ORM\ManyToMany(targetEntity="EterStreamSupport", inversedBy="users")
     * @ORM\JoinTable(name="users_stream",
     * joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="support_id", referencedColumnName="id")})
     */
    private $user_stream;

    /**
     * @ORM\OneToMany(targetEntity="EterComment", mappedBy="user")
     */
    private $comment;

    /**
     * @ORM\OneToMany(targetEntity="EterContent", mappedBy="user")
     */
    private $content;

    /**
     * @ORM\OneToMany(targetEntity="EterMember", mappedBy="user")
     */
    private $member;

    /**
     * @ORM\OneToMany(targetEntity="EterParticipant", mappedBy="user")
     */
    private $participant;

    public function __construct(array $data)
    {
        $this->participant = new ArrayCollection();
        $this->member = new ArrayCollection();
        $this->content = new ArrayCollection();
        $this->comment = new ArrayCollection();
        $this->user_stream = new ArrayCollection();
        $this->user_game = new ArrayCollection();
        $this->user_label = new ArrayCollection();
        Utils::assign($this, $data);
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getUserMail(): ?string
    {
        return $this->user_mail;
    }
}

