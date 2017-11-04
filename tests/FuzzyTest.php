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
require_once __DIR__ . '/../vendor/autoload.php';
echo '<pre>';
//$postfix = new \SimpleFw\Components\Algorithm\Postfix('(2* (2+3)/OE)-1.5 + (20-CF)^2', ['OE' => 2, 'CF' => 15]);
//var_dump($postfix->evaluate());
//$postfix->setExpression('5.7 ? 1.3');
//var_dump($postfix->evaluate());
//var_dump(md5('admin'));
//$criteria = new \SimpleApp\Spk\Libraries\Dss\Criteria('c01', 'age');
//$value = 4;
//$data = 5;
//$spec1 = new \SimpleApp\Spk\Libraries\Dss\Rules\Spec(5, 'gt', 'criteria');
//$spec2 = new \SimpleApp\Spk\Libraries\Dss\Rules\Spec(10, 'lt', 'criteria');
//$spec = $spec1->plus($spec2);
//$rule = new \SimpleApp\Spk\Libraries\Dss\Rules\Rule($spec, 'medium');
//$fuzzy = new \SimpleApp\Spk\Libraries\Dss\Fuzzy();
//$fuzzy->addRule($rule);
//$spec1 = new \SimpleApp\Spk\Libraries\Dss\Rules\Spec([2, 4], 'in', 'criteria');
//$spec2 = new \SimpleApp\Spk\Libraries\Dss\Rules\Spec(6, 'eq', 'criteria');
//$spec = $spec1->either($spec2);
//$rule = new \SimpleApp\Spk\Libraries\Dss\Rules\Rule($spec, 'even size');
//$fuzzy->addRule($rule);
//$spec = $spec->plus(new \SimpleApp\Spk\Libraries\Dss\Rules\Spec(5, 'eq', 'data'));
//$rule = new \SimpleApp\Spk\Libraries\Dss\Rules\Rule($spec, 'even size + 5');
//$fuzzy->addRule($rule);
//$fuzzy->addParam('criteria', $criteria->getValue());
//$fuzzy->addParam('data', $data);
// OR -> $fuzzy->setParams(['criteria'=> $criteria->getValue(), 'data'=> $data]);
//var_dump($fuzzy->getMatchValue());
//var_dump($fuzzy->getMatchValue(true));
//$criteria->setFuzzy($fuzzy);
//
//# Create logical parser
//# ((c+2 > 5 and c <10) or (d in [7,5] or e='test')) and (e <> data)
//$arrRule = [
//    [
//        'value' => 'medium',
//        'spec'  => [
//            [
//                'logical'    => null,
//                'value'      => 5,
//                'notation'   => 'gt',
//                'paramName'  => 'criteria',
//                'paramValue' => null
//            ],
//            [
//                'logical'    => 'plus',
//                'value'      => 10,
//                'notation'   => 'lt',
//                'paramName'  => 'criteria',
//                'paramValue' => null
//            ]
//        ]
//    ],
//    [
//        'value'    => 'even size',
//        'spec' => [
//            [
//                'logical'    => null,
//                'value'      => [2, 4],
//                'notation'   => 'in',
//                'paramName'  => 'criteria',
//                'paramValue' => null
//            ],
//            [
//                'logical'    => 'either',
//                'value'      => 6,
//                'notation'   => 'eq',
//                'paramName'  => 'criteria',
//                'paramValue' => null
//            ]
//        ]
//    ],
//    [
//        'value'    => 'even size + 5',
//        'spec' => [
//            [
//                'logical'    => null,
//                'value'      => [2, 4],
//                'notation'   => 'in',
//                'paramName'  => 'criteria',
//                'paramValue' => null
//            ],
//            [
//                'logical'    => 'either',
//                'value'      => 6,
//                'notation'   => 'eq',
//                'paramName'  => 'criteria',
//                'paramValue' => null
//            ],
//            [
//                'logical'    => 'plus',
//                'value'      => 5,
//                'notation'   => 'eq',
//                'paramName'  => 'data',
//                'paramValue' => null
//            ]
//        ]
//    ]
//];
//$params = ['criteria'=> $value, 'data'=> $data];
//$criteria->buildRules($arrRule);
//$index = $criteria->getIndex($params);
//var_dump($index);
$expression = '((c+2 > 5 and c <10) or (d in [7,5] or e=\'test\')) and (e <> data)';
$logical = new \SimpleApp\Spk\Libraries\Dss\Rules\LogicalParser($expression);
$logical->evaluate();
