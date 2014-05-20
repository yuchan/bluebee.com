<?php

namespace it\icosaedro\io;
require_once __DIR__ . "/IOException.php";
require_once __DIR__ . "/InputStream.php";
use it\icosaedro\io\InputStream;
use it\icosaedro\io\IOException;


/**
 * Read bytes from a string.
 * @author Umberto Salsi <salsi@icosaedro.it>
 * @version $Date: 2014/02/20 16:12:23 $
 */
class StringInputStream extends InputStream {
	
	/**
	 * Buffer of bytes to read.
	 * @var string
	 */
	private $buffer;
	
	/**
	 * Offset of the next byte to read from buffer.
	 * @var int 
	 */
	private $pos = 0;
	
	
	/**
	 * Creates a new input buffer of bytes.
	 * @param string $s Bytes to be read.
	 * @return void
	 */
	public function __construct($s)
	{
		$this->buffer = $s;
		$this->pos = 0;
	}
	

	/**
	 * Reads one byte.
	 * @return int Byte read in [0,255], or -1 on end of file.
	 * @throws IOException
	 */
	public function readByte()
	{
		if( $this->pos < strlen($this->buffer) )
			return ord($this->buffer[$this->pos++]);
		else
			return -1;
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
		else if( $this->pos < strlen($this->buffer) ){
			if( $this->pos + $n > strlen($this->buffer) )
				$n = strlen($this->buffer) - $this->pos;
			$res = substr($this->buffer, $this->pos, $n);
			$this->pos += $n;
			return $res;
		} else
			return NULL;
	}


	/**
	 * Closes the stream. Does nothing if the stream has been already closed.
	 * @return void
	 * @throws IOException
	 */
	public function close(){
		$this->buffer = NULL; // immediately releases memory
		$this->pos = 0;
	}

	
}
