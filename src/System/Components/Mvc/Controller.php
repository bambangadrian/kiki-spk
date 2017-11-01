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
namespace SimpleFw\Components\Mvc;

class Controller{

    /**
     * @var string $ModelName
     */
    protected $ModelName;



    public function __construct()
    {
        $this->loadModel();
    }

    public function setModelName($modelName){
        $this->ModelName = $modelName;
    }

    public function getModelName(){
        return $this->ModelName;
    }

    protected function loadModel(){

    }

    public function load(){
        $this->loadModel();
    }

    public function __destruct()
    {
        # TODO: Implement __destruct() method.
    }
}