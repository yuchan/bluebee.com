<?php

namespace it\icosaedro\lint\statements;
require_once __DIR__ . "/../../../../all.php";
use it\icosaedro\lint\Globals;
use it\icosaedro\lint\Symbol;
use it\icosaedro\lint\NamespaceResolver;
use it\icosaedro\lint\ParseException;

/**
 * @author Umberto Salsi <salsi@icosaedro.it>
 * @version $Date: 2014/02/12 14:52:34 $
 */
class UseStatement {
	
	/**
	 * Parse "use TARGET [ as ALIAS];".
	 * @param Globals $globals
	 * @return void
	 */
	public static function parse($globals){
		$pkg = $globals->curr_pkg;
		$scanner = $pkg->scanner;
		if( $globals->isPHP(4) ){
			throw new ParseException($scanner->here(), "`use' not available (PHP 5)");
		}
		$scanner->readSym();
		while(TRUE){
			/* Parse target: */
			$globals->expect(Symbol::$sym_identifier, "expected namespace name");
			$target = $scanner->s;
			if( NamespaceResolver::isAbsolute($target) ){
				// FIXME: \ seems to be required in global NS - check
				$globals->logger->notice($scanner->here(), "useless leading `\\' in path namespace: path namespaces are always absolute");
				$target = substr($target, 1);
			}
			$scanner->readSym();

			/* Parse alias: */
			if( $scanner->sym === Symbol::$sym_as ){
				$scanner->readSym();
				$globals->expect(Symbol::$sym_identifier, "expected identifier");
				$alias = $scanner->s;
				if( ! NamespaceResolver::isIdentifier($alias) ){
					$globals->logger->error($scanner->here(), "expected identifier, found $alias");
					$alias = NULL; // recover
				}
				$scanner->readSym();
			} else {
				$alias = NULL;
			}
			$pkg->resolver->addUse($target, $alias, $scanner->here());

			if( $scanner->sym === Symbol::$sym_comma ){
				$scanner->readSym();
			} else {
				break;
			}
		}
		$globals->expect(Symbol::$sym_semicolon, "expected `;'");
		$scanner->readSym();
	}
	
}

