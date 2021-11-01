<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Attr;

use Coincity\SDK\Fun\Abstracts\AParser;
use Coincity\SDK\Fun\Attr\Interfaces\IAttributesSubCategoryMachine;
use Coincity\SDK\Fun\Interfaces\IParser;
use Coincity\SDK\Fun\Traits\MagicMethods;
use Coincity\SDK\Fun\Traits\Parser;
use Coincity\SDK\Fun\Traits\TAttributes;

class AttributesSubCategoryMachine extends AParser implements IAttributesSubCategoryMachine, IParser
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
        'id',
        'name',
    ];
    /**
     * @var array
     */
    private array $_real_name = [
        'id' => 'id_subcat_maq',
        'name' => 'nombre',
    ];

    private array $_append_const = [

    ];

    public array $_def_val = [

    ];

    /**
     * Identifier of model, don't assign if it's new entry
     * @var int
     */
    protected int $id;
    /**
     * @var string|null
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
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }


}