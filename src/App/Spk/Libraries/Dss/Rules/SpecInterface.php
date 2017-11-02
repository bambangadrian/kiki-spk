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

interface SpecInterface{

    public function isSatisfiedBy($param = null);

    public function plus(SpecInterface $spec);

    public function either(SpecInterface $spec);

    public function not();

    public function setParams(array $params);

    public function getParams();
}
