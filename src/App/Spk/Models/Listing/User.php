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

namespace SimpleApp\Spk\Models\Listing;

class User extends \SimpleApp\Spk\Models\AbstractListing
{

    public function loadView()
    {
        parent::loadView();
        //$this->View->
    }

    public function __construct()
    {
        $this->setEntityName('user');
    }

    public function getListingData()
    {
        return [];
    }
}
