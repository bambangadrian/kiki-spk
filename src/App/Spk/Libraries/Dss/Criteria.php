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

namespace SimpleApp\Spk\Libraries\Dss;

class Criteria
{

    const COST_TYPE    = 'cost';

    const BENEFIT_TYPE = 'benefit';

    private $Code;

    private $FieldName;

    private $Weight;

    private $Type;

    private $SubCriterias;

    /**
     * @var Fuzzy $FuzzyRule
     */
    private $FuzzyRule;

    public function __construct($code, $fieldName, $type = self::BENEFIT_TYPE, $weight = 0)
    {
        $this->setCode($code);
        $this->setFieldName($fieldName);
        $this->setType($type);
        $this->setWeight($weight);
    }

    public function buildRules(){

    }

    public function addSubCriteria(Criteria $criteria)
    {
        $this->SubCriterias[$criteria->getCode()] = $criteria;
    }

    public function getSubCriterias()
    {
        return $this->SubCriterias;
    }

    public function isParent()
    {
        return (count($this->getSubCriterias()) > 0);
    }

    /**
     * @return string
     */
    public function getFieldName()
    {
        return $this->FieldName;
    }

    /**
     * @param string $name
     */
    public function setFieldName($name)
    {
        $this->FieldName = $name;
    }

    public function getCode()
    {
        $this->getCode();
    }

    public function setCode($code)
    {
        $this->Code = $code;
    }

    public function setWeight($weight)
    {
        $this->Weight = $weight;
    }

    public function getWeight()
    {
        return $this->Weight;
    }

    public function getType()
    {
        return $this->Type;
    }

    public function setType($type)
    {
        if (array_key_exists($type, [self::COST_TYPE, self::BENEFIT_TYPE]) === false) {
            throw new \InvalidArgumentException($type . ' is invalid criteria type');
        }
        $this->Type = $type;
    }
}
