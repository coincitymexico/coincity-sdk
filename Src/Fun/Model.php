<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun;

use Coincity\SDK\Fun\Attr\AttributesModel;
use Coincity\SDK\Fun\Interfaces\IModel;
use Coincity\SDK\Fun\Interfaces\IParser;
use Coincity\SDK\Models;
use Danidoble\Danidoble;

class Model extends Models implements IModel, IParser
{
    /**
     * @var AttributesModel
     */
    public AttributesModel $attributes;
    /**
     * @var string|null
     */
    static public ?string $class_name = Model::class;
    /**
     * @var string|null
     */
    static public ?string $api_uri = "model";

    /**
     * @param string|null $token
     */
    public function __construct(string $token = null)
    {
        parent::__construct($token);
        self::setStaticData();
        $this->setAttributes();
    }

    /**
     * Make an instance of attributes to this model
     */
    private function setAttributes()
    {
        $this->attributes = new AttributesModel();
    }

    /**
     * Set static string for uri API and this class name
     */
    private static function setStaticData()
    {
        Models::$api_uri = self::$api_uri;
        Models::$class_name = self::$class_name;
    }

    /**
     * @param int $id
     * @return Update\Updater|Danidoble|mixed
     */
    public static function findById(int $id)
    {
        self::setStaticData();
        return parent::findById($id);
    }

    /**
     * @param int $page
     * @return Danidoble|mixed
     */
    public static function getPaginated(int $page = 1)
    {
        self::setStaticData();
        return parent::getPaginated($page);
    }
}