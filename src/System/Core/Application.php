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
class Application
{

    /**
     * Application name property.
     *
     * @var string $Name
     */
    private $Name;

    /**
     * Application version property.
     *
     * @var string $Version
     */
    private $Version;

    /**
     * Application installed dir path property.
     *
     * @var string $DirPath
     */
    private $DirPath;

    /**
     * Application environment data property.
     *
     * @var array $Env
     */
    private $Env;

    /**
     * Application configuration data property.
     *
     * @var array $Configs
     */
    private $Configs;

    /**
     * Application session id property.
     *
     * @var string $SessionId
     */
    private $SessionId;

    /**
     * Application constructor.
     */
    private function __construct()
    {
    }

    /**
     * Application init.
     *
     * @return void
     */
    public function init()
    {
        $this->loadConfig();
    }

    /**
     * Run the application.
     *
     * @return void
     */
    public function run()
    {
        self::init();
    }

    /**
     * Load the application configurationo data.
     *
     * @return void
     */
    public function loadConfig()
    {
    }

    /**
     * Get application name property.
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Get application version property.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->Version;
    }

    /**
     * Get application environment data property.
     *
     * @return array
     */
    public function getEnv()
    {
        return $this->Env;
    }

    /**
     * Get application configuration data property.
     *
     * @return array
     */
    public function getConfigs()
    {
        return $this->Configs;
    }

    /**
     * Get config item data.
     *
     * @param string $itemKey Config item key parameter.
     *
     * @return string
     */
    public function getConfigItem($itemKey)
    {
    }

    /**
     * Get application dir path property.
     *
     * @return string
     */
    public function getDirPath()
    {
        return $this->DirPath;
    }

    /**
     * Set application name property.
     *
     * @param string $name Application name paramater.
     *
     * @return void
     */
    public function setName($name)
    {
        $this->Name = $name;
    }

    /**
     * Set application versin property.
     *
     * @param string $version Application version parameter.
     *
     * @return void
     */
    public function setVersion($version)
    {
        $this->Version = $version;
    }

    /**
     * Set application directory path property.
     *
     * @param $string $dirPath Application directory path parameter.
     *
     * @return void
     */
    public function setDirPath($dirPath)
    {
        $this->DirPath = $dirPath;
    }

    /**
     * Check if application is valid.
     *
     * @return boolean
     */
    public function isValidApp()
    {
    }

    /**
     * Get application session id property.
     *
     * @return string
     */
    public function getSessionId()
    {
        return $this->SessionId;
    }
}