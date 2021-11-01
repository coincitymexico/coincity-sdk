<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Attr;

use Coincity\SDK\Fun\Abstracts\AParser;
use Coincity\SDK\Fun\Attr\Interfaces\IAttributesCategory;
use Coincity\SDK\Fun\Interfaces\IParser;
use Coincity\SDK\Fun\Traits\MagicMethods;
use Coincity\SDK\Fun\Traits\Parser;
use Coincity\SDK\Fun\Traits\TAttributes;

class AttributesCategory extends AParser implements IAttributesCategory, IParser
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
        'name',
        'restore_this',
    ];
    /**
     * @var array|string[]
     */
    private array $_real_name = [
        'id' => 'id_categoria',
        'name' => 'nombre',
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
    protected string $name;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


}