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
 * Class Session.
 *
 * @package    SimpleFw
 * @subpackage Core
 * @author     Bambang Adrian S <bambang.adrian@gmail.com>
 */
class Session extends \SimpleFw\Core\Design\AbstractSingleton
{

    /**
     * Check if session has been started or not.
     *
     * @return boolean
     */
    public static function isStarted()
    {
        return session_id() !== '' or session_status() === PHP_SESSION_ACTIVE;
    }

    /**
     * Get session id.
     *
     * @return string
     */
    public static function getId()
    {
        return session_id();
    }

    /**
     * Unset $_SESSION item property.
     *
     * @param string $sessionName SESSION field name parameter.
     *
     * @return void
     */
    public static function remove($sessionName)
    {
        unset($_SESSION[$sessionName]);
    }

    /**
     * Start the session.
     *
     * @return void
     */
    public static function start()
    {
        if (self::isStarted() === false) {
            session_start();
        }
    }

    /**
     * Get session data.
     *
     * @return array
     */
    public static function getData()
    {
        return $_SESSION;
    }

    /**
     * Check the existence of sessions item.
     *
     * @param string $sessionName SESSION field name parameter.
     *
     * @return boolean
     */
    public static function isExists($sessionName)
    {
        return array_key_exists($sessionName, self::getData());
    }

    /**
     * Get finger print identifier for session.
     *
     * @param string $appName Application name parameter.
     *
     * @return string
     */
    public static function generateAppSession($appName)
    {
        $fingerPrint = md5(
            preg_replace(
                '/[^a-zA-Z0-9]/',
                '',
                \SimpleFw\Core\Helpers\Server::getServerValue('HTTP_USER_AGENT') . session_id()
            )
        );
        return $appName . $fingerPrint;
    }
}
