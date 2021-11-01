<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Attr;

use Coincity\SDK\Fun\Abstracts\AParser;
use Coincity\SDK\Fun\Attr\Interfaces\IAttributesSearchCookie;
use Coincity\SDK\Fun\Interfaces\IParser;
use Coincity\SDK\Fun\Traits\MagicMethods;
use Coincity\SDK\Fun\Traits\Parser;
use Coincity\SDK\Fun\Traits\TAttributes;

class AttributesSearchCookie extends AParser implements IAttributesSearchCookie, IParser
{
    use MagicMethods, Parser, TAttributes;

    /**
     * @var array|string[]
     */
    private array $protected = [

    ];
    /**
     * @var array|string[]
     */
    private array $public = [
        'id',
        'user_id',
        'page',
        'searched',
        'times',
        'ip_address',
        'cookie',
        'restore_this',
    ];
    /**
     * @var array|string[]
     */
    private array $_real_name = [
        'id' => 'id_busqueda',
        'user_id' => 'id_usuario',
        'page' => 'pagina',
        'searched' => 'busqueda',
        'times' => 'veces',
        'ip_address' => 'ip_address',
        'cookie' => 'cookie',
        'restore_this' => 'restore_this',
    ];

    private array $_append_const = [

    ];
    public array $_def_val = [
        "veces" => 1,
    ];

    /**
     * @var int
     */
    protected int $id;
    /**
     * @var int|null
     */
    protected ?int $user_id;
    /**
     * @var string
     */
    protected string $page;
    /**
     * @var string
     */
    protected string $searched;
    /**
     * @var int
     */
    protected int $times;
    /**
     * @var string
     */
    protected string $ip_address;
    /**
     * @var string
     */
    protected string $cookie;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
     * @param int|null $user_id
     */
    public function setUserId(?int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getPage(): string
    {
        return $this->page;
    }

    /**
     * @param string $page
     */
    public function setPage(string $page): void
    {
        $this->page = $page;
    }

    /**
     * @return string
     */
    public function getSearched(): string
    {
        return $this->searched;
    }

    /**
     * @param string $searched
     */
    public function setSearched(string $searched): void
    {
        $this->searched = $searched;
    }

    /**
     * @return int
     */
    public function getTimes(): int
    {
        return $this->times;
    }

    /**
     * @param int $times
     */
    public function setTimes(int $times): void
    {
        $this->times = $times;
    }

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ip_address;
    }

    /**
     * @param string $ip_address
     */
    public function setIpAddress(string $ip_address): void
    {
        $this->ip_address = $ip_address;
    }

    /**
     * @return string
     */
    public function getCookie(): string
    {
        return $this->cookie;
    }

    /**
     * @param string $cookie
     */
    public function setCookie(string $cookie): void
    {
        $this->cookie = $cookie;
    }


}