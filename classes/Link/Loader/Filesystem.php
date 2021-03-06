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
 * @version   $Id: 75b49afe5fb705d68f300ff99fb0bcf3acd8d795 $
 */

/**
 * Filesystem Loader for Link TPL.
 *
 * Loads a template from the filesystem.
 *
 * This class comes from the Twig project.
 *
 * @package Link
 * @author  Baptiste "Talus" Clavié <clavie.b@gmail.com>
 * @since   1.4.0
 */
class Link_Loader_Filesystem implements Link_LoaderInterface {
    protected
        $_dirs = array(),
        $_cache = array();

    /** {@inheritDoc} */
    public function __construct($_dirs) {
        clearstatcache();
        $this->setDirs($_dirs);
    }

    /** {@inheritDoc} */
    public function getCacheKey($_name) {
        return sha1($this->_findFileName($_name));
    }

    /** {@inheritDoc} */
    public function getSource($_name) {
        return file_get_contents($this->_findFileName($_name));
    }

    /** {@inheritDoc} */
    public function isFresh($_name, $_time) {
        return filemtime($this->_findFileName($_name)) > $_time;
    }

    /**
     * Find the file designated by $_name, checks if it exists
     *
     * @param string $_name name of the file to retrieve
     *
     * @return string                the corresponding file name
     * @throws Link_Exception_Loader if the file is not found or not accessible
     */
    protected function _findFileName($_name) {
        if (isset($this->_cache[$_name])) {
            return $this->_cache[$_name];
        }

        if (strpos($_name, "\0") !== false) {
            throw new Link_Exception_Loader('A template name may not contain NUL bytes');
        }

        $file = preg_replace('`/{2,}`', '/', strtr($_name, '\\', '/'));

        // -- Checking the key name validity...
        $level = 0;
        $parts = explode('/', $file);

        foreach ($parts as &$part) {
            if ($part == '..') {
                --$level;
            } elseif ($part != '.') {
                ++$level;
            }

            if ($level < 0) {
                throw new Link_Exception_Loader('You may not access a template outside its directory.');
            }
        }

        foreach ($this->_dirs as &$dir) {
            $f = $dir . '/' . $file;

            if (file_exists($f)) {
                $this->_cache[$_name] = $f;

                return $f;
            }
        }

        throw new Link_Exception_Loader('The template ' . $_name . ' does not seem to exist.', 6);
    }

    /**
     * @return array directories used
     * @codeCoverageIgnore
     */
    public function getDirs() {
        return $this->_dirs;
    }

    /** @param string|array $_dirs directories to use */
    public function setDirs($_dirs) {
        if (!is_array($_dirs)) {
            $_dirs = array($_dirs);
        }

        $this->_dirs = array();
        $this->_cache = array();

        foreach ($_dirs as &$dir) {
            $this->appendDir($dir);
        }
    }

    /**
     * Appends a directory to the list of directories
     *
     * @param string $_dir Directory to add
     *
     * @throws Link_Exception_Loader
     */
    public function appendDir($_dir) {
        $dir = rtrim(strtr($_dir, '\\', '/'), '/');

        if (!is_dir($dir)) {
            throw new Link_Exception_Loader('The directory ' . $_dir . ' does not seem to exist.');
        }

        $this->_dirs[] = $dir;
    }

    /**
     * Prepends a directory on the top of the pile
     *
     * @param string $_dir
     *
     * @throws Link_Exception_Loader Directory can't be added because it doesn't exist.
     */
    public function prependDir($_dir) {
        $dir = rtrim(strtr($_dir, '\\', '/'), '/');

        if (!is_dir($dir)) {
            throw new Link_Exception_Loader('The directory ' . $_dir . ' does not seem to exist.');
        }

        $this->_cache = array();
        array_unshift($this->_dirs, $dir);
    }
}

/*
 * EOF
 */
