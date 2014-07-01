<?php

namespace it\icosaedro\io;
require_once __DIR__ . "/../../../errors.php";
require_once __DIR__ . "/InputStream.php";
require_once __DIR__ . "/IOException.php";
use it\icosaedro\io\InputStream;
use it\icosaedro\io\IOException;
use ErrorException;

/**
 * Reads bytes from a resource, typically opened with fopen() or fsocketopen()
 * and turns it into an input stream. For some examples of usage, see the
 * documentation about the ResourceOutputStream class.
 * @author Umberto Salsi <salsi@icosaedro.it>
 * @version $Date: 2014/02/12 14:38:47 $
 */
class ResourceInputStream extends InputStream {
	
	private /*. resource .*/ $r;
	
	
	/**
	 * Initializes reading from resource handle.
	 * @param resource $r 
	 * @return void
	 */
	public function __construct($r){
		$this->r = $r;
	}
	

	/**
	 * Reads one byte.
	 * @return int Byte read in [0,255], or -1 on end of file.
	 * @throws IOException
	 */
	public function readByte(){
		try {
			$b = fread($this->r, 1);
		}
		catch(ErrorException $e){
			throw new IOException($e->getMessage());
		}
		if( $b === FALSE )
			return -1;
		return ord($b);
	}


	/**
	 * Reads bytes.
	 * @param int $n Maximum number of bytes to read.
	 * @return string Bytes read, possibly in a number less than requested,
	 * either because the end of the file has been reached, or the input
	 * buffer is short but still data are available. If $n &le; 0 does nothing
	 * and the empty string is returned. If $n &gt; 0 and the returned string
	 * is NULL, the end of the file is reached.
	 * @throws IOException
	 */
	public function readBytes($n)
	{
		if( $n <= 0 )
			return "";
		
		try {
			$bytes = fread($this->r, $n);
		}
		catch(ErrorException $e){
			throw new IOException($e->getMessage());
		}
		if( $bytes === FALSE or strlen($bytes) == 0 )
			return NULL;
		else
			return $bytes;
	}


	/**
	 * Closes the stream. Does nothing if the stream has been already closed.
	 * @return void
	 * @throws IOException
	 */
	public function close(){
		if( $this->r !== NULL ){
			try {
				fclose($this->r);
			}
			catch(ErrorException $e){
				throw new IOException($e->getMessage());
			}
			$this->r = NULL;
		}
	}


	/*. void .*/ function __destruct(){
		try {
			$this->close();
		}
		catch(IOException $e){}
	}

}
