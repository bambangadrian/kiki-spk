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
    \SimpleFw\Core\Session::start();
    $route = new \SimpleFw\Core\Route();
    $route->doRoute(new \SimpleFw\Core\Request());
} catch (\Exception $ex) {
    echo $ex->getMessage();
}
