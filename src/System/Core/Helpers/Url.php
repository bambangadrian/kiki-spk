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
 * Class Url.
 *
 * @package    SimpleFw
 * @subpackage Core\Helpers
 * @author     Bambang Adrian S <bambang.adrian@gmail.com>
 */
class Url extends \SimpleFw\Core\Design\AbstractSingleton
{

    /**
     * Get url query parameters into associative array.
     *
     * @param string $urlPath Url path string parameter.
     *
     * @return array
     */
    public static function getUrlQueryParams($urlPath = '')
    {
        $parsedUrlQuery = parse_url($urlPath, PHP_URL_QUERY);
        parse_str(html_entity_decode($parsedUrlQuery), $params);
        return $params;
    }

    /**
     * Validate if the given value is a valid url address.
     *
     * @param string $value The value to be checked parameter.
     *
     * @return boolean
     */
    public static function isValidUri($value)
    {
        # This full regex string has been published and tested, but i need to review for the complexity reason.
        $regexStr = '#^(?:https?|ftps?):\/\/(?:(?:[1-9]\d{1,2}\.\d{1,3}\.\d{1,3}\.\d{1,3})|
            \w+(?:[\-\?\#\@\:]\w+)*(?:\.\w+(?:\-\w+)*)?(?:\.[a-zA-Z]{2,4}))
            (?:\:\d{2,5})?(?:\/\S*)*$#iuS';
        $result = preg_match($regexStr, $value);
        return ((boolean)$result and filter_var($value, FILTER_VALIDATE_URL) !== false);
    }

    /**
     * Get current url string.
     *
     * @param boolean $withoutQueryString Without query string option parameter.
     *
     * @throws \RuntimeException If invalid path given.
     * @return string
     */
    public static function getCurrentUrl($withoutQueryString = false)
    {
        $result = self::getBaseUrl(basename($_SERVER['SCRIPT_NAME']), true);
        $urlQuery = General::getMappedValue($_SERVER['QUERY_STRING'] === '', '', $_SERVER['QUERY_STRING']);
        $urlQueryConcat = General::getMappedValue($urlQuery === '', '', '?');
        return General::getMappedValue($withoutQueryString === true, $result, $result . $urlQueryConcat . $urlQuery);
    }

    /**
     * Build simple url method.
     *
     * @param string $url       Url path string parameter.
     * @param array  $urlParams Url query parameter data collection.
     * @param string $urlConcat Additional string that will be concatenated into url string.
     *
     * @throws \RuntimeException If invalid path given.
     * @return string
     */
    public static function buildUrl($url, array $urlParams = [], $urlConcat = '')
    {
        $url = trim($url);
        if (strpos($url, 'javascript') === 0) {
            return $url;
        }
        if (strpos($url, '#') === 0) {
            $url = self::getCurrentUrl() . $url;
        }
        if (self::isValidUri($url) === false) {
            $url = self::getBaseUrl($url);
        }
        if (count($urlParams) > 0) {
            $urlQuery = parse_url($url, PHP_URL_QUERY);
            $urlQueryConcat = '?';
            if ($urlQuery !== null) {
                $urlQueryConcat = '&';
            }
            $url .= $urlQueryConcat . http_build_query($urlParams);
        }
        return $url . $urlConcat;
    }

    /**
     * Get base url string.
     *
     * @param string  $fileUrlPath       File url path parameter.
     * @param boolean $useSubDirectory   Use sub directory on the active url flag option parameter.
     * @param boolean $withTrailingSlash Include trailing slash at the end of url flag option parameter.
     *
     * @throws \RuntimeException If invalid path given.
     * @return string
     */
    public static function getBaseUrl($fileUrlPath = '', $useSubDirectory = false, $withTrailingSlash = false)
    {
        if (filter_var($fileUrlPath, FILTER_VALIDATE_URL) !== false) {
            return $fileUrlPath;
        }
        $urlInfo = [];
        $protocol = Server::getProtocol();
        $hostName = Server::getHttpHostName();
        $strPort = '';
        if (in_array($_SERVER['SERVER_PORT'], ['80', '443', '22', '21'], true) === false) {
            $strPort = ':' . $_SERVER['SERVER_PORT'];
        }
        $urlInfo['scheme'] = $protocol . '://' . $hostName . $strPort;
        $urlInfo['baseDir'] = trim(str_replace(realpath($_SERVER['DOCUMENT_ROOT']), '', General::getBasePath()), '\\/');
        if ($useSubDirectory === true) {
            $urlInfo['baseDir'] = implode(
                '/',
                array_merge(
                    [$urlInfo['baseDir']],
                    array_diff(self::getUrlSegments(true), [$urlInfo['baseDir']])
                )
            );
        }
        $baseUrl = implode('/', $urlInfo) . '/' . $fileUrlPath;
        if ($withTrailingSlash === false) {
            $baseUrl = rtrim($baseUrl, '/');
        }
        return $baseUrl;
    }

    /**
     * Get url segments data.
     *
     * @param boolean $onlyDirSegment   Parse only directory segment flag option parameter.
     * @param string  $defaultSeparator Default separator parameter.
     *
     * @return array
     */
    public static function getUrlSegments($onlyDirSegment = false, $defaultSeparator = '/')
    {
        $parsedSegmentString = $_SERVER['REQUEST_URI'];
        if ($onlyDirSegment === true) {
            $parsedSegmentString = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        }
        return array_filter(explode($defaultSeparator, $parsedSegmentString));
    }

    /**
     * Get url from file or directory path on project.
     *
     * @param string $filePath File or directory path parameter.
     *
     * @throws \RuntimeException If invalid path given.
     * @return string
     */
    public static function getUrlFromPath($filePath)
    {
        return self::getBaseUrl(General::applyPathFix($filePath, '/'));
    }

    /**
     * Get the query param value of given key on specified url path.
     *
     * @param string            $keyName      Query key name parameter.
     * @param string            $urlPath      Url path string parameter.
     * @param string|array|null $defaultValue Default value parameter.
     * @param string|array|null $mappedValue  Mapped value parameter.
     *
     * @return string|array|null
     */
    public static function getUrlQueryParamValue($keyName, $urlPath = '', $defaultValue = null, $mappedValue = null)
    {
        return General::getValue(
            General::getArrayItemValue(self::getUrlQueryParams($urlPath), $keyName),
            $defaultValue,
            $mappedValue
        );
    }
}
