<?php

namespace it\icosaedro\io;
require_once __DIR__ . "/../../../autoload.php";
require_once __DIR__ . "/../../../errors.php";
use ErrorException;
use it\icosaedro\io\IOException;
use it\icosaedro\io\ResourceOutputStream;
use it\icosaedro\io\FileName;
use it\icosaedro\utils\UString;

/**
 * Writes a file as a stream of bytes.
 *
 * @author Umberto Salsi <salsi@icosaedro.it>
 * @version $Date: 2013/12/31 04:01:55 $
 */
class FileOutputStream extends ResourceOutputStream {

	/**
	 * Opens the specified file for writing. Overwrites the file if
	 * it already exists.
	 * @param File $name Name of the file.
	 * @param bool $append If the file already exists, append new data.
	 * @return void
	 * @throws IOException Invalid file name. File name or its path contains
	 * characters that cannot be mapped to the current system locale. Access
	 * denied to the file or to some part of the path.
	 */
	function __construct($name, $append = FALSE) {
		try {
			$f = fopen($name->getLocaleEncoded(), $append? "ab" : "wb");
		}
		catch(ErrorException $e){
			throw new IOException($e->getMessage());
		}
		parent::__construct($f);
	}

}
