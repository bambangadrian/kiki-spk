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

class Rule
{

    /**
     * @var array $Params
     */
    private $Params;

    /**
     * @var SpecInterface $Spec
     */
    private $Spec;

    private $Value;

    public function __construct(SpecInterface $spec, $value)
    {
        $this->setSpec($spec);
        $this->setValue($value);
    }

    public function setSpec(SpecInterface $spec)
    {
        $this->Spec = $spec;
    }

    public function setParams(array $params)
    {
        $this->Params = $params;
    }

    public function getParams()
    {
        return $this->Params;
    }

    public function getSpec()
    {
        return $this->Spec;
    }

    public function setValue($value)
    {
        $this->Value = $value;
    }

    public function getValue()
    {
        return $this->Value;
    }

    public function isMatch($param = null)
    {
        if ($this->getParams() !== null) {
            $this->Spec->setParams($this->getParams());
        }
        return $this->Spec->isSatisfiedBy($param);
    }
}
