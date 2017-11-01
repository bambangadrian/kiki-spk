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
 * Class String.
 *
 * @package    SimpleFw
 * @subpackage Core\Helpers
 * @author     Bambang Adrian S <bambang.adrian@gmail.com>
 */
class String extends \SimpleFw\Core\Design\AbstractSingleton
{

    /**
     * Get the string length.
     *
     * @param string $str String data parameter.
     *
     * @return integer
     */
    public static function getLength($str)
    {
        return mb_strlen($str);
    }

    /**
     * Replace some accent character from the given string.
     *
     * @param string $str String data parameter.
     *
     * @return string
     */
    public static function replaceAccent($str)
    {
        $accentCollection = 'À,Á,Â,Ã,Ä,Å,Æ,Ç,È,É,Ê,Ë,Ì,Í,Î,Ï,Ð,Ñ,Ò,Ó,Ô,Õ,Ö,Ø,Ù,Ú,Û,Ü,Ý,ß,à,á,â,ã,ä,å,æ,';
        $accentCollection .= 'ç,è,é,ê,ë,ì,í,î,ï,ñ,ò,ó,ô,õ,ö,ø,ù,ú,û,ü,ý,ÿ,Ā,ā,Ă,ă,Ą,ą,Ć,ć,Ĉ,ĉ,Ċ,ċ,Č,č,Ď,ď,';
        $accentCollection .= 'Đ,đ,Ē,ē,Ĕ,ĕ,Ė,ė,Ę,ę,Ě,ě,Ĝ,ĝ,Ğ,ğ,Ġ,ġ,Ģ,ģ,Ĥ,ĥ,Ħ,ħ,Ĩ,ĩ,Ī,ī,Ĭ,ĭ,Į,į,İ,ı,Ĳ,ĳ,Ĵ,ĵ,Ķ,';
        $accentCollection .= 'ķ,Ĺ,ĺ,Ļ,ļ,Ľ,ľ,Ŀ,ŀ,Ł,ł,Ń,ń,Ņ,ņ,Ň,ň,ŉ,Ō,ō,Ŏ,ŏ,Ő,ő,Œ,œ,Ŕ,ŕ,Ŗ,ŗ,Ř,ř,Ś,ś,Ŝ,ŝ,Ş,ş,Š,';
        $accentCollection .= 'š,Ţ,ţ,Ť,ť,Ŧ,ŧ,Ũ,ũ,Ū,ū,Ŭ,ŭ,Ů,ů,Ű,ű,Ų,ų,Ŵ,ŵ,Ŷ,ŷ,Ÿ,Ź,ź,Ż,ż,,ž,ſ,ƒ,Ơ,ơ,Ư,ư,Ǎ,ǎ,Ǐ,ǐ,';
        $accentCollection .= 'Ǒ,ǒ,Ǔ,ǔ,Ǖ,ǖ,Ǘ,ǘ,Ǚ,ǚ,Ǜ,ǜ,Ǻ,ǻ,Ǽ,ǽ,Ǿ,ǿ';
        $accentReplacer = 'A,A,A,A,A,A,AE,C,E,E,E,E,I,I,I,I,D,N,O,O,O,O,O,O,U,U,U,U,Y,s,a,a,a,a,a,a,ae,c,e,';
        $accentReplacer .= 'e,e,e,i,i,i,i,n,o,o,o,o,o,o,u,u,u,u,y,y,A,a,A,a,A,a,C,c,C,c,C,c,C,c,D,d,D,d,E,';
        $accentReplacer .= 'e,E,e,E,e,E,e,E,e,G,g,G,g,G,g,G,g,H,h,H,h,I,i,I,i,I,i,I,i,I,i,IJ,ij,J,j,K,k,L,';
        $accentReplacer .= 'l,L,l,L,l,L,l,l,l,N,n,N,n,N,n,n,O,o,O,o,O,o,OE,oe,R,r,R,r,R,r,S,s,S,s,S,s,S,s,T,';
        $accentReplacer .= 't,T,t,T,t,U,u,U,u,U,u,U,u,U,u,U,u,W,w,Y,y,Y,Z,z,Z,z,Z,z,s,f,O,o,U,u,A,a,I,i,O,o,';
        $accentReplacer .= 'U,u,U,u,U,u,U,u,U,u,A,a,AE,ae,O,o';
        return str_replace(explode(',', $accentCollection), explode(',', $accentReplacer), $str);
    }

    /**
     * Convert the given string to url friendly format.
     *
     * @param string $str       String data parameter.
     * @param string $delimiter The delimiter that will used to replace the special character.
     * @param array  $replace   Array of data that will be used for replace the character on the given string.
     *
     * @return string
     */
    public static function toFriendlyFormat($str, $delimiter = '-', array $replace = [])
    {
        $specialChar = ['~', '!', '@', '#', '$', '%', '^', '&', '*'];
        # Set default replaced character if not defined yet.
        if ($replace === null or count($replace) === 0) {
            $replace = $specialChar;
        }
        $str = str_replace((array)$replace, ' ', $str);
        $clean = self::replaceAccent($str);
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $clean);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = trim(preg_replace("/[\/_|+ -]+/", $delimiter, $clean), $delimiter);
        return $clean;
    }

    /**
     * Convert the given string to camel case format.
     *
     * @param string $str String data parameter.
     *
     * @return string
     */
    public static function toCamelCase($str)
    {
        # Sample: Bambang Adrian Sitompul : bambangAdrianSitompul
        $arrStr = explode(' ', self::toFriendlyFormat($str, ' '));
        array_walk(
            $arrStr,
            function (&$value, $key) {
                $value = ($key === 0) ? strtolower($value) : ucfirst($value);
            }
        );
        return implode('', $arrStr);
    }

    /**
     * Convert the given string to pascal case format.
     *
     * @param string $str String data parameter.
     *
     * @return string
     */
    public static function toPascalCase($str)
    {
        # Sample: Bambang Adrian Sitompul : BambangAdrianSitompul
        return str_replace(' ', '', ucwords(self::toFriendlyFormat($str, ' ')));
    }

    /**
     * Wrap the given string with given string.
     *
     * @param string $string           Content string that will be wrapped.
     * @param string $wrappedBy        String that will be used to wrap the given string parameter.
     * @param string $wrapperDelimiter Wrapper delimiter parameter.
     *
     * @throws \LogicException If invalid wrap-str given.
     * @return string
     */
    public static function wrapBy($string, $wrappedBy = '', $wrapperDelimiter = '')
    {
        $wrappedByStrLength = self::getLength($wrappedBy);
        $preWrap = $wrappedBy;
        $postWrap = $wrappedBy;
        if ($wrappedByStrLength > 1) {
            if ($wrapperDelimiter !== '' and $wrapperDelimiter !== null) {
                $arrWrappedBy = explode($wrapperDelimiter, $wrappedBy);
                if (count($arrWrappedBy) === 2) {
                    list($preWrap, $postWrap) = $arrWrappedBy;
                }
            } else {
                if ($wrappedByStrLength % 2 !== 0) {
                    throw new \LogicException('Invalid wrap-str given: ' . $wrappedBy);
                }
                $arrWrappedBy = str_split($wrappedBy, (integer)$wrappedByStrLength / 2);
                list($preWrap, $postWrap) = $arrWrappedBy;
            }
        }
        return $preWrap . $string . $postWrap;
    }

    /**
     * Wrap the given string with double quote.
     *
     * @param string $string Content string that will be wrapped.
     *
     * @throws \LogicException If invalid wrap-str given.
     * @return string
     */
    public static function wrapDoubleQuote($string)
    {
        return self::wrapBy($string, '"');
    }

    /**
     * Explode the string using defined delimiters array.
     *
     * @param array   $delimiters     Delimiters array data collection parameter.
     * @param string  $string         Given string that want to be exploded.
     * @param boolean $trimWhiteSpace Trim white space flag option parameter.
     *
     * @return array
     */
    public static function multiExplodeToArray(array $delimiters, $string, $trimWhiteSpace = false)
    {
        $string = str_replace($delimiters, $delimiters[0], $string);
        $result = explode($delimiters[0], $string);
        if ($trimWhiteSpace === true) {
            $result = array_map('trim', $result);
        }
        return $result;
    }

    /**
     * Explode the string using defined delimiters array and put them into correct segmentation.
     *
     * @param array   $delimiters     Delimiters array data collection parameter.
     * @param string  $string         Given string that want to be exploded.
     * @param boolean $trimWhiteSpace Trim white space flag option parameter.
     *
     * @return array
     */
    public static function multiExplodeToArraySegment(array $delimiters, $string, $trimWhiteSpace = false)
    {
        $result = explode($delimiters[0], $string);
        if ($trimWhiteSpace === true) {
            $result = array_map('trim', $result);
        }
        array_shift($delimiters);
        if (count($delimiters) > 0) {
            $segments = $result;
            foreach ($segments as $key => $value) {
                $result[$key] = self::multiExplodeToArraySegment($delimiters, $value, $trimWhiteSpace);
            }
        }
        return $result;
    }

    /**
     * Convert the given string into directory namespace format that used delimiter as separator.
     *
     * @param string $string             Given string that want to be converted.
     * @param string $delimiter          Delimiter string parameter.
     * @param string $nameSpaceDelimiter NameSpace delimiter parameter.
     *
     * @return string
     */
    public static function toNameSpaceFormat($string, $delimiter = '-', $nameSpaceDelimiter = NS)
    {
        return General::implodeArray(
            array_map(
                'toPascalCase',
                self::multiExplodeToArray([$delimiter], $string, true)
            ),
            $nameSpaceDelimiter
        );
    }

    /**
     * Convert the given string into regex format.
     *
     * @param string $string        Given string that want to be formatted.
     * @param string $patternSuffix Regex pattern string that will be used as suffix.
     * @param string $patternPrefix Regex pattern string that will be used as prefix.
     *
     * @return string
     */
    public static function toRegex($string, $patternSuffix = '', $patternPrefix = '')
    {
        $escapedCharacters = ['/', '\\', '.', '[', ']', '(', ')', ':', '?', '+', '|'];
        $replacedChars = array_map(
            function ($value) {
                return '\\' . $value;
            },
            $escapedCharacters
        );
        $patternFromString = strtr($string, array_combine($escapedCharacters, $replacedChars));
        return '/' . $patternPrefix . $patternFromString . $patternSuffix . '/';
    }
}
