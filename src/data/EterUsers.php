<?php

namespace data;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * @UniqueEntity(
 *    fields = {"user_mail"},
 *    message = "L'email existe déjà"
 * )
 * @ORM\Entity
 * @ORM\Table(name="eter_users)
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
    private $user_id;

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
     * @ORM\Column(type="string)
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
     * @ORM\JoinTable(name="users_label")
     */
    private ArrayCollection $user_label;

    /**
     * @ORM\ManyToMany(targetEntity="EterGame", inversedBy="users")
     * @ORM\JoinTable(name="users-game")
     */
    private ArrayCollection $user_game;

    /**
     * @ORM\ManyToMany(targetEntity="EterStreamSuppot", inversedBy="users")
     */
    private ArrayCollection $user_stream;

    /**
     * @ORM\OneToMany(targetEntity="EterComment", mappedBy="user")
     */
    private ArrayCollection $comment;

    /**
     * @ORM\OneToMany(targetEntity="EterContent", mappedBy="user")
     */
    private ArrayCollection $content;

    /**
     * @ORM\OneToMany(targetEntity="EterMember", mappedBy="user")
     */
    private ArrayCollection $member;

    /**
     * @ORM\OneToMany(targetEntity="EterParticipant", mappedBy="user")
     */
    private ArrayCollection $participant;

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
}

