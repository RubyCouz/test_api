<?php


namespace data;

use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterStreamSupport
 * @package data
 * @ORM\Entity
 * @ORM\Table(name="eter_stream_support")
 */
class EterStreamSupport
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $support_id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $support_name;


    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}