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

namespace SimpleApp\Spk\Libraries\Dss\Rules;

class LogicalParser
{

    public static $LogicalPrecendenceSymbols = ['open' => '(', 'close' => ')'];

    public static $LogicalConcatenator = ['and', 'or', 'xor'];

    private $Expression;

    private $Error;

    /**
     * @var array $ParsedExpression
     */
    private $ParsedExpression;

    /**
     * @var array $Params
     */
    private $Params;

    /**
     * @var Spec $Spec
     */
    private $Spec;

    private $Result;

    private $HasBeenParsed = false;

    private $HasBeenEvaluated = false;

    public function __construct($expression = '', array $params = [])
    {
        $this->setExpression($expression);
        $this->setParams($params);
    }

    public function getExpression()
    {
        return $this->Expression;
    }

    public function setExpression($expression)
    {
        $this->Expression = $expression;
        if ($this->Expression !== $expression or
            $this->Expression === null or
            $this->Expression === '' or
            $expression === ''
        ) {
            $this->HasBeenParsed = false;
            $this->HasBeenEvaluated = false;
        }
    }

    public function getSpec()
    {

    }

    protected function getParsedExpression()
    {
        if ($this->HasBeenParsed === false) {
            $this->parseExpression();
        }
        return $this->ParsedExpression;
    }

    protected function parseExpression()
    {
        $expression = $this->getExpression();
    }

    public function isValidExpression()
    {
        $isValid = true;
        return $isValid;
    }

    public function setParams($params)
    {
        $this->Params = $params;
    }

    protected function setError($errMessage)
    {
        $this->Error = $errMessage;
    }

    public function getError()
    {
        return $this->Error;
    }

    public function getResult()
    {
        if ($this->HasBeenEvaluated === false) {
            $this->evaluate();
        }
        return $this->Result;
    }

    public function evaluate()
    {
        $this->parseExpression();
        $this->HasBeenEvaluated = true;
    }
}
