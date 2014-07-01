<?php

/*.
	require_module 'standard';
.*/

namespace it\icosaedro\utils;
require_once __DIR__ . '/../../../autoload.php';
use it\icosaedro\containers\Printable;

/**
 * Buffer where to concatenate strings. In PHP, nothing is faster than simple
 * string concatenation $s1.$s2, and this implementation does not break this
 * rule neither, being up to 10 times slower. It is intended as a placeholder:
 * applications should use this class whenever very long strings have to be
 * built piece by piece, so them will benefit from any future improvement.
 * @author Umberto Salsi <salsi@icosaedro.it>
 * @version $Date: 2014/03/04 12:12:29 $
 */
class StringBuffer implements Printable {

	/**
	 * Appended strings are actually added to this array. This strategy does
	 * not improve the speed, but should at least reduce memory fragmentation
	 * when the buffer becomes very large.
	 * @var string[int] 
	 */
	private $buf;

	/**
	 * Initializes an empty buffer.
	 * @return void 
	 */
	public function __construct() {
		$this->buf = /*. (string[int]) .*/ array();
	}

	/**
	 * Add a string to the end of the buffer.
	 * @param string $s
	 * @return void 
	 */
	public function append($s) {
		if( strlen($s) == 0 )
			return;
		$this->buf[] = $s;
		if( count($this->buf) > 1000 )
			$this->buf = array( implode("", $this->buf) );
	}

	/**
	 * Returns the current content of this buffer.
	 * @return string 
	 */
	public function __toString() {
		$this->buf = array( implode("", $this->buf) );
		return $this->buf[0];
	}

}

