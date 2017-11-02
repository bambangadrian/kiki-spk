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
namespace SimpleApp\Spk;

/**
 * Class Spk
 *
 * @package SimpleApp
 * @subpackage Apps\Spk
 */
class Spk extends \SimpleFw\Core\Application {

    /**
     * Spk constructor.
     */
    public function __construct()
    {
        $this->setName('DSS App');
        $this->setDirPath(\SimpleFw\Core\Helpers\General::getBasePath('src/Apps/Spk'));
    }
}