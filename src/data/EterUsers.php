<?php
namespace data;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use GraphQL\Utils\Utils;

/**
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

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}

