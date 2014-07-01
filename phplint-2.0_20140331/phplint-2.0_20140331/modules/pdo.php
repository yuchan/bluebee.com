<?php
/** PHP Data Objects (PDO).


See: {@link http://www.php.net/manual/en/book.pdo.php}
@package pdo
*/

/*.
if_php_ver_4
	PDO_NOT_AVAILABLE_UNDER_PHP4)
end_if_php_ver


require_module 'spl';
.*/


class PDOException extends Exception
{
	/**
	 * Corresponds to PDO::errorInfo() or PDOStatement::errorInfo().
	 */
	public $errorInfo = /*. (array[int]mixed) .*/ NULL;
}


class PDOStatement
#implements Traversable
# FIXME: cannot implement Traversable in user defined classes...
#        Why they did not implement Iterator or IteratorAggregate instead?
{

public /*. string .*/ $queryString;

/*. bool .*/ function bindColumn(/*. mixed .*/ $column, /*. return mixed .*/ &$param
	/*., args .*/){}
/*. bool .*/ function bindParam(/*. mixed .*/ $parameter, /*. return mixed .*/ &$variable /*., args .*/){}
/*. bool .*/ function bindValue(/*. mixed .*/ $parameter, /*. mixed .*/ $value
	/*., args .*/){}
/*. bool .*/ function closeCursor(){}
/*. int .*/ function columnCount(){}
/*. string .*/ function errorCode(){}
/*. array[int]mixed .*/ function errorInfo(){}
/*. bool .*/ function execute(/*. args .*/){}
/*. mixed .*/ function fetch(/*. args .*/){}
/*. array[int]mixed .*/ function fetchAll(/*. args .*/){}
/*. string .*/ function fetchColumn(/*. args .*/){}
/*. mixed .*/ function getAttribute(/*. int .*/ $attribute){}
/** EXPERIMENTAL: please read the manual. */
/*. mixed .*/ function getColumnMeta(/*. int .*/ $column){}
/*. bool .*/ function nextRowset(){}
/*. int .*/ function rowCount(){}
/*. bool .*/ function setAttribute(/*. int .*/ $attribute, /*. mixed .*/ $value){}
/*. bool .*/ function setFetchMode(/*. int .*/ $_see__manual_ /*., args .*/){}

}


class PDO
{

/** WARNING: all the constants are dummy values. */
const
	PARAM_BOOL  = 1,
	PARAM_NULL  = 1,
	PARAM_INT  = 1,
	PARAM_STR  = 1,
	PARAM_LOB  = 1,
	PARAM_STMT  = 1,
	PARAM_INPUT_OUTPUT  = 1,
	FETCH_LAZY  = 1,
	FETCH_ASSOC  = 1,
	FETCH_NAMED  = 1,
	FETCH_NUM  = 1,
	FETCH_BOTH  = 1,
	FETCH_OBJ  = 1,
	FETCH_BOUND  = 1,
	FETCH_COLUMN  = 1,
	FETCH_CLASS  = 1,
	FETCH_INTO  = 1,
	FETCH_FUNC  = 1,
	FETCH_GROUP  = 1,
	FETCH_UNIQUE  = 1,
	FETCH_CLASSTYPE  = 1,
	FETCH_SERIALIZE  = 1,
	FETCH_PROPS_LATE  = 1,
	FETCH_KEY_PAIR = 1,
	ATTR_AUTOCOMMIT  = 1,
	ATTR_PREFETCH  = 1,
	ATTR_TIMEOUT  = 1,
	ATTR_ERRMODE  = 1,
	ATTR_SERVER_VERSION  = 1,
	ATTR_CLIENT_VERSION  = 1,
	ATTR_SERVER_INFO  = 1,
	ATTR_CONNECTION_STATUS  = 1,
	ATTR_CASE  = 1,
	ATTR_CURSOR_NAME  = 1,
	ATTR_CURSOR  = 1,
	ATTR_DRIVER_NAME = "",
	ATTR_ORACLE_NULLS  = 1,
	ATTR_PERSISTENT  = 1,
	ATTR_STATEMENT_CLASS  = 1,
	ATTR_FETCH_CATALOG_NAMES  = 1,
	ATTR_FETCH_TABLE_NAMES  = 1,
	ATTR_STRINGIFY_FETCHES  = 1,
	ATTR_MAX_COLUMN_LEN  = 1,
	ATTR_DEFAULT_FETCH_MODE  = 1,
	ATTR_EMULATE_PREPARES  = 1,
	ERRMODE_SILENT  = 1,
	ERRMODE_WARNING  = 1,
	ERRMODE_EXCEPTION  = 1,
	CASE_NATURAL  = 1,
	CASE_LOWER  = 1,
	CASE_UPPER  = 1,
	NULL_NATURAL  = 1,
	NULL_EMPTY_STRING  = 1,
	NULL_TO_STRING  = 1,
	FETCH_ORI_NEXT  = 1,
	FETCH_ORI_PRIOR  = 1,
	FETCH_ORI_FIRST  = 1,
	FETCH_ORI_LAST  = 1,
	FETCH_ORI_ABS  = 1,
	FETCH_ORI_REL  = 1,
	CURSOR_FWDONLY  = 1,
	CURSOR_SCROLL  = 1,
	ERR_NONE = "",
	PARAM_EVT_ALLOC  = 1,
	PARAM_EVT_FREE  = 1,
	PARAM_EVT_EXEC_PRE  = 1,
	PARAM_EVT_EXEC_POST  = 1,
	PARAM_EVT_FETCH_PRE  = 1,
	PARAM_EVT_FETCH_POST  = 1,
	PARAM_EVT_NORMALIZE  = 1;

/*. void .*/ function __construct(/*. string .*/ $dsn /*., args .*/)
	/*. throws PDOException .*/ {}
/*. bool .*/ function beginTransaction(){}
/*. bool .*/ function commit(){}
/*. string .*/ function errorCode(){}
/*. array[int]string .*/ function errorInfo(){}
/*. mixed .*/ function exec(/*. string .*/ $statement){}
/*. mixed .*/ function getAttribute(/*. int .*/ $attribute){}
/*. string .*/ function lastInsertId(/*. args .*/){}
/** WARNING: it returns FALSE on error. */ 
/*. PDOStatement .*/ function prepare(/*. string .*/ $statement /*., args .*/){}
/** WARNING: read the manual for more arguments and return values. */
/*. PDOStatement .*/ function query(/*. string .*/ $statement /*., args .*/){}
/*. string .*/ function quote(/*. string .*/ $str /*., args .*/){}
/*. bool .*/ function rollBack(){}
/*. bool .*/ function setAttribute(/*. int .*/ $attribute, /*. mixed .*/ $value)/*. triggers E_WARNING .*/{}

}
