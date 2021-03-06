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

class Numeric implements TypeInterface
{

    public function getValue($param)
    {
        if (is_numeric($param) === false) {
            throw new \InvalidArgumentException($param . ' is not numeric type');
        }
        return $param;
    }
}
