<?php
/**
 * Code written is strictly used within this program.
 * Any other use of this code is in violation of copy rights.
 *
 * @package   -
 * @author    Bambang Adrian Sitompul <bambang.adrian@gmail.com>
 * @copyright 2016 Developer
 * @license   - No License
 * @version   GIT: $Id$
 * @link      -
 */

namespace SimpleApp\Spk\Libraries\Dss\Rules\Types;

class Factory
{

    private $List;

    public function __construct()
    {
        $this->List = [
            TypeInterface::COLLECTION => __NAMESPACE__ . '\\Collection',
            TypeInterface::STRING     => __NAMESPACE__ . '\\String',
            TypeInterface::NUMERIC    => __NAMESPACE__ . '\\Numeric',
        ];
    }

    public static function getInstance()
    {
        return new self;
    }

    /**
     * @param string $type
     *
     * @return TypeInterface
     */
    public function createType($type)
    {
        if (array_key_exists($type, $this->List) === false) {
            throw new \InvalidArgumentException($type . ' is not valid type');
        }
        $typeClassName = $this->List[$type];
        return new $typeClassName();
    }
}