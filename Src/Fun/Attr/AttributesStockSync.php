<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Attr;

use Coincity\SDK\Fun\Abstracts\AParser;
use Coincity\SDK\Fun\Attr\Interfaces\IAttributesStockSync;
use Coincity\SDK\Fun\Interfaces\IParser;
use Coincity\SDK\Fun\Traits\MagicMethods;
use Coincity\SDK\Fun\Traits\Parser;
use Coincity\SDK\Fun\Traits\TAttributes;

class AttributesStockSync extends AParser implements IAttributesStockSync, IParser
{
    use MagicMethods, Parser, TAttributes;

    /**
     * @var array
     */
    private array $protected = [

    ];
    /**
     * @var array
     */
    private array $public = [
        'cve_sae',
        'down',
        'up',
    ];
    /**
     * @var array
     */
    private array $_real_name = [
        'cve_sae' => 'cve_sae',
        'down' => 'down',
        'up' => 'up',
    ];

    private array $_append_const = [

    ];
    public array $_def_val = [
        "down" => 0,
        "up" => 0,
    ];

    /**
     * Identifier of user, don't assign if it's new user
     * @var int
     */
    protected int $id;
    /**
     * Key of SAE
     * @var string
     */
    protected string $cve_sae;
    /**
     * Number of product to discount on intranet
     * @var ?int
     */
    protected ?int $down = null;
    /**
     * Number of product to increase online
     * @var ?int
     */
    protected ?int $up = null;

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
    public function getDown(): int
    {
        return $this->down;
    }

    /**
     * @param int $down
     */
    public function setDown(int $down): void
    {
        $this->down = $down;
    }

    /**
     * @return int
     */
    public function getUp(): int
    {
        return $this->up;
    }

    /**
     * @param int $up
     */
    public function setUp(int $up): void
    {
        $this->up = $up;
    }
}