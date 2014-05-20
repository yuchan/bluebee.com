<?php

namespace it\icosaedro\io;
require_once __DIR__ . "/../../../autoload.php";
require_once __DIR__ . "/../../../errors.php";
use ErrorException;
use it\icosaedro\io\IOException;

/**
 * Reads a file as a stream of bytes. The constructor accepts an Unicode file
 * name. Examples:
 * <pre>
 *		$fn = UString::fromUTF8("UTF8_encoded_filename_here.txt");
 *		$f = new FileInputStream( new File($fn) );
 *		while( ($bytes = $f-&gt;readBytes(100)) !== NULL )
 *			echo $bytes;
 *		$f-&gt;close();
 * </pre>
 * See also the LineInputWrapper class to read files line by line.
 *
 * @author Umberto Salsi <salsi@icosaedro.it>
 * @version $Date: 2014/02/12 14:38:02 $
 */
class FileInputStream extends ResourceInputStream {

	/**
	 * Opens the specified file for reading.
	 * @param File $name Name of the file.
	 * @return void
	 * @throws IOException Invalid file name. File name or its path contains
	 * characters that cannot be mapped to the current system locale. Access
	 * denied to the file or to some part of the path.
	 */
	function __construct($name) {
		try {
			$f = fopen($name->getLocaleEncoded(), "rb");
		}
		catch(ErrorException $e){
			throw new IOException($e->getMessage());
		}
		parent::__construct($f);
	}

}
