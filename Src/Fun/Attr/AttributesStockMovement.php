<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Attr;

use Coincity\SDK\Fun\Abstracts\AParser;
use Coincity\SDK\Fun\Attr\Interfaces\IAttributesStockMovement;
use Coincity\SDK\Fun\Interfaces\IParser;
use Coincity\SDK\Fun\Traits\MagicMethods;
use Coincity\SDK\Fun\Traits\Parser;
use Coincity\SDK\Fun\Traits\TAttributes;

class AttributesStockMovement extends AParser implements IAttributesStockMovement, IParser
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
        'id_stock',
        'id_product',
        'id_variant',
        'stock',
        'restore_this',
    ];
    /**
     * @var array|string[]
     */
    private array $_real_name = [
        'id' => 'id',
        'cve_sae' => 'cve_sae',
        'stock_id' => 'id_stock',
        'product_id' => 'id_product',
        'variant_id' => 'id_variant',
        'stock' => 'new_stock',
        'restore_this' => 'restore_this',
    ];

    private array $_append_const = [

    ];
    public array $_def_val = [

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
     * @var int|null
     */
    protected ?int $id_stock;
    /**
     * @var int|null
     */
    protected ?int $id_product;
    /**
     * @var int|null
     */
    protected ?int $id_variant;
    /**
     * @var int
     */
    protected int $new_stock;

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
     * @return int|null
     */
    public function getIdStock(): ?int
    {
        return $this->id_stock;
    }

    /**
     * @param int|null $id_stock
     */
    public function setIdStock(?int $id_stock): void
    {
        $this->id_stock = $id_stock;
    }

    /**
     * @return int|null
     */
    public function getIdProduct(): ?int
    {
        return $this->id_product;
    }

    /**
     * @param int|null $id_product
     */
    public function setIdProduct(?int $id_product): void
    {
        $this->id_product = $id_product;
    }

    /**
     * @return int|null
     */
    public function getIdVariant(): ?int
    {
        return $this->id_variant;
    }

    /**
     * @param int|null $id_variant
     */
    public function setIdVariant(?int $id_variant): void
    {
        $this->id_variant = $id_variant;
    }

    /**
     * @return int
     */
    public function getNewStock(): int
    {
        return $this->new_stock;
    }

    /**
     * @param int $new_stock
     */
    public function setNewStock(int $new_stock): void
    {
        $this->new_stock = $new_stock;
    }

}