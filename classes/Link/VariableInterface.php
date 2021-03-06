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
 * @version   $Id: f0c17e8549b8f276432c68c19f9bce7fc712b1a3 $
 */

/**
 * Interface to implement to manage the templates' variables
 *
 * @package Link
 * @author  Baptiste "Talus" Clavié <clavie.b@gmail.com>
 */
interface Link_VariableInterface extends ArrayAccess, IteratorAggregate, Countable {
    /**
     * Gets the variable's value
     *
     * @return mixed
     */
    public function getValue();

    /** {@inheritDoc} */
    public function __toString();

    /** {@inheritDoc} */
    public function __call($method, array $arguments);

    /** {@inheritDoc} */
    public function __get($property);

    /** {@inheritdoc} */
    public function __set($property, $value);
}

