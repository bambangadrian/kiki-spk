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

namespace SimpleApp\Apps\Spk\Models;

abstract class AbstractListing extends \SimpleFw\Components\Mvc\Model
{

    /**
     * @var \SimpleApp\Apps\Spk\Views\Listing $View
     */
    protected $View;

    public function loadView()
    {
        $this->View = new \SimpleApp\Apps\Spk\Views\Listing();
    }

    abstract public function getListingData();
}