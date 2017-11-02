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

namespace SimpleApp\Spk\Libraries\Dss\Rules\Specs;

class Not extends \SimpleApp\Spk\Libraries\Dss\Rules\AbstractSpec
{

    protected $Spec;

    public function __construct(\SimpleApp\Spk\Libraries\Dss\Rules\SpecInterface $spec)
    {
        $this->Spec = $spec;
    }

    public function isSatisfiedBy($param = null)
    {
        $this->Spec->setParams($this->getParams());
        return $this->Spec->isSatisfiedBy($param) === false;
    }
}
