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

namespace SimpleApp\Spk\Libraries\Dss\Rules\Notations;

class Factory
{

    protected $List;

    public function __construct()
    {
        $this->List = [
            'eq'  => __NAMESPACE__ . '\\Equal',
            'in'  => __NAMESPACE__ . '\\In',
            'lt'  => __NAMESPACE__ . '\\LessThan',
            'lte' => __NAMESPACE__ . '\\LessThanEqual',
            'gt'  => __NAMESPACE__ . '\\GreaterThan',
            'gte' => __NAMESPACE__ . '\\GreaterThanEqual',
            'neq' => __NAMESPACE__ . '\\NotEqual',
            'nin' => __NAMESPACE__ . '\\NotIn'
        ];
    }

    public static function getInstance()
    {
        return new self();
    }

    /**
     * @param string $notation
     *
     * @return NotationInterface
     */
    public function createNotation($notation)
    {
        if (array_key_exists($notation, $this->List) === false) {
            throw new \InvalidArgumentException($notation . ' is not valid notation type');
        }
        $notationClassName = $this->List[$notation];
        return new $notationClassName();
    }
}
