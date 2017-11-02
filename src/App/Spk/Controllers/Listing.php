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

namespace SimpleApp\Spk\Controller;

class Listing extends \SimpleFw\Components\Mvc\Controller
{

    /**
     * @var \SimpleApp\Spk\Models\AbstractListing $Model
     */
    protected $Model;

    protected function loadModel()
    {
        $modelNameSpace = '\SimpleApp\Spk\Models\Listing';
        $this->Model = new $modelNameSpace . $this->getModelName();

    }

    public function getListing()
    {
        return $this->Model->getListingData();
    }

    public function load()
    {
        parent::load();
        $data = $this->getListing();

    }
}
