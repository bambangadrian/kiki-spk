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

namespace SimpleFw\Core\Helpers;

/**
 * Class General.
 *
 * @package    SimpleFw
 * @subpackage Core\Helpers
 * @author     Bambang Adrian S <bambang.adrian@gmail.com>
 */
class General extends \SimpleFw\Core\Design\AbstractSingleton
{

    /**
     * Applying path fix for given path string.
     *
     * @param string $path Path string parameter.
     * @param string $ds   Directory separator parameter.
     *
     * @return string
     */
    public static function applyPathFix($path, $ds = DS)
    {
        return trim((string)preg_replace('/(\/|\\\)+/', $ds, $path), $ds);
    }

    /**
     * Get simple value of variable.
     *
     * @param mixed $variable          Variable parameter.
     * @param mixed $default           Default value parameter.
     * @param mixed $mappedValue       Mapped variable value parameter.
     * @param array $defaultConditions Default empty condition rule data collection parameter.
     *
     * @return mixed
     */
    public static function getValue(
        $variable,
        $default = null,
        $mappedValue = null,
        array $defaultConditions = [null, '', [], false]
    ) {
        $checkedVariable = $variable;
        if (is_string($variable) === true) {
            $checkedVariable = trim($variable);
        }
        if (in_array($checkedVariable, $defaultConditions, true) === true) {
            $variable = $default;
        } else {
            if ($mappedValue !== null) {
                $variable = $mappedValue;
            }
        }
        return $variable;
    }

    /**
     * Get result of mapped value.
     *
     * @param boolean $condition    The condition parameter that will be checked.
     * @param mixed   $mappedValue  Mapped value parameter.
     * @param mixed   $defaultValue Default value parameter.
     *
     * @return mixed
     */
    public static function getMappedValue($condition, $mappedValue, $defaultValue = null)
    {
        if ($condition === true) {
            return $mappedValue;
        }
        return $defaultValue;
    }

    /**
     * Get array item value property.
     *
     * @param array               $arrayData         Array data parameter.
     * @param array|number|string $fieldName         Field name parameter.
     * @param mixed               $defaultValue      Default value parameter.
     * @param mixed               $mappedValue       Mapped value if searched index is exists.
     * @param array               $defaultConditions Default empty condition rule data collection parameter.
     *
     * @return mixed
     */
    public static function getArrayItemValue(
        array $arrayData,
        $fieldName,
        $defaultValue = null,
        $mappedValue = null,
        array $defaultConditions = [null, '', [], false]
    ) {
        $result = null;
        $fieldKeyVariables = (array)$fieldName;
        if (is_string($fieldName) === true) {
            parse_str($fieldName, $fieldKeyVariables);
        }
        if (count($fieldKeyVariables) === 1) {
            foreach ($fieldKeyVariables as $index => $key) {
                if (array_key_exists($index, $arrayData) === false) {
                    return null;
                }
                if (is_array($key) === true) {
                    return self::getArrayItemValue(
                        $arrayData[$index],
                        $key,
                        $defaultValue,
                        $mappedValue,
                        $defaultConditions
                    );
                }
                $result = $arrayData[$index];
            }
        }
        return self::getValue($result, $defaultValue, $mappedValue, $defaultConditions);
    }

    /**
     * Get absolute real base path system.
     *
     * @param string  $path         Path string parameter.
     * @param boolean $validatePath Path validation flag option parameter.
     * @param string  $defaultPath  Default path if the given path not exists.
     *
     * @throws \RuntimeException If invalid path given.
     * @return string
     */
    public static function getBasePath($path = '', $validatePath = true, $defaultPath = '')
    {
        $basePath = self::getAbsolutePath($path);
        if (realpath($basePath) === false) {
            if ($validatePath === true) {
                throw new \RuntimeException('Invalid path given: ' . $path);
            }
            $basePath = self::getMappedValue(trim($defaultPath) !== '', $defaultPath, $basePath);
        }
        return $basePath;
    }

    /**
     * Determine the absolute project path.
     *
     * @param string $path Path string parameter.
     *
     * @return string
     */
    public static function getAbsolutePath($path = '')
    {
        return realpath(dirname(dirname(dirname(dirname(__DIR__))))) .
            (string)self::getValue($path, '', DS . self::applyPathFix($path));
    }

    /**
     * Get filtered array using given keys data.
     *
     * @param array   $sourceArray          Array source data parameter.
     * @param array   $keysFilter           Filter keys array data parameter.
     * @param boolean $removeIfKeyNotExists Remove key if not exists flag option parameter.
     * @param mixed   $defaultValue         Default value parameter.
     *
     * @return array
     */
    public static function getFilteredArrayWithKeys(
        array $sourceArray,
        array $keysFilter = [],
        $removeIfKeyNotExists = false,
        $defaultValue = null
    ) {
        $filteredData = [];
        if (count($keysFilter) === 0) {
            $filteredData = $sourceArray;
        } else {
            foreach ($keysFilter as $keyName) {
                $value = self::getArrayItemValue($sourceArray, $keyName, $defaultValue);
                if ($removeIfKeyNotExists === true and $value === $defaultValue) {
                    continue;
                }
                $filteredData[$keyName] = $value;
            }
        }
        return $filteredData;
    }

    /**
     * Implode an array content into a string (Just work for 1 dimension only).
     *
     * @param array  $arrayData    Array data parameter that will be imploded.
     * @param string $concatString Concat string parameter.
     * @param string $prefix       Prefix string parameter.
     * @param string $suffix       Suffix string parameter.
     *
     * @return string
     */
    public static function implodeArray(array $arrayData, $concatString = ',', $prefix = '', $suffix = '')
    {
        $result = '';
        if (count($arrayData) > 0) {
            if ($prefix !== '' or $suffix !== '') {
                $arrayData = array_map(
                    function ($item) use ($prefix, $suffix, $concatString) {
                        if (is_array($item) === true) {
                            return self::implodeArray($item, $concatString, $prefix, $suffix);
                        }
                        if (self::getValue($prefix) !== null) {
                            $item = $prefix . $item;
                        }
                        if (self::getValue($suffix) !== null) {
                            $item .= $suffix;
                        }
                        return $item;
                    },
                    $arrayData
                );
            }
            $result = implode(
                $concatString,
                $arrayData
            );
        }
        return $result;
    }
}
