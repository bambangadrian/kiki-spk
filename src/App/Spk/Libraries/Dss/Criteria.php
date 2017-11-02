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

class Criteria implements \SimpleApp\Spk\Libraries\Dss\Rules\ParamInterface
{

    private $Name;

    private $Value;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->Name = $name;
    }

    public function setValue($value)
    {
        $this->Value = $value;
    }

    public function getValue()
    {
        return $this->Value;
    }
}
