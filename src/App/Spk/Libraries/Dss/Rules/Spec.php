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

namespace SimpleApp\Spk\Libraries\Dss\Rules;

class Spec extends \SimpleApp\Spk\Libraries\Dss\Rules\AbstractSpec
{

    /**
     * @var Types\TypeInterface $Type
     */
    private $Type;

    /**
     * @var Notations\NotationInterface $Notation
     */
    private $Notation;

    private $ParamName;

    private $ParamValue;

    private $Value;

    /**
     * @var ParamInterface[] $Params ;
     */
    protected $Params;

    public function __construct($value, $notation = 'eq', $paramName = null, $paramValue = null)
    {
        $this->setNotation($notation);
        $this->setValue($value);
        $this->setParamValue($paramValue);
        $this->loadType($value);
        $this->setParamName($paramName);
    }

    public function setParamName($paramName)
    {
        $this->ParamName = $paramName;
    }

    public function getParamName()
    {
        return $this->ParamName;
    }

    private function loadType($value)
    {
        $type = Types\TypeInterface::STRING;
        if (is_array($value) === true) {
            $type = Types\TypeInterface::COLLECTION;
        } elseif (is_numeric($value) === true) {
            $type = Types\TypeInterface::NUMERIC;
        }
        $this->Type = Types\Factory::getInstance()->createType($type);
    }

    private function setNotation($notation = 'eq')
    {
        $this->Notation = Notations\Factory::getInstance()->createNotation($notation);
    }

    public function getParamValue()
    {
        return $this->ParamValue;
    }

    public function setParamValue($paramValue)
    {
        $this->ParamValue = $paramValue;
    }

    public function setValue($value)
    {
        $this->Value = $value;
    }

    public function getType()
    {
        return $this->Type;
    }

    public function getValue()
    {
        return $this->Value;
    }

    public function isSatisfiedBy($param = null)
    {
        $params = $this->getParams();
        $paramName = $this->getParamName();
        if ($paramName !== null and array_key_exists($paramName, $params) === true) {
            $param = $params[$paramName];
        }
        if ($param === null) {
            $param = $this->getParamValue();
        }
        if ($param === null) {
            return false;
        }
        if ($this->Notation->compare($param, $this->getValue(), $this->getType()) === true) {
            return true;
        }
        return false;
    }
}
