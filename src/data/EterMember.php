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


    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}