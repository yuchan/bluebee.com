<?php

namespace it\icosaedro\lint;
require_once __DIR__ . "/../../../all.php";
//use it\icosaedro\io\File;
//use it\icosaedro\io\OutputStream;
//use it\icosaedro\io\IOException;
//use it\icosaedro\utils\Strings;
use it\icosaedro\io\ResourceOutputStream;


/**
 * PHPLint - Validator and documentator for PHP programs.
 * Runs PHPLint from the command line and displays the report
 * on standard output.
 * Syntax of the command:
 * <blockquote><pre>
 * php PHPLint.php [OPTIONS] file.php ...
 * </pre></blockquote>
 * To get a list of the available options, use the <code>--help</code>
 * option. The program exit status is 0 (no errors) or 1 (errors found).
 * Info, download and updates: {@link http://www.icosaedro.it/phplint}.
 * @author Umberto Salsi <salsi@icosaedro.it>
 * @copyright 2014 by icosaedro.it di Umberto Salsi <phplint@icosaedro.it>
 * @version $Date: 2014/02/20 16:14:07 $
 * @package PHPLint
 */

/*. private .*/ $timer = new \it\icosaedro\utils\Timer();
$timer->start();
//$os = new ResourceOutputStream( fopen("php://stdout", "wb") );
/*. private .*/ $os = new ResourceOutputStream(STDOUT);
/*. private .*/ $err = Linter::main($os, $argv);
$os->writeBytes("Total execution time: $timer\n");
exit($err);
