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

namespace SimpleFw\Components\Mvc;

class Model
{

    private $EntityName;

    public function getEntityName()
    {
        return $this->EntityName;
    }

    protected function setEntityName($entityName)
    {
        $this->EntityName = $entityName;
    }
}