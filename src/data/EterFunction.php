<?php


namespace data;

use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
 * Class EterFunction
 * @package data
 * @ORM\Entity
 * @ORM\Table(name="eter_function")
 */
class EterFunction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column (type="eter_function")
     * @var int
     */
    private $function_id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $function_name;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}