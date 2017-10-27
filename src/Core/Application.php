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

namespace SimpleFw\Core;

/**
 * Class Application.
 *
 * @package SimpleFw\Core
 */
class Application{

    private function __construct()
    {
    }

    public static function init(){

    }

    public static function run(){
        self::init();
    }
}