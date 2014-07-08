<?php

namespace it\icosaedro\lint;
require_once __DIR__ . "/../../../all.php";

/**
 * Unrecoverable scanner exception. Scanning of the file cannot continue;
 * the source file must be closed immediately and no more symbols can be
 * requested or unpredictable results may return, then this exception
 * should be captured only at package parse level.
 * @author Umberto Salsi <salsi@icosaedro.it>
 * @version $Date: 2014/01/30 12:20:59 $
 */
/*. unchecked .*/ class ScannerException extends \Exception {
	
	/**
	 *
	 * @var Where 
	 */
	private $where;

	/**
	 *
	 * @param Where $where
	 * @param string $msg 
	 * @return void
	 */
	public function __construct($where, $msg)
	{
		parent::__construct($msg);
		$this->where = $where;
	}
	
	
	/**
	 *
	 * @return Where 
	 */
	public function getWhere()
	{
		return $this->where;
	}

}
