<?php
namespace EterelzApi\Data;


use DateTime;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterMember
 * @package data
 * @ORM\Entity
 * @ORM\Table(name="eter_member")
 */
class EterMember
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $member_inscr;

    /**
     * @ORM\ManyToOne(targetEntity="EterUsers", inversedBy="member")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="EterGrade", inversedBy="member")
     * @ORM\JoinColumn(name="grade_id", referencedColumnName="id")
     */
    private $grade;

    /**
     * @ORM\ManyToOne(targetEntity="EterClan", inversedBy="member")
     * @ORM\JoinColumn(name="clan_id", referencedColumnName="id")
     */
    private $clan;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}