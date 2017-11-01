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

namespace SimpleFw\Core\Helpers;

/**
 * Class Server.
 *
 * @package    SimpleFw
 * @subpackage Core\Helpers
 * @author     Bambang Adrian S <bambang.adrian@gmail.com>
 */
class Server extends \SimpleFw\Core\Design\AbstractSingleton
{

    /**
     * Get $_SERVER item value.
     *
     * @param string      $fieldName    SERVER field name parameter.
     * @param string|null $defaultValue Default value parameter.
     * @param string|null $mappedValue  Mapped value if the field name exists.
     *
     * @return string
     */
    public static function getServerValue($fieldName, $defaultValue = null, $mappedValue = null)
    {
        return General::getArrayItemValue($_SERVER, $fieldName, $defaultValue, $mappedValue);
    }

    /**
     * Return all the server values.
     *
     * @param array $fields Field name collection data parameter.
     *
     * @return array
     */
    public static function getServerValues(array $fields = [])
    {
        return General::getFilteredArrayWithKeys($_SERVER, $fields);
    }

    /**
     * Get server request scheme.
     *
     * @return string
     */
    public static function getScheme()
    {
        return self::getServerValue('REQUEST_SCHEME');
    }

    /**
     * Check the used port type and return the matched uri protocol.
     *
     * @return string
     */
    public static function getProtocol()
    {
        $protocol = self::getScheme();
        # Define all the port mapper data.
        $portUriProtocolMapper = [
            '443' => 'https',
            '21'  => 'ftp',
            '80'  => 'http'
        ];
        $currentServerPort = self::getPort();
        if (array_key_exists($currentServerPort, $portUriProtocolMapper) === true) {
            $protocol = $portUriProtocolMapper[$currentServerPort];
        }
        return $protocol;
    }

    /**
     * Get the port number of the loading page.
     *
     * @return string
     */
    public static function getPort()
    {
        return self::getServerValue('SERVER_PORT');
    }

    /**
     * Get the current http host name.
     *
     * @return string
     */
    public static function getHttpHostName()
    {
        return preg_replace(
            '/(.{2,4}\:\/\/)?(.+?)(:\d+)?(\/\S*)?/i',
            '$2',
            mb_strtolower(self::getServerValue('HTTP_HOST'))
        );
    }

    /**
     * Get the server address.
     *
     * @return string
     */
    public static function getAddress()
    {
        $serverAddress = self::getServerValue('SERVER_ADDR');
        return (string)General::getMappedValue($serverAddress === '::1', '127.0.0.1', $serverAddress);
    }

    /**
     * Get the computer name.
     *
     * @return string
     */
    public static function getName()
    {
        return gethostname();
    }

    /**
     * Get the remote computer name.
     *
     * @return string
     */
    public static function getRemoteName()
    {
        return gethostbyaddr(self::getServerValue('REMOTE_ADDR'));
    }

    /**
     * Check if the loaded page using standard http port.
     *
     * @return boolean
     */
    public static function isUsingStandardHttpPort()
    {
        return self::getPort() === '80';
    }

    /**
     * Check if the loaded page using secure protocol.
     *
     * @return boolean
     */
    public static function isUsingSecureProtocol()
    {
        return array_key_exists('HTTPS', self::getServerValues()) === true;
    }

    /**
     * Get server public host name.
     *
     * @param array $localHostNames Local host names data collection parameter.
     *
     * @return string
     */
    public static function getPublicHostName(array $localHostNames = ['localhost'])
    {
        $publicHost = self::getHttpHostName();
        if (in_array($publicHost, $localHostNames, true) === true) {
            $publicHost = self::getAddress();
        }
        return $publicHost;
    }

    /**
     * Get the file name from url.
     *
     * @return string
     */
    public static function getScriptName()
    {
        return mb_strtolower(self::getServerValue('SCRIPT_NAME'));
    }

    /**
     * Returns the path of the compiled document directory path.
     *
     * @return string
     */
    public static function getDocumentDirPath()
    {
        return dirname(self::getServerValue('SCRIPT_FILENAME'));
    }

    /**
     * Get full of compiled document path (included the document file name).
     *
     * @return string
     */
    public static function getDocumentFullPath()
    {
        return self::getServerValue('SCRIPT_FILENAME');
    }

    /**
     * Get the real ip address of a remote user.
     *
     * @return string
     */
    public static function getRealRemoteIpAddress()
    {
        $serverRemoteAddress = self::getServerValue('REMOTE_ADDR');
        return General::getValue(
            self::getServerValue('HTTP_CLIENT_IP'),
            General::getValue(
                self::getServerValue('HTTP_X_FORWARDED_FOR'),
                General::getMappedValue($serverRemoteAddress === '::1', '127.0.0.1', $serverRemoteAddress)
            )
        );
    }
}
