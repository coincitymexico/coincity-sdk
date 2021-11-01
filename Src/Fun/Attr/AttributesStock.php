<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Attr;

use Coincity\SDK\Fun\Abstracts\AParser;
use Coincity\SDK\Fun\Attr\Interfaces\IAttributesStock;
use Coincity\SDK\Fun\Interfaces\IParser;
use Coincity\SDK\Fun\Traits\MagicMethods;
use Coincity\SDK\Fun\Traits\Parser;
use Coincity\SDK\Fun\Traits\TAttributes;

class AttributesStock extends AParser implements IAttributesStock, IParser
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
        'cve_sae',
        'min',
        'max',
        'stock',
        'is_decremental',
        'restore_this',
    ];
    /**
     * @var array|string[]
     */
    private array $_real_name = [
        'id' => 'id',
        'cve_sae' => 'cve_sae',
        'min' => 'xmin',
        'max' => 'xmax',
        'stock' => 'stock',
        'is_decremental' => 'decrementing',
        'restore_this' => 'restore_this',
    ];

    private array $_append_const = [

    ];
    public array $_def_val = [
        'min' => 0,
        'max' => 0,
        'is_decremental' => 1,
    ];

    /**
     * @var int
     */
    protected int $id;
    /**
     * @var string
     */
    protected string $cve_sae;
    /**
     * @var int
     */
    protected int $min;
    /**
     * @var int
     */
    protected int $max;
    /**
     * @var int
     */
    protected int $stock;
    /**
     * @var int
     */
    protected int $is_decremental;

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
     * @return string
     */
    public function getCveSae(): string
    {
        return $this->cve_sae;
    }

    /**
     * @param string $cve_sae
     */
    public function setCveSae(string $cve_sae): void
    {
        $this->cve_sae = $cve_sae;
    }

    /**
     * @return int
     */
    public function getMin(): int
    {
        return $this->min;
    }

    /**
     * @param int $min
     */
    public function setMin(int $min): void
    {
        $this->min = $min;
    }

    /**
     * @return int
     */
    public function getMax(): int
    {
        return $this->max;
    }

    /**
     * @param int $max
     */
    public function setMax(int $max): void
    {
        $this->max = $max;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     */
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return int
     */
    public function getIsDecremental(): int
    {
        return $this->is_decremental;
    }

    /**
     * @param int $is_decremental
     */
    public function setIsDecremental(int $is_decremental): void
    {
        $this->is_decremental = $is_decremental;
    }


}