<?php
namespace EterelzApi\Data;


use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterGame
 * @package data
 * @ORM\Entity
 * @ORM\Table(name="eter_game")
 */
class EterGame
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $game_name;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $game_pic;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $game_background;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $game_description;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $game_update;

    /**
     * @ORM\ManyToMany(targetEntity="EterGender", inversedBy="games")
     * @ORM\JoinTable(name="game_gender",
     * joinColumns={@ORM\JoinColumn(name="game_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="gender_id", referencedColumnName="id")})
     */
    private $game_gender;

    /**
     * @ORM\ManyToMany(targetEntity="EterPlateform", inversedBy="games")
     * @ORM\JoinTable(name="game_plateform",
     * joinColumns={@ORM\JoinColumn(name="game_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="plateform_id", referencedColumnName="id")}
     *     )
     */
    private $game_plateform;

//    /**
//     * @ORM\ManyToMany(targetEntity="EterClan", inversedBy="games")
//     * @ORM\JoinTable(name="game_clan")
//     */
//    private $game_clan;

//    /**
//     * @ORM\ManyToMany(targetEntity="EterUsers", mappedBy="user_game")
//     */
//    private $users;

    public function __construct(array $data)
    {
        $this->game_plateform = new ArrayCollection();
//        $this->game_clan = new ArrayCollection();
//        $this->users = new ArrayCollection();
        Utils::assign($this, $data);
    }
}