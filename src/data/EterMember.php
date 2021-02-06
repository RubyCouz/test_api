<?php


namespace data;

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
    private $member_id;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $member_inscr;

    /**
     * @ORM\ManyToOne(targetEntity="EterUser", inversedBy="member")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="EterGrade", inversedBy="member")
     * @ORM\JoinColumn(name="grade_id", referencedColumnName="grade_id")
     */
    private $grade;

    /**
     * @ORM\ManyToOne(targetEntity="EterClan", inversedBy="member")
     * @ORM\JoinColumn(name="clan_id", referencedColumnName="clan_id")
     */
    private $clan;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}