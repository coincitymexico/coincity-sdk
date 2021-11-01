<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Attr;

use Coincity\SDK\Fun\Abstracts\AParser;
use Coincity\SDK\Fun\Attr\Interfaces\IAttributesSearch;
use Coincity\SDK\Fun\Interfaces\IParser;
use Coincity\SDK\Fun\Traits\MagicMethods;
use Coincity\SDK\Fun\Traits\Parser;
use Coincity\SDK\Fun\Traits\TAttributes;

class AttributesSearch extends AParser implements IAttributesSearch, IParser
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
        'searched',
        'times',
        'last_date',
        'restore_this',
    ];
    /**
     * @var array|string[]
     */
    private array $_real_name = [
        'id' => 'id_busqueda',
        'user_id' => 'id_usuario',
        'searched' => 'buscado',
        'times' => 'veces',
        'last_date' => 'ultima_fecha',
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
    protected string $searched;
    /**
     * @var int
     */
    protected int $times;
    /**
     * @var string
     */
    protected string $last_date;

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
    public function getLastDate(): string
    {
        return $this->last_date;
    }

    /**
     * @param string $last_date
     */
    public function setLastDate(string $last_date): void
    {
        $this->last_date = $last_date;
    }


}