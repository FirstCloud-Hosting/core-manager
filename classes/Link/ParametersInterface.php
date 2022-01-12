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
 * @version   $Id: dd7e0c5c702deceab3925ba3eeee4b8394def4a7 $
 */

/**
 * Interface to implement if the class has stored parameters.
 *
 * @package Link
 * @author  Baptiste "Talus" Clavié <clavie.b@gmail.com>
 */
interface Link_ParametersInterface {
    /**
     * Getter for a given parameter
     *
     * @param string $name Parameter's name
     *
     * @return mixed Parameter's value
     */
    public function getParameter($name);

    /**
     * Setter for a given parameter
     *
     * @param string $name Parameter's name
     * @param mixed  $val  Parameter's value
     *
     * @return mixed Parameter's value
     */
    public function setParameter($name, $val = null);

    /**
     * Checks whether or not this class has the `$name` parameter
     *
     * @param string $name Parameter's name
     *
     * @return bool true if this parameter exists, false otherwise
     */
    public function hasParameter($name);
}

/*
 * EOF
 */
