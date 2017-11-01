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

class Route extends \SimpleFw\Core\Route
{

    private $App;

    public function __construct()
    {
    }

    public function doRoute(\SimpleFw\Core\Request $request)
    {
        parent::doRoute($request); # TODO: Change the autogenerated stub
        $controllerName = $this->getController($request->getData('controller'));
        $modelName = $this->getModel($request->getData('model'));
        /**
         * @var \SimpleFw\Components\Mvc\Controller $controller
         */
        $controller = new $controllerName();
        $controller->setModel($modelName);
        $controller->load();
    }

    private function getController($controller)
    {
        return \SimpleFw\Core\Helpers\String::toNameSpaceFormat($controller);
    }

    private function getModel($model)
    {
        return \SimpleFw\Core\Helpers\String::toNameSpaceFormat($model);
    }
}