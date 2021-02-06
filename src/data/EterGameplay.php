<?php


namespace data;

use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterGameplay
 * @package data
 * @ORM\Entity
 * @ORM\Table(name="eter_gameplay)
 */
class EterGameplay
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $gameplay_id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $gameplay_type;


    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}