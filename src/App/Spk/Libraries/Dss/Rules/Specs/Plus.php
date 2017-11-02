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

class Plus extends \SimpleApp\Spk\Libraries\Dss\Rules\AbstractSpec
{

    protected $Left;

    protected $Right;

    public function __construct(
        \SimpleApp\Spk\Libraries\Dss\Rules\SpecInterface $left,
        \SimpleApp\Spk\Libraries\Dss\Rules\SpecInterface $right
    ) {
        $this->Left = $left;
        $this->Right = $right;
    }

    public function isSatisfiedBy($param = null)
    {
        $this->Left->setParams($this->getParams());
        $this->Right->setParams($this->getParams());
        $spec1 = $this->Left->isSatisfiedBy($param);
        $spec2 = $this->Right->isSatisfiedBy($param);
        return ($spec1 and $spec2);
    }
}
