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

abstract class AbstractSpec implements SpecInterface
{

    /**
     * @var array $Params
     */
    protected $Params;

    abstract public function isSatisfiedBy($param = null);

    public function setParams(array $params)
    {
        $this->Params = $params;
    }

    public function getParams()
    {
        return $this->Params;
    }

    public function plus(SpecInterface $spec)
    {
        return new Specs\Plus($this, $spec);
    }

    public function either(SpecInterface $spec)
    {
        return new Specs\Either($this, $spec);
    }

    public function not()
    {
        return new Specs\Not($this);
    }
}