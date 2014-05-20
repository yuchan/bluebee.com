<?php

namespace it\icosaedro\lint\statements;
require_once __DIR__ . "/../../../../all.php";
use it\icosaedro\lint\Globals;
use it\icosaedro\lint\NamespaceResolver;
use it\icosaedro\lint\Symbol;
use it\icosaedro\lint\ParseException;

/**
 * @author Umberto Salsi <salsi@icosaedro.it>
 * @version $Date: 2014/02/12 14:52:34 $
 */
class NamespaceStatement {
	
	/**
	 * @param Globals $globals
	 * @return void
	 */
	public static function parse($globals){
		$pkg = $globals->curr_pkg;
		$pkg->resolver->close($globals->logger);
		$scanner = $pkg->scanner;
		if( $globals->isPHP(4) ){
			throw new ParseException($scanner->here(), "namespace not available (PHP 5)");
		}
		$scanner->readSym();

		if( $scanner->sym === Symbol::$sym_identifier ){
			# Detect namespace\x\y operator that starts an expression:
			# if so, resolves the name, set the current symbol with this
			# name, and return.
			if( NamespaceResolver::isAbsolute($scanner->s) ){
				// Detected: namespace\xyz
//				if( $pkg_ns !== NULL )
					$s = "\\" . $pkg->resolver->name . $scanner->s;
				return;
				
			} else {
				// Detected: namespace xyz
				$pkg->resolver->open($scanner->s);
				$scanner->readSym();
			}

		} else if( $scanner->sym === Symbol::$sym_lbrace ){
			# Detected: namespace {
			$pkg->resolver->open("");

		} else {
			throw new ParseException($scanner->here(), "unexpected symbol " . $scanner->sym);
		}

		if( $scanner->sym === Symbol::$sym_semicolon ){
			// Detected: namespace NS ;
			$scanner->readSym();
			
		} else if( $scanner->sym === Symbol::$sym_lbrace ){
			// Detected: namespace NS {
			$res = Statement::parse($globals);
			// FIXME: should check $res?
			$pkg->resolver->close($globals->logger);
			
		} else {
			throw new ParseException($scanner->here(), "unexpected symbol " . $scanner->sym);
		}
		
	}
}
