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

namespace SimpleFw\Core\Design;

/**
 * Abstract class Singleton.
 *
 * @package    SimpleFw
 * @subpackage Core\Design
 * @author     Bambang Adrian S <bambang.adrian@gmail.com>
 */
abstract class AbstractSingleton
{

    /**
     * AbstractSingleton constructor.
     */
    protected function __construct()
    {
    }

    /**
     * Get instance of called class.
     *
     * @return mixed
     */
    final public static function getInstance()
    {
        static $instances = [];
        $calledClass = get_called_class();
        if (array_key_exists($calledClass, $instances) === false) {
            $instances[$calledClass] = new $calledClass();
        }
        return $instances[$calledClass];
    }

    /**
     * Disable the clone.
     *
     * @return void
     */
    final private function __clone()
    {
        // Clone is disabled
    }
}
