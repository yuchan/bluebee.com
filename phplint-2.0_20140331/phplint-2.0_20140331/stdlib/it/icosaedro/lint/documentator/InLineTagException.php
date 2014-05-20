<?php

namespace it\icosaedro\lint\documentator;
require_once __DIR__ . "/../../../../all.php";
use Exception;

/**
 * Reports a failure while resolving an in-line tag "{@...}".
 * @author Umberto Salsi <salsi@icosaedro.it>
 * @version $Date: 2014/02/18 22:37:58 $
 */
class InLineTagException extends Exception {

	public function __construct(/*.string.*/ $msg) {
		parent::__construct($msg);
	}

}
