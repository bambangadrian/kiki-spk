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

/**
 * Class Fuzzy.
 *
 * @package    SimpleApp
 * @subpackage Apps\Spk\Libraries\Dss
 * @author     Bambang Adrian Sitompul <bambang.adrian@gmail.com>
 */
class Fuzzy
{

    /**
     * @var array
     */
    private $Params;

    /**
     * @var Rules\Rule[] $Rules
     */
    private $Rules;

    public function addRule(Rules\Rule $rule)
    {
        $this->Rules[] = $rule;
    }

    public function getRules()
    {
        return $this->Rules;
    }

    public function addParam($paramName, $paramValue)
    {
        $this->Params[$paramName] = $paramValue;
    }

    public function setParams(array $params)
    {
        $this->Params = $params;
    }

    public function getParams()
    {
        return $this->Params;
    }

    public function getMatchValue($all = false)
    {
        $result = null;
        $rules = $this->getRules();
        foreach ($rules as $rule) {
            $rule->setParams($this->getParams());
            if ($rule->isMatch() === true) {
                $result = $rule->getValue();
                if ($all === true) {
                    continue;
                }
                break;
            }
        }
        return $result;
    }
}
