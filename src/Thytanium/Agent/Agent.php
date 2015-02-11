<?php

/**
 * This is CodeIgniter User_agent class
 * ported to Laravel
 *
 * Copyright: http://ellislab.com
 * Original source: http://github.com/bcit-ci/CodeIgniter
 */

namespace Thytanium\Agent;

use Illuminate\Http\Request;

class Agent
{
    /**
     * Current user-agent
     *
     * @var string
     */
    public $agent = null;

    /**
     * Flag for if the user-agent belongs to a browser
     *
     * @var bool
     */
    public $is_browser = false;

    /**
     * Flag for if the user-agent is a robot
     *
     * @var bool
     */
    public $is_robot = false;

    /**
     * Flag for if the user-agent is a mobile browser
     *
     * @var bool
     */
    public $is_mobile = false;

    /**
     * Languages accepted by the current user agent
     *
     * @var array
     */
    public $languages = [];

    /**
     * Character sets accepted by the current user agent
     *
     * @var array
     */
    public $charsets = [];

    /**
     * List of platforms to compare against current user agent
     *
     * @var array
     */
    public $platforms = [
        'windows nt 6.3'	=> 'Windows 8.1',
        'windows nt 6.2'	=> 'Windows 8',
        'windows nt 6.1'	=> 'Windows 7',
        'windows nt 6.0'	=> 'Windows Vista',
        'windows nt 5.2'	=> 'Windows 2003',
        'windows nt 5.1'	=> 'Windows XP',
        'windows nt 5.0'	=> 'Windows 2000',
        'windows nt 4.0'	=> 'Windows NT 4.0',
        'winnt4.0'			=> 'Windows NT 4.0',
        'winnt 4.0'			=> 'Windows NT',
        'winnt'				=> 'Windows NT',
        'windows 98'		=> 'Windows 98',
        'win98'				=> 'Windows 98',
        'windows 95'		=> 'Windows 95',
        'win95'				=> 'Windows 95',
        'windows phone'		=> 'Windows Phone',
        'windows'			=> 'Unknown Windows OS',
        'android'			=> 'Android',
        'blackberry'		=> 'BlackBerry',
        'iphone'			=> 'iOS',
        'ipad'				=> 'iOS',
        'ipod'				=> 'iOS',
        'os x'				=> 'Mac OS X',
        'ppc mac'			=> 'Power PC Mac',
        'freebsd'			=> 'FreeBSD',
        'ppc'				=> 'Macintosh',
        'linux'				=> 'Linux',
        'debian'			=> 'Debian',
        'sunos'				=> 'Sun Solaris',
        'beos'				=> 'BeOS',
        'apachebench'		=> 'ApacheBench',
        'aix'				=> 'AIX',
        'irix'				=> 'Irix',
        'osf'				=> 'DEC OSF',
        'hp-ux'				=> 'HP-UX',
        'netbsd'			=> 'NetBSD',
        'bsdi'				=> 'BSDi',
        'openbsd'			=> 'OpenBSD',
        'gnu'				=> 'GNU/Linux',
        'unix'				=> 'Unknown Unix OS',
        'symbian' 			=> 'Symbian OS'
    ];

    /**
     * List of browsers to compare against current user agent
     *
     * @var array
     */
    public $browsers = [
        'OPR'			=> 'Opera',
        'Flock'			=> 'Flock',
        'Chrome'		=> 'Chrome',
        // Opera 10+ always reports Opera/9.80 and appends Version/<real version> to the user agent string
        'Opera.*?Version'	=> 'Opera',
        'Opera'			=> 'Opera',
        'MSIE'			=> 'Internet Explorer',
        'Internet Explorer'	=> 'Internet Explorer',
        'Trident.* rv'	=> 'Internet Explorer',
        'Shiira'		=> 'Shiira',
        'Firefox'		=> 'Firefox',
        'Chimera'		=> 'Chimera',
        'Phoenix'		=> 'Phoenix',
        'Firebird'		=> 'Firebird',
        'Camino'		=> 'Camino',
        'Netscape'		=> 'Netscape',
        'OmniWeb'		=> 'OmniWeb',
        'Safari'		=> 'Safari',
        'Mozilla'		=> 'Mozilla',
        'Konqueror'		=> 'Konqueror',
        'icab'			=> 'iCab',
        'Lynx'			=> 'Lynx',
        'Links'			=> 'Links',
        'hotjava'		=> 'HotJava',
        'amaya'			=> 'Amaya',
        'IBrowse'		=> 'IBrowse',
        'Maxthon'		=> 'Maxthon',
        'Ubuntu'		=> 'Ubuntu Web Browser'
    ];

    /**
     * List of mobile browsers to compare against current user agent
     *
     * @var array
     */
    public $mobiles = [
        'mobileexplorer'	=> 'Mobile Explorer',
        'palmsource'		=> 'Palm',
        'palmscape'			=> 'Palmscape',

        // Phones and Manufacturers
        'motorola'		=> 'Motorola',
        'nokia'			=> 'Nokia',
        'palm'			=> 'Palm',
        'iphone'		=> 'Apple iPhone',
        'ipad'			=> 'iPad',
        'ipod'			=> 'Apple iPod Touch',
        'sony'			=> 'Sony Ericsson',
        'ericsson'		=> 'Sony Ericsson',
        'blackberry'	=> 'BlackBerry',
        'cocoon'		=> 'O2 Cocoon',
        'blazer'		=> 'Treo',
        'lg'			=> 'LG',
        'amoi'			=> 'Amoi',
        'xda'			=> 'XDA',
        'mda'			=> 'MDA',
        'vario'			=> 'Vario',
        'htc'			=> 'HTC',
        'samsung'		=> 'Samsung',
        'sharp'			=> 'Sharp',
        'sie-'			=> 'Siemens',
        'alcatel'		=> 'Alcatel',
        'benq'			=> 'BenQ',
        'ipaq'			=> 'HP iPaq',
        'mot-'			=> 'Motorola',
        'playstation portable'	=> 'PlayStation Portable',
        'playstation 3'		=> 'PlayStation 3',
        'playstation vita'  	=> 'PlayStation Vita',
        'hiptop'		=> 'Danger Hiptop',
        'nec-'			=> 'NEC',
        'panasonic'		=> 'Panasonic',
        'philips'		=> 'Philips',
        'sagem'			=> 'Sagem',
        'sanyo'			=> 'Sanyo',
        'spv'			=> 'SPV',
        'zte'			=> 'ZTE',
        'sendo'			=> 'Sendo',
        'nintendo dsi'	=> 'Nintendo DSi',
        'nintendo ds'	=> 'Nintendo DS',
        'nintendo 3ds'	=> 'Nintendo 3DS',
        'wii'			=> 'Nintendo Wii',
        'open web'		=> 'Open Web',
        'openweb'		=> 'OpenWeb',

        // Operating Systems
        'android'		=> 'Android',
        'symbian'		=> 'Symbian',
        'SymbianOS'		=> 'SymbianOS',
        'elaine'		=> 'Palm',
        'series60'		=> 'Symbian S60',
        'windows ce'	=> 'Windows CE',

        // Browsers
        'obigo'			=> 'Obigo',
        'netfront'		=> 'Netfront Browser',
        'openwave'		=> 'Openwave Browser',
        'mobilexplorer'	=> 'Mobile Explorer',
        'operamini'		=> 'Opera Mini',
        'opera mini'	=> 'Opera Mini',
        'opera mobi'	=> 'Opera Mobile',
        'fennec'		=> 'Firefox Mobile',

        // Other
        'digital paths'	=> 'Digital Paths',
        'avantgo'		=> 'AvantGo',
        'xiino'			=> 'Xiino',
        'novarra'		=> 'Novarra Transcoder',
        'vodafone'		=> 'Vodafone',
        'docomo'		=> 'NTT DoCoMo',
        'o2'			=> 'O2',

        // Fallback
        'mobile'		=> 'Generic Mobile',
        'wireless'		=> 'Generic Mobile',
        'j2me'			=> 'Generic Mobile',
        'midp'			=> 'Generic Mobile',
        'cldc'			=> 'Generic Mobile',
        'up.link'		=> 'Generic Mobile',
        'up.browser'	=> 'Generic Mobile',
        'smartphone'	=> 'Generic Mobile',
        'cellphone'		=> 'Generic Mobile'
    ];

    /**
     * List of robots to compare against current user agent
     *
     * @var array
     */
    public $robots = [
        'googlebot'		=> 'Googlebot',
        'msnbot'		=> 'MSNBot',
        'baiduspider'	=> 'Baiduspider',
        'bingbot'		=> 'Bing',
        'slurp'			=> 'Inktomi Slurp',
        'yahoo'			=> 'Yahoo',
        'askjeeves'		=> 'AskJeeves',
        'fastcrawler'	=> 'FastCrawler',
        'infoseek'		=> 'InfoSeek Robot 1.0',
        'lycos'			=> 'Lycos',
        'yandex'		=> 'YandexBot',
        'mediapartners-google'	=> 'MediaPartners Google',
        'CRAZYWEBCRAWLER'	=> 'Crazy Webcrawler',
        'adsbot-google'		=> 'AdsBot Google',
        'feedfetcher-google'=> 'Feedfetcher Google',
        'curious george'	=> 'Curious George'
    ];

    /**
     * Current user-agent platform
     *
     * @var string
     */
    public $platform = '';

    /**
     * Current user-agent browser
     *
     * @var string
     */
    public $browser = '';

    /**
     * Current user-agent version
     *
     * @var string
     */
    public $version = '';

    /**
     * Current user-agent mobile name
     *
     * @var string
     */
    public $mobile = '';

    /**
     * Current user-agent robot name
     *
     * @var string
     */
    public $robot = '';

    /**
     * HTTP Referer
     *
     * @var	mixed
     */
    public $referer;

    /**
     * HTPP Request instance
     * @var
     */
    public $request;

    // --------------------------------------------------------------------

    /**
     * Constructor
     *
     * Sets the User Agent and runs the compilation routine
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;

        if ($this->request->server('HTTP_USER_AGENT')) {
            $this->agent = trim($this->request->server('HTTP_USER_AGENT'));
            $this->compileData();
        }
    }

    /**
     * Compile User Agent data
     */
    protected function compileData()
    {
        $this->setPlatform();

        foreach (['setRobot', 'setBrowser', 'setMobile'] as $function) {
            if ($this->$function() === true) {
                break;
            }
        }
    }

    /**
     * Set the platform
     *
     * @return bool
     */
    protected function setPlatform()
    {
        if (is_array($this->platforms) && count($this->platforms) > 0) {
            foreach ($this->platforms as $key => $val) {
                if (preg_match('|'.preg_quote($key).'|i', $this->agent)) {
                    $this->platform = $val;
                    return true;
                }
            }
        }

        $this->platform = 'Unknown Platform';
        return false;
    }

    // --------------------------------------------------------------------

    /**
     * Set the Browser
     *
     * @return	bool
     */
    protected function setBrowser()
    {
        if (is_array($this->browsers) && count($this->browsers) > 0) {
            foreach ($this->browsers as $key => $val) {
                if (preg_match('|'.$key.'.*?([0-9\.]+)|i', $this->agent, $match)) {
                    $this->is_browser = true;
                    $this->version = $match[1];
                    $this->browser = $val;
                    $this->setMobile();
                    return true;
                }
            }
        }

        return false;
    }

    // --------------------------------------------------------------------

    /**
     * Set the Robot
     *
     * @return	bool
     */
    protected function setRobot()
    {
        if (is_array($this->robots) && count($this->robots) > 0) {
            foreach ($this->robots as $key => $val) {
                if (preg_match('|'.preg_quote($key).'|i', $this->agent)) {
                    $this->is_robot = true;
                    $this->robot = $val;
                    $this->setMobile();
                    return true;
                }
            }
        }

        return false;
    }

    // --------------------------------------------------------------------

    /**
     * Set the Mobile Device
     *
     * @return	bool
     */
    protected function setMobile()
    {
        if (is_array($this->mobiles) && count($this->mobiles) > 0) {
            foreach ($this->mobiles as $key => $val) {
                if (false !== (stripos($this->agent, $key))) {
                    $this->is_mobile = true;
                    $this->mobile = $val;
                    return true;
                }
            }
        }

        return false;
    }

    // --------------------------------------------------------------------

    /**
     * Set the accepted languages
     *
     * @return	void
     */
    protected function setLanguages()
    {
        $language = $this->request->server('HTTP_ACCEPT_LANGUAGE');

        if ((count($this->languages) === 0) && ! empty($language)) {
            $this->languages = explode(',', preg_replace('/(;\s?q=[0-9\.]+)|\s/i', '', strtolower(trim($this->request->server('HTTP_ACCEPT_LANGUAGE')))));
        }

        if (count($this->languages) === 0) {
            $this->languages = ['Undefined'];
        }
    }

    // --------------------------------------------------------------------

    /**
     * Set the accepted character sets
     *
     * @return	void
     */
    protected function setCharsets()
    {
        $charset = $this->request->server('HTTP_ACCEPT_CHARSET');

        if ((count($this->charsets) === 0) && ! empty($charset)) {
            $this->charsets = explode(',', preg_replace('/(;\s?q=.+)|\s/i', '', strtolower(trim($this->request->server('HTTP_ACCEPT_CHARSET')))));
        }

        if (count($this->charsets) === 0) {
            $this->charsets = ['Undefined'];
        }
    }

    // --------------------------------------------------------------------

    /**
     * Is Browser
     *
     * @param	string	$key
     * @return	bool
     */
    public function isBrowser($key = null)
    {
        if ( ! $this->is_browser) {
            return false;
        }

        // No need to be specific, it's a browser
        if ($key === null) {
            return true;
        }

        // Check for a specific browser
        return (isset($this->browsers[$key]) && $this->browser === $this->browsers[$key]);
    }

    // --------------------------------------------------------------------

    /**
     * Is Robot
     *
     * @param	string	$key
     * @return	bool
     */
    public function isRobot($key = null)
    {
        if ( ! $this->is_robot) {
            return false;
        }

        // No need to be specific, it's a robot
        if ($key === null) {
            return true;
        }

        // Check for a specific robot
        return (isset($this->robots[$key]) && $this->robot === $this->robots[$key]);
    }

    // --------------------------------------------------------------------

    /**
     * Is Mobile
     *
     * @param	string	$key
     * @return	bool
     */
    public function isMobile($key = null)
    {
        if ( ! $this->is_mobile) {
            return false;
        }

        // No need to be specific, it's a mobile
        if ($key === null) {
            return true;
        }

        // Check for a specific robot
        return (isset($this->mobiles[$key]) && $this->mobile === $this->mobiles[$key]);
    }

    /**
     * Is Desktop
     */
    public function isDesktop()
    {
        return !$this->isMobile() && !$this->isRobot();
    }

    // --------------------------------------------------------------------

    /**
     * Is this a referral from another site?
     *
     * @return	bool
     */
    public function isReferral()
    {
//        $referer = $this->request->server('HTTP_REFERER');
//
//        if ( ! isset($this->referer)) {
//            if (empty($referer)) {
//                $this->referer = false;
//            }
//            else {
//                $referer_host = @parse_url($this->request->server('HTTP_REFERER'), PHP_URL_HOST);
//                $own_host = parse_url(config_item('base_url'), PHP_URL_HOST);
//
//                $this->referer = ($referer_host && $referer_host !== $own_host);
//            }
//        }
//
//        return $this->referer;
    }

    // --------------------------------------------------------------------

    /**
     * Agent String
     *
     * @return	string
     */
    public function agent() {
        return $this->agent;
    }

    // --------------------------------------------------------------------

    /**
     * Get Platform
     *
     * @return	string
     */
    public function platform() {
        return $this->platform;
    }

    // --------------------------------------------------------------------

    /**
     * Get Browser Name
     *
     * @return	string
     */
    public function browser() {
        return $this->browser;
    }

    // --------------------------------------------------------------------

    /**
     * Get the Browser Version
     *
     * @return	string
     */
    public function version() {
        return $this->version;
    }

    // --------------------------------------------------------------------

    /**
     * Get The Robot Name
     *
     * @return	string
     */
    public function robot() {
        return $this->robot;
    }
    // --------------------------------------------------------------------

    /**
     * Get the Mobile Device
     *
     * @return	string
     */
    public function mobile() {
        return $this->mobile;
    }

    // --------------------------------------------------------------------

    /**
     * Get the referrer
     *
     * @return	bool
     */
    public function referrer() {
        return !$this->request->server('HTTP_REFERER') ?: '';
    }

    // --------------------------------------------------------------------

    /**
     * Get the accepted languages
     *
     * @return	array
     */
    public function languages() {
        if (count($this->languages) === 0) {
            $this->setLanguages();
        }

        return $this->languages;
    }

    // --------------------------------------------------------------------

    /**
     * Get the accepted Character Sets
     *
     * @return	array
     */
    public function charsets() {
        if (count($this->charsets) === 0) {
            $this->setCharsets();
        }

        return $this->charsets;
    }

    // --------------------------------------------------------------------

    /**
     * Test for a particular language
     *
     * @param	string	$lang
     * @return	bool
     */
    public function acceptLanguage($lang = 'en') {
        return in_array(strtolower($lang), $this->languages(), true);
    }

    // --------------------------------------------------------------------

    /**
     * Test for a particular character set
     *
     * @param	string	$charset
     * @return	bool
     */
    public function acceptCharset($charset = 'utf-8') {
        return in_array(strtolower($charset), $this->charsets(), true);
    }

    // --------------------------------------------------------------------

    /**
     * Parse a custom user-agent string
     *
     * @param	string	$string
     * @return	void
     */
    public function parse($string) {
        // Reset values
        $this->is_browser = false;
        $this->is_robot = false;
        $this->is_mobile = false;
        $this->browser = '';
        $this->version = '';
        $this->mobile = '';
        $this->robot = '';

        // Set the new user-agent string and parse it, unless empty
        $this->agent = $string;

        if ( ! empty($string)) {
            $this->compileData();
        }
    }
}