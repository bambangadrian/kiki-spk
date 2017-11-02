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
$criteria = new \SimpleApp\Spk\Libraries\Dss\Criteria();
$criteria->setValue(4);
$data = 5;
$spec1 = new \SimpleApp\Spk\Libraries\Dss\Rules\Spec(5, 'gt', 'criteria');
$spec2 = new \SimpleApp\Spk\Libraries\Dss\Rules\Spec(10, 'lt', 'criteria');
$spec = $spec1->plus($spec2);
$rule = new \SimpleApp\Spk\Libraries\Dss\Rules\Rule($spec, 'medium');
$fuzzy = new \SimpleApp\Spk\Libraries\Dss\Fuzzy();
$fuzzy->addRule($rule);
$spec1 = new \SimpleApp\Spk\Libraries\Dss\Rules\Spec([2, 4], 'in', 'criteria');
$spec2 = new \SimpleApp\Spk\Libraries\Dss\Rules\Spec(6, 'eq', 'criteria');
$spec = $spec1->either($spec2);
$rule = new \SimpleApp\Spk\Libraries\Dss\Rules\Rule($spec, 'even size');
$fuzzy->addRule($rule);
$spec = $spec->plus(new \SimpleApp\Spk\Libraries\Dss\Rules\Spec(5, 'eq', 'data'));
$rule = new \SimpleApp\Spk\Libraries\Dss\Rules\Rule($spec, 'even size + 5');
$fuzzy->addRule($rule);
$fuzzy->addParam('criteria', $criteria->getValue());
$fuzzy->addParam('data', $data);
// OR -> $fuzzy->setParams(['criteria'=> $criteria->getValue(), 'data'=> $data]);
var_dump($fuzzy->getMatchValue());
var_dump($fuzzy->getMatchValue(true));
