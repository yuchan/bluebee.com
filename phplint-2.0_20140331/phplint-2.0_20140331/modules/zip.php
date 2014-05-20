<?php
/** Zip File Functions.

See: {@link http://www.php.net/manual/en/class.ziparchive.php}
@package zip
*/

/*. resource .*/ function zip_open(/*. string .*/ $filename){}
/*. void .*/ function zip_close(/*. resource .*/ $zip){}
/*. resource .*/ function zip_read(/*. resource .*/ $zip){}
/*. bool .*/ function zip_entry_open(/*. resource .*/ $zip_dp, /*. resource .*/ $zip_entry  /*. , args .*/){}
/*. void .*/ function zip_entry_close(/*. resource .*/ $zip_ent){}
/*. mixed .*/ function zip_entry_read(/*. resource .*/ $zip_entry  /*. , args .*/){}
/*. string .*/ function zip_entry_name(/*. resource .*/ $zip_entry){}
/*. int .*/ function zip_entry_compressedsize(/*. resource .*/ $zip_entry){}
/*. int .*/ function zip_entry_filesize(/*. resource .*/ $zip_entry){}
/*. string .*/ function zip_entry_compressionmethod(/*. resource .*/ $zip_entry){}

/*. if_php_ver_5 .*/

/**
 * A file archive, compressed with Zip. Apparently, from the documentation and
 * from may tests, the methods of this class never trigger errors nor throw
 * exceptions; instead, some return FALSE to indicate an error, but whithout
 * further details. All methods, except the default constructor and
 * <code>open()</code> trigger E_WARNING if the archive has not been initialized
 * with <code>open()</code>, but this error is not indicated here, assuming it
 * is a bug in the program the program itself should not try to manage by
 * itself.
 * 
 * <p><b>WARNING:</b> several methods may return FALSE on error rather that
 * the specific type listed here, so check the documentation and always test
 * the actual value returned with a code like this:
 * <pre>
 * $res = $zip-&gt;someMethod(...);
 * if( $res === FALSE ){
 *	die("ZipArchive::someMethod(): error");
 * }
 * </pre>
 */
class ZipArchive
{

	const
		# All these values are dummy:
		CREATE  = 1,
		OVERWRITE  = 2,
		EXCL  = 3,
		CHECKCONS  = 4,
		FL_NOCASE  = 5,
		FL_NODIR  = 6,
		FL_COMPRESSED  = 7,
		FL_UNCHANGED  = 8,
		CM_DEFAULT  = 9,
		CM_STORE  = 10,
		CM_SHRINK  = 11,
		CM_REDUCE_1  = 12,
		CM_REDUCE_2  = 13,
		CM_REDUCE_3  = 14,
		CM_REDUCE_4  = 15,
		CM_IMPLODE  = 16,
		CM_DEFLATE  = 17,
		CM_DEFLATE64  = 18,
		CM_PKWARE_IMPLODE  = 19,
		CM_BZIP2  = 20,
		ER_OK  = 21,
		ER_MULTIDISK  = 22,
		ER_RENAME  = 23,
		ER_CLOSE  = 24,
		ER_SEEK  = 25,
		ER_READ  = 26,
		ER_WRITE  = 27,
		ER_CRC  = 28,
		ER_ZIPCLOSED  = 29,
		ER_NOENT  = 30,
		ER_EXISTS  = 31,
		ER_OPEN  = 32,
		ER_TMPOPEN  = 33,
		ER_ZLIB  = 34,
		ER_MEMORY  = 35,
		ER_CHANGED  = 36,
		ER_COMPNOTSUPP  = 37,
		ER_EOF  = 38,
		ER_INVAL  = 39,
		ER_NOZIP  = 40,
		ER_INTERNAL  = 41,
		ER_INCONS  = 42,
		ER_REMOVE  = 43,
		ER_DELETED  = 44;

	public /*. int .*/ $status = 0;
	public /*. int .*/ $statusSys = 0;
	public /*. int .*/ $numFiles = 0;
	public /*. string .*/ $filename = NULL;
	public /*. string .*/ $comment = NULL;

	/*. bool .*/ function addEmptyDir(/*. string .*/ $dirname){}
	/*. bool .*/ function addFile(/*. string .*/ $filepath, /*. string .*/ $localname = NULL, $start = 0, $length = -1){}
	/*. resource .*/ function addFromString(/*. string .*/ $name, /*. string .*/ $content){}
	/*. bool .*/ function addGlob(/*. string .*/ $pattern, $flags = 0, /*. mixed[string] .*/ $options = array()){}
	/*. bool .*/ function addPattern(/*. string .*/ $pattern, $path = '.', /*. mixed[string] .*/ $options = array()){}
	/*. bool .*/ function close(){}
	/*. bool .*/ function deleteIndex(/*. int .*/ $index){}
	/*. bool .*/ function deleteName(/*. string .*/ $name){}
	/*. bool .*/ function extractTo(/*. string .*/ $destination, /*. mixed .*/ $entries){}
	/*. string .*/ function getArchiveComment($flags=0){}
	/*. string .*/ function getCommentIndex(/*. int .*/ $index, $flags=0){}
	/*. string .*/ function getCommentName(/*. string .*/ $name, $flags=0){}
	/*. bool .*/ function getExternalAttributesIndex(/*. int .*/ $index, /*. int .*/ &$opsys, /*. int .*/ &$attr, $flags=0){}
	/*. bool .*/ function getExternalAttributesName(/*. int .*/ $index, /*. int .*/ &$opsys, /*. int .*/ &$attr, $flags=0){}
	/*. string .*/ function getFromIndex(/*. int .*/ $index, $length = 0, $flags = 0){}
	/*. resource .*/ function getFromName(/*. string .*/ $entryname, $length = 0, $flags = 0){}
	/*. string .*/ function getNameIndex(/*. int .*/ $index, $flags = 0){}
	/*. string .*/ function getStatusString(){}
	/*. resource .*/ function getStream(/*. string .*/ $name){}
	/*. int .*/ function locateName(/*. string .*/ $name, $flags = 0){}
	/*. mixed .*/ function open(/*. string .*/ $source, $flags = 0){}
	/*. bool .*/ function renameIndex(/*. int .*/ $index, /*. string .*/ $new_name){}
	/*. bool .*/ function renameName(/*. string .*/ $name, /*. string .*/ $new_name){}
	/*. bool .*/ function setArchiveComment(/*. string .*/ $comment){}
	/*. bool .*/ function setCommentIndex(/*. int .*/ $index, /*. string .*/ $comment){}
	/*. bool .*/ function setCommentName(/*. string .*/ $name, /*. string .*/ $comment){}
	/*. bool .*/ function setExternalAttributesIndex(/*. int .*/ $index, /*. int .*/ $opsys, /*. int .*/ $attr, $flags = 0){}
	/*. bool .*/ function setExternalAttributesName(/*. string .*/ $name, /*. int .*/ $opsys, /*. int .*/ $attr, $flags = 0){}
	/*. mixed[string] .*/ function statIndex(/*. int .*/ $index, $flags = 0){}
	/*. mixed[string] .*/ function statName(/*. string .*/ $filename, $flags = 0){}
	/*. bool .*/ function unchangeAll(){}
	/*. bool .*/ function unchangeArchive(){}
	/*. bool .*/ function unchangeIndex(/*. int .*/ $index){}
	/*. bool .*/ function unchangeName(/*. string .*/ $name){}
}

/*. end_if_php_ver .*/
