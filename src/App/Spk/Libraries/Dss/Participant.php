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

namespace SimpleApp\Spk\Libraries\Dss;

class Participant
{

    private $Name;

    private $Id;

    private $Fields;

    public function __construct($id = null, array $fields = [])
    {
        if ($id !== null) {
            $this->setId($id);
        }
        if (count($fields) !== 0) {
            $this->setFields($fields);
        }
    }

    public function setFields(array $fields)
    {
        foreach ($fields as $name => $value) {
            $this->addField($name, $value);
        }
    }

    public function addField($fieldName, $fieldValue)
    {
        $this->Fields[$fieldName] = $fieldValue;
    }

    public function removeField($fieldName)
    {
        $fields = $this->getFields();
        if (array_key_exists($fieldName, $fields) === true) {
            unset($this->Fields[$fieldName]);
        }
    }

    public function setId($id)
    {
        $this->Id = $id;
    }

    public function getId()
    {
        return $this->Id;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setName($name)
    {
        $this->Name = $name;
    }

    public function getFields()
    {
        return $this->Fields;
    }

    public function getFieldValue($name)
    {
        $fields = $this->getFields();
        if (array_key_exists($name, $fields) === false) {
            return null;
        }
        return $fields[$name];
    }
}
