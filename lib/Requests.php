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
defined('STANDARD_FUNCTION_LOADED') === true or die('STANDARD FUNCTION IS NOT LOADED YET');
/**
 * A Flag sign if standard requests library has been loaded or not.
 *
 * @constant boolean STANDARD_REQUESTS_LIBRARY_LOADED
 */
define('STANDARD_REQUESTS_LIBRARY_LOADED', true);
if (function_exists('getRequestMethod') === false) {
    /**
     * Get request method that was used to access the loaded page.
     *
     * @return string
     */
    function getRequestMethod()
    {
        return getServerValue('REQUEST_METHOD');
    }
}
if (function_exists('isPostRequest') === false) {
    /**
     * Check if request using post method.
     *
     * @return boolean
     */
    function isPostRequest()
    {
        return strtolower(getRequestMethod()) === 'post';
    }
}
if (function_exists('isGetRequest') === false) {
    /**
     * Check if request using get method.
     *
     * @return boolean
     */
    function isGetRequest()
    {
        return strtolower(getRequestMethod()) === 'get';
    }
}
if (function_exists('isDeleteRequest') === false) {
    /**
     * Check if request using delete method.
     *
     * @return boolean
     */
    function isDeleteRequest()
    {
        return strtolower(getRequestMethod()) === 'delete';
    }
}
if (function_exists('getRequestValue') === false) {
    /**
     * Get $_REQUEST item value property.
     *
     * @param string            $fieldName    REQUEST field name parameter.
     * @param string|array|null $defaultValue Default value parameter.
     * @param string|array|null $mappedValue  Mapped value if the field name exists.
     * @param boolean           $strict       Strict checking to fetch the array item flag option parameter.
     *
     * @throws \RuntimeException If given field key string is not exists.
     * @return mixed
     */
    function getRequestValue($fieldName, $defaultValue = null, $mappedValue = null, $strict = false)
    {
        return getArrayItemValue($_REQUEST, $fieldName, $defaultValue, $mappedValue, $strict);
    }
}
if (function_exists('getRequestValues') === false) {
    /**
     * Get all $_REQUEST values property with given fields filter.
     *
     * @param array $fields Field name collection data parameter.
     *
     * @return array
     */
    function getRequestValues(array $fields = [])
    {
        return getFilteredArrayWithKeys($_REQUEST, $fields);
    }
}
if (function_exists('isRequestExists') === false) {
    /**
     * Check if request file name is exists or not.
     *
     * @param string $fieldName REQUEST field name parameter.
     *
     * @return boolean
     */
    function isRequestExists($fieldName)
    {
        return array_key_exists($fieldName, $_REQUEST);
    }
}
if (function_exists('getGetValue') === false) {
    /**
     * Get $_GET item value property.
     *
     * @param string            $fieldName    GET Field name parameter.
     * @param string|array|null $defaultValue Default value parameter.
     * @param string|array|null $mappedValue  Mapped value if the field name exists.
     * @param boolean           $strict       Strict checking to fetch the array item flag option parameter.
     *
     * @throws \RuntimeException If given field key string is not exists.
     * @return mixed
     */
    function getGetValue($fieldName, $defaultValue = null, $mappedValue = null, $strict = false)
    {
        return getArrayItemValue($_GET, $fieldName, $defaultValue, $mappedValue, $strict);
    }
}
if (function_exists('getGetValues') === false) {
    /**
     * Get all $_GET values property with given fields filter.
     *
     * @param array $fields Field name collection data parameter.
     *
     * @return array
     */
    function getGetValues(array $fields = [])
    {
        return getFilteredArrayWithKeys($_GET, $fields, true);
    }
}
if (function_exists('getPostValue') === false) {
    /**
     * Get post item data value property.
     *
     * @param string            $fieldName    POST field name parameter.
     * @param string|array      $defaultValue Default value parameter.
     * @param string|array|null $mappedValue  Mapped value if the field name exists.
     * @param boolean           $strict       Strict checking to fetch the array item flag option parameter.
     *
     * @throws \RuntimeException If given field key string is not exists.
     * @return mixed
     */
    function getPostValue($fieldName, $defaultValue = '', $mappedValue = null, $strict = false)
    {
        return getArrayItemValue(getPostValues(), $fieldName, $defaultValue, $mappedValue, $strict, [null]);
    }
}
if (function_exists('getPostValues') === false) {
    /**
     * Get all post data values property with given fields filter.
     *
     * @param array $fields Field name collection data parameter.
     *
     * @return array
     */
    function getPostValues(array $fields = [])
    {
        $postValues = array_merge((array)getSessionValue('postData'), $_POST);
        return getFilteredArrayWithKeys($postValues, $fields, true);
    }
}
if (function_exists('isPostExists') === false) {
    /**
     * Check if post field name is exists or not.
     *
     * @param string $fieldName POST field name parameter.
     *
     * @return boolean
     */
    function isPostExists($fieldName)
    {
        return array_key_exists($fieldName, getPostValues());
    }
}
if (function_exists('isPostFileExists') === false) {
    /**
     * Check if post file field name is exists or not.
     *
     * @param string $fieldName FILE field name parameter.
     *
     * @return boolean
     */
    function isPostFileExists($fieldName)
    {
        return array_key_exists($fieldName, getPostFileValues());
    }
}
if (function_exists('setPostRequestValue') === false) {
    /**
     * Set $_POST global data variable item.
     *
     * @param string $fieldName  Post global field name parameter.
     * @param string $fieldValue Post field value parameter.
     *
     * @return void
     */
    function setPostRequestValue($fieldName, $fieldValue)
    {
        $_POST[$fieldName] = $fieldValue;
    }
}
if (function_exists('setPostRequestValues') === false) {
    /**
     * Set $_POST global data using array data source.
     *
     * @param array $postData Post array data source parameter.
     *
     * @return void
     */
    function setPostRequestValues(array $postData)
    {
        foreach ($postData as $postKey => $postValue) {
            $_POST[$postKey] = $postValue;
        }
    }
}
if (function_exists('setPostValue') === false) {
    /**
     * Set post data item value property.
     *
     * @param string $fieldName  Post field name parameter.
     * @param mixed  $fieldValue Post field value parameter.
     *
     * @return void
     */
    function setPostValue($fieldName, $fieldValue)
    {
        # Setup the previous post data.
        $prevPostData = getPostValue($fieldName, null);
        if ($prevPostData !== null) {
            setSessionValue('prevPostData[' . $fieldName . ']', $prevPostData);
        }
        setSessionValue('postData[' . $fieldName . ']', $fieldValue);
    }
}
if (function_exists('getPreviousPostData') === false) {
    /**
     * Get previous post data.
     *
     * @return array
     */
    function getPreviousPostData()
    {
        return (array)getSessionValue('prevPostData');
    }
}
if (function_exists('getPreviousPostValue') === false) {
    /**
     * Get previous post value for given field name.
     *
     * @param string $fieldName Post field name parameter.
     *
     * @return string|array|null
     */
    function getPreviousPostValue($fieldName)
    {
        $result = null;
        $prevPostData = getPreviousPostData();
        if (array_key_exists($fieldName, $prevPostData) === true) {
            $result = $prevPostData[$fieldName];
        }
        return $result;
    }
}
if (function_exists('setPostValues') === false) {
    /**
     * Set post data using array data source.
     *
     * @param array $postData Post array data source parameter.
     *
     * @return void
     */
    function setPostValues(array $postData)
    {
        foreach ($postData as $postKey => $postValue) {
            setPostValue($postKey, $postValue);
        }
    }
}
if (function_exists('getPostFileValue') === false) {
    /**
     * Get $_FILE item value property.
     *
     * @param string            $fieldName    FILE field name parameter.
     * @param string|array|null $defaultValue Default value parameter.
     * @param string|array|null $mappedValue  Mapped value if the field name exists.
     * @param boolean           $strict       Strict checking to fetch the array item flag option parameter.
     *
     * @throws \RuntimeException If given field key string is not exists.
     * @return mixed
     */
    function getPostFileValue($fieldName, $defaultValue = null, $mappedValue = null, $strict = false)
    {
        return getArrayItemValue($_FILES, $fieldName, $defaultValue, $mappedValue, $strict);
    }
}
if (function_exists('getPostFileValues') === false) {
    /**
     * Get all $_FILES values property with given fields filter.
     *
     * @param array $fields Field name collection data parameter.
     *
     * @return array
     */
    function getPostFileValues(array $fields = [])
    {
        return getFilteredArrayWithKeys($_FILES, $fields);
    }
}
if (function_exists('isAjaxRequest') === false) {
    /**
     * Check if request is an AJAX call.
     *
     * @return boolean
     */
    function isAjaxRequest()
    {
        return array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER) === true and
            strtolower(getValue($_SERVER['HTTP_X_REQUESTED_WITH'])) === 'xmlhttprequest';
    }
}
if (function_exists('getNormalizedPostFilesArray') === false) {
    /**
     * Apply post files data collection into normalized form.
     *
     * @param array $collections Array data collection that want to be normalized.
     *
     * @return array
     */
    function getNormalizedPostFilesArray(array $collections)
    {
        $arrData = [];
        # Create a closure function to apply the normalization form.
        $applyFix = function (&$arrData, $propertyValues, $propertyName) use (&$applyFix) {
            foreach ((array)$propertyValues as $propertyIndex => $propertyValue) {
                if (is_array($propertyValue) === true) {
                    $applyFix($arrData[$propertyIndex], $propertyValue, $propertyName);
                } else {
                    $arrFieldNames[] = [$propertyIndex];
                    $arrData[$propertyIndex][$propertyName] = $propertyValue;
                }
            }
        };
        foreach ($collections as $fieldName => $fieldProperty) {
            foreach ((array)$fieldProperty as $propertyName => $propertyValue) {
                if (is_array($propertyValue) === true) {
                    $applyFix($arrData[$fieldName], $propertyValue, $propertyName);
                } else {
                    $arrData[$fieldName][$propertyName] = $propertyValue;
                }
            }
        }
        return $arrData;
    }
}
if (function_exists('runRequestServices') === false) {
    /**
     * Run and process request services.
     *
     * @return void
     */
    function runRequestServices()
    {
        # Clean up the post data.
        unsetSession('postData');
        # Normalize the post file/upload ($_FILES) data array.
        if (isPostRequest() === true and count($_FILES) > 0) {
            $_FILES = getNormalizedPostFilesArray($_FILES);
        }
        # Manage the request referer bag.
        $currentUrl = getCurrentUrl();
        $refererBag = getRequestRefererBag();
        if (getRequestReferer() === '') {
            setRequestReferer($currentUrl);
        } else {
            setRequestReferer($refererBag[0]);
        }
        addRequestReferer($currentUrl);
    }
}
if (function_exists('setRequestReferer') === false) {
    /**
     * Set request url referer.
     *
     * @param string $referer Url referer data parameter.
     *
     * @return void
     */
    function setRequestReferer($referer)
    {
        setSessionValue('referer', $referer);
    }
}
if (function_exists('getRequestReferer') === false) {
    /**
     * Get request url referer.
     *
     * @return string
     */
    function getRequestReferer()
    {
        return (string)getSessionValue('referer');
    }
}
if (function_exists('getRequestRefererBag') === false) {
    /**
     * Get request referer bag data collection.
     *
     * @return array
     */
    function getRequestRefererBag()
    {
        return (array)getSessionValue('refererBag', []);
    }
}
if (function_exists('addRequestReferer') === false) {
    /**
     * Add request url referer into referer bag.
     *
     * @param string $referer Url referer data parameter.
     *
     * @return void
     */
    function addRequestReferer($referer)
    {
        $referer = trim($referer);
        $maxBagContainer = (integer)getSysConfigItem('httprequest.MaxRefererBag');
        $currentBag = getRequestRefererBag();
        if (count($currentBag) === $maxBagContainer) {
            unset($currentBag[9]);
        }
        $currentReferer = current($currentBag);
        if ($currentReferer !== $referer) {
            array_unshift($currentBag, $referer);
            setSessionValue('refererBag', $currentBag);
        }
    }
}
if (function_exists('validatePostRequest') === false) {
    /**
     * Validate values from $_POST global.
     *
     * @return boolean
     */
    function validatePostRequest()
    {
        return (getValue($_POST) !== null);
    }
}
if (function_exists('validateGetRequest') === false) {
    /**
     * Validate values from $_GET global.
     *
     * @return boolean
     */
    function validateGetRequest()
    {
        return (getValue($_GET) !== null);
    }
}
if (function_exists('createAjaxRequest') === false) {
    /**
     * Create an ajax request.
     *
     * @param string $requestUrl Request url path parameter.
     * @param array  $postData   Post data array parameter.
     *
     * @return string
     */
    function createAjaxRequest($requestUrl, array $postData = [])
    {
        return '';
    }
}
