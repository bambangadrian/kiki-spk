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
 * Class Request.
 *
 * @package    SimpleFw
 * @subpackage Core
 * @author     Bambang Adrian S <bambang.adrian@gmail.com>
 */
class Request
{

    /**
     * Request data property.
     *
     * @var array $Data
     */
    private $Data;

    /**
     * Request method property.
     *
     * @var string $Method
     */
    private $Method;

    /**
     * Request path property.
     *
     * @var string $Path
     */
    private $Path;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->Data = $_REQUEST;
        $this->Method = $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Get request data property.
     *
     * @return array
     */
    public function getData()
    {
        return $this->Data;
    }

    /**
     * Get request method property.
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->Method;
    }

    /**
     * Get request path property.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->Path;
    }
}
