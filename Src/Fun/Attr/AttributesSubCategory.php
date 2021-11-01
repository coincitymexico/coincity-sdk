<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Attr;

use Coincity\SDK\Fun\Abstracts\AParser;
use Coincity\SDK\Fun\Attr\Interfaces\IAttributesSubCategory;
use Coincity\SDK\Fun\Interfaces\IParser;
use Coincity\SDK\Fun\Traits\MagicMethods;
use Coincity\SDK\Fun\Traits\Parser;
use Coincity\SDK\Fun\Traits\TAttributes;

class AttributesSubCategory extends AParser implements IAttributesSubCategory, IParser
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
        'category_id',
        'name',
    ];
    /**
     * @var array
     */
    private array $_real_name = [
        'id' => 'id_subcategoria',
        'category_id' => 'id_categoria',
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
     * @var int
     */
    protected int $category_id;
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
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @param int $category_id
     */
    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
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