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

class Saw
{

    /**
     * @var Criteria[] $Criterias
     */
    private $Criterias;

    /**
     * @var Participant[] $Participants
     */
    private $Participants;

    /**
     * @var array $Data
     */
    private $Data;

    /**
     * @var array $Result
     */
    private $Result;

    private $FieldMap;

    public function __construct()
    {
        $this->Criterias = [];
        $this->Participants = [];
    }

    public function setCriterias(array $criterias)
    {
        $this->addCriteria($criterias);
    }

    public function addCriteria(Criteria $criteria)
    {
        $this->Criterias[$criteria->getCode()] = $criteria;
    }

    public function setParticipants(array $participants)
    {
        foreach ($participants as $participant) {
            $this->addParticipant($participant);
        }
    }

    public function addParticipant(Participant $participant)
    {
        $criterias = $this->getCriterias();
        if ($criterias === []) {
            throw new \LogicException('You must set the criteria first');
        }
        $this->mapFields($participant);
        $this->validateParticipant($participant);
        $this->Participants[$participant->getId()] = $participant;
    }

    private function mapFields(Participant $participant)
    {
        $fieldMap = $this->getFieldMap();
        if (count($fieldMap) > 0) {
            foreach ($fieldMap as $to => $from) {
                $value = $participant->getFieldValue($from);
                $participant->addField($to, $value);
                $participant->removeField($from);
            }
        }
    }

    public function setFieldMap(array $fieldMap)
    {
        foreach ($fieldMap as $criteriaField => $participantField) {
            $this->addFieldMap($criteriaField, $participantField);
        }
    }

    public function getFieldMap()
    {
        return $this->FieldMap;
    }

    public function addFieldMap($criteriaField, $participantField)
    {
        $this->FieldMap[$criteriaField] = $participantField;
    }

    private function validateParticipant(Participant $participant)
    {
        $criterias = $this->getCriterias();
        $participantFields = $participant->getFields();
        foreach ($criterias as $criteria) {
            if (array_key_exists($criteria->getFieldName(), $participantFields) === false) {
                throw new \InvalidArgumentException($participant->getName() . ' has invalid fields');
            }
        }
    }

    public function getData()
    {
        return $this->Data;
    }

    public function getCriterias()
    {
        return $this->Criterias;
    }

    public function getParticipants(){
        return $this->Participants;
    }

    public function calculate()
    {
        $data = [];
        $result = [];
        $participants = $this->getParticipants();
        foreach($participants as $participant){
            $fields = $participant->getFields();
            foreach($fields as $field => $value){
                $data[$participant->getId()][$field] = $value;
            }
        }


    }

    public function getResults()
    {
        return $this->Result;
    }
}
