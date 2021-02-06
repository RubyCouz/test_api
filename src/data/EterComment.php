<?php


namespace data;

use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterComment
 * @package data
 * @ORM\Table(name="eter_comment")
 * @ORM\Entity
 */
class EterComment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $com_id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $com_content;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}