<?php
/**
 * This file is part of Link TPL.
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 *
 * @copyright Copyleft (c) 2007+, Baptiste Clavié, Talus' Works
 * @link      http://www.talus-works.net Talus' Works
 * @license   http://www.opensource.org/licenses/BSD-3-Clause Modified BSD License
 * @version   $Id: d1a26ecf8007fafc52746458954f9e587fc08b7d $
 */

// -- Useful constants....
defined('PHP_EXT') || define('PHP_EXT', pathinfo(__FILE__, PATHINFO_EXTENSION));

/**
 * Autoloader
 *
 * If the class to load is from this current library, tries a smart load of the
 * file from this directory.
 *
 * This autoloader is PSR-0 compliant.
 *
 * @package Link
 * @author  Baptiste "Talus" Clavié <clavie.b@gmail.com>
 * @link    http://groups.google.com/group/php-standards/web/psr-0-final-proposal
 */
class Link_Autoloader {
    /** @codeCoverageIgnore */
    public static function register() {
        spl_autoload_register(array('self', 'load'));
    }

    /** @codeCoverageIgnore */
    public static function unregister() {
        spl_autoload_unregister(array('self', 'load'));
    }

    /**
     * Autotoloads the `$class` class
     *
     * @param string $_class class to be loaded
     *
     * @return bool
     */
    public static function load($_class) {
        if (strpos($_class, 'Link') !== 0) {
            return false;
        }

        $file = dirname(__FILE__) . '/../';
        $file .= str_replace(array('_', "\0"), array('/', ''), $_class) . '.' . PHP_EXT;

        if (!file_exists($file)) {
            return false;
        }

        require $file;

        return true;
    }
}

/*
 * EOF
 */
