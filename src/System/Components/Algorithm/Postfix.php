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

namespace SimpleFw\Components\Algorithm;

use \SimpleFw\Core\Helpers\General;

class Postfix
{

    public static $MathStackPrecedenceSymbols = ['open' => '(', 'close' => ')'];

    public static $OperatorSymbols = [
        '+' => 2,
        '-' => 2,
        '*' => 3,
        '/' => 3,
        '%' => 3, # Integer modulo symbol. eg: 5 % 2 = 1
        '?' => 3, # Float modulo symbol. eg: 5.7 ? 1.3 = 0.5
        '^' => 4, # Math exponential symbol. eg: 5 ^ 2 = 25
        '|' => 4, # Square symbol. eg: 8 | 2 = 3
        '(' => 1,
        ')' => 1,
        '@' => 5, # Rounding-half-down the floating point with specified precision. eg: 1.55 @ 1 = 1.5
        '$' => 5, # Rounding-half-up the floating point with specified precision. eg: 1.55 @ 1 = 1.6
        '!' => 5, # Natural logarithm symbol. eg: 100 ! 2 = 10
        '~' => 5  # Get random number with max and min value. eg: 10 ~ 100 = 66
    ];

    private $Expression;

    /**
     * @var array $ParsedExpression
     */
    private $ParsedExpression;

    /**
     * @var array $Params
     */
    private $Params;

    /**
     * @var string $Error
     */
    private $Error;

    private $Result;

    private $HasBeenParsed = false;

    private $HasBeenEvaluated = false;

    public function __construct($expression = '', array $params = [])
    {
        $this->setExpression($expression);
        $this->setParams($params);
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

    public function getExpression()
    {
        return $this->Expression;
    }

    public static function isMathPrecedenceSymbol($symbol)
    {
        return in_array($symbol, self::$MathStackPrecedenceSymbols, true);
    }

    public static function isOpenedMathPrecedenceSymbol($symbol)
    {
        return array_search(trim($symbol), self::$MathStackPrecedenceSymbols, true) === 'open';
    }

    public static function isClosedMathPrecedenceSymbbol($symbol)
    {
        return array_search(trim($symbol), self::$MathStackPrecedenceSymbols, true) === 'close';
    }

    public static function getMathOperatorList($onlyArithmeticSymbol = false)
    {
        $result = (array)General::getMappedValue(
            $onlyArithmeticSymbol,
            array_diff_key(self::$OperatorSymbols, array_flip(self::$MathStackPrecedenceSymbols)),
            self::$OperatorSymbols
        );
        return array_keys($result);
    }

    public static function isMathOperator($symbol, $isArithmeticSymbol = false)
    {
        return in_array($symbol, self::getMathOperatorList($isArithmeticSymbol), true);
    }

    public static function getOperatorLevel($symbol)
    {
        if (array_key_exists($symbol, self::$OperatorSymbols) === true) {
            return self::$OperatorSymbols[$symbol];
        }
        return 0;
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
        $expression = trim($expression) . ' ';
        $result = [];
        $index = 0;
        $parsedExpression = (array)str_split($expression);
        $expressionDelimiters = array_merge(self::getMathOperatorList(), [' ']);
        $expressionComponent = '';
        foreach ($parsedExpression as $expressionItem) {
            $reset = false;
            $expressionComponent .= $expressionItem;
            if (in_array($expressionItem, $expressionDelimiters, true) === true) {
                $reset = true;
                $expressionComponent = $expressionItem;
                $index++;
            }
            $result[$index] = $expressionComponent;
            if ($reset === true) {
                $expressionComponent = '';
                $index++;
            }
        }
        $this->ParsedExpression = array_values(array_filter(array_map('trim', $result)));
        $this->HasBeenParsed = true;
    }

    public static function isOperatorLevelHigher($symbol1, $symbol2)
    {
        return self::getOperatorLevel($symbol1) > self::getOperatorLevel($symbol2);
    }

    public static function calculate($operand1, $operand2, $operator)
    {
        if (self::isMathOperator($operator, true) === false) {
            throw new \RuntimeException('Invalid math operator given');
        }
        $result = null;
        try {
            switch ($operator) {
                case '+':
                    $result = $operand1 + $operand2;
                    break;
                case '-':
                    $result = $operand1 - $operand2;
                    break;
                case '*':
                    $result = $operand1 * $operand2;
                    break;
                case '/':
                    $result = $operand1 / $operand2;
                    break;
                case '%':
                    $result = $operand1 % $operand2;
                    break;
                case '?':
                    $result = fmod($operand1, $operand2);
                    break;
                case '^':
                    $result = $operand1 ** $operand2;
                    break;
                case '|':
                    $result = $operand1 ** (1 / $operand2);
                    break;
                case '@':
                    $result = round($operand1, $operand2, PHP_ROUND_HALF_DOWN);
                    break;
                case '$':
                    $result = round($operand1, $operand2, PHP_ROUND_HALF_UP);
                    break;
                case '!':
                    $result = log($operand1, $operand2);
                    break;
                case '~':
                    $result = mt_rand($operand1, $operand2);
                    break;
            }
        } catch (\Exception $ex) {
            throw new \RuntimeException($ex->getMessage());
        }
        return $result;
    }

    public function getError()
    {
        return $this->Error;
    }

    protected function setError($errMessage)
    {
        $this->Error = $errMessage;
    }

    public function isValidExpression()
    {
        $isValid = true;
        $invalidNearValue = '';
        $invalidNearKey = 0;
        $openedSymbolCounter = 0;
        $closedSymbolCounter = 0;
        $expression = $this->getParsedExpression();
        foreach ($expression as $key => $value) {
            $isOpenedSymbol = self::isOpenedMathPrecedenceSymbol($value);
            $isClosedSymbol = self::isClosedMathPrecedenceSymbbol($value);
            if (($isClosedSymbol === true and $key === 0) or
                (
                    array_key_exists($key - 1, $expression) === true and
                    (
                        (is_numeric($value) === true and self::isMathOperator($expression[$key - 1]) === false) or
                        (
                            self::isMathOperator($value, true) === true and
                            self::isMathOperator($expression[$key - 1], true) === true
                        )
                        or
                        (
                            $isOpenedSymbol === true and
                            self::isClosedMathPrecedenceSymbbol($expression[$key - 1]) === true
                        )
                        or
                        (
                            $isClosedSymbol === true and
                            (
                                self::isMathOperator($expression[$key - 1], true) === true or
                                self::isOpenedMathPrecedenceSymbol($expression[$key - 1]) === true
                            )
                        )
                    )
                )
            ) {
                $invalidNearValue = $value;
                $invalidNearKey = $key;
                $isValid = false;
                break;
            }
            if ($isOpenedSymbol === true) {
                $openedSymbolCounter++;
            }
            if ($isClosedSymbol === true) {
                $closedSymbolCounter++;
            }
        }
        if ($openedSymbolCounter !== $closedSymbolCounter) {
            $isValid = false;
            $this->setError('Open-close bracket not matched: ' . implode(' ', $expression));
        }
        if ($isValid === false) {
            $this->setError(
                'Invalid math expression data given: ' .
                implode(' ', $expression) . ' near: ' . $invalidNearValue .
                ' at index position: ' . $invalidNearKey
            );
        }
        return $isValid;
    }

    /**
     * @param $expression
     *
     * @return array
     */
    protected function getPostfix()
    {
        $postfix = [];
        $infix = $this->getParsedExpression();
        if ($this->isValidExpression() === true) {
            $stack = [];
            $postfixIndex = 0;
            $stackIndex = 0;
            $stack[0] = '#';
            foreach ($infix as $infixItem) {
                if (self::isMathOperator($infixItem) === true) {
                    if (self::isClosedMathPrecedenceSymbbol($infixItem) === true) {
                        while (self::isOpenedMathPrecedenceSymbol($stack[$stackIndex]) === false) {
                            $postfix[$postfixIndex++] = $stack[$stackIndex--];
                        }
                        unset($stack[$stackIndex--]);
                        continue;
                    }
                    if (self::isOpenedMathPrecedenceSymbol($infixItem) === true) {
                        $stack[++$stackIndex] = $infixItem;
                        continue;
                    }
                    while (self::isOperatorLevelHigher($infixItem, $stack[$stackIndex]) === false) {
                        $postfix[$postfixIndex++] = $stack[$stackIndex--];
                    }
                    $stack[++$stackIndex] = $infixItem;
                } else {
                    $postfix[$postfixIndex++] = $infixItem;
                }
            }
            while ($stackIndex !== 0) {
                $postfix[$postfixIndex++] = $stack[$stackIndex--];
            }
        }
        return $postfix;
    }

    public function getParams()
    {
        return $this->Params;
    }

    public function addParam($name, $value)
    {
        $this->Params[$name] = $value;
    }

    public function setParams(array $params)
    {
        $this->Params = $params;
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
        # Initialize all required local variables.
        $stack = [];
        $stackIndex = -1;
        $postfix = $this->getPostfix();
        if (count($postfix) === 0) {
            return null;
        }
        $params = $this->getParams();
        foreach ($postfix as $value) {
            if (self::isMathOperator($value) === false) {
                $operand = $value;
                if (is_numeric($value) === false) {
                    if (array_key_exists($value, $params) === true) {
                        $operand = $params[$value];
                    } else {
                        throw new \InvalidArgumentException('Invalid given variable parameter detected');
                    }
                }
                $stack[++$stackIndex] = $operand;
            } else {
                $operand2 = $stack[$stackIndex--];
                $operand1 = $stack[$stackIndex--];
                $stack[++$stackIndex] = self::calculate($operand1, $operand2, $value);
            }
        }
        $this->Result = $stack[$stackIndex];
        $this->HasBeenEvaluated = true;
    }
}
