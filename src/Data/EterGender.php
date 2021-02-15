<?php
namespace EterelzApi\Data;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterGender
 * @package data
 * @ORM\Entity
 * @ORM\Table(name="eter_gender")
 */
class EterGender
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
    private $gender_name;

//    /**
//     * @ORM\ManyToMany(targetEntity="EterGame", mappedBy="game_gender")
//     */
//    private $games;

    public function __construct(array $data)
    {
//        $this->games = new ArrayCollection();
        Utils::assign($this, $data);
    }
}