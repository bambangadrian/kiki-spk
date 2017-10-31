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
require_once __DIR__ . '/../System/Bootstrap.php';
try {
    $requestHandler = new \SimpleFw\Core\Request();
    $sessionHandler = new \SimpleFw\Core\Session();
    $configHandler = new \SimpleFw\Core\Config();
    $routeHandler = new \SimpleFw\Core\Router();\


} catch (\Exception $ex) {
    var_dump($ex->getTraceAsString());
}
