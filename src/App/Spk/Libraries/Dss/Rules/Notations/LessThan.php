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

class LessThan implements NotationInterface{

    public function compare($a, $b, \SimpleApp\Spk\Libraries\Dss\Rules\Types\TypeInterface $type)
    {
        return ($type->getValue($a) < $type->getValue($b));
    }
}
