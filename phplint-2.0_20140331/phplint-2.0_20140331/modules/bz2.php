<?php
/**
Bzip2 Compression Functions.

See: {@link http://www.php.net/manual/en/ref.bzip2.php}
@package bz2
*/


/*. int   .*/ function bzerrno(/*. resource .*/ $bz){}
/*. string.*/ function bzerrstr(/*. resource .*/ $bz){}
/*. array .*/ function bzerror(/*. resource .*/ $bz){}
/*. string.*/ function bzcompress(/*. string .*/ $source /*., args .*/){}
/*. string.*/ function bzdecompress(/*. string .*/ $source /*., args .*/){}
/*. string.*/ function bzread(/*. int .*/ $bz /*., args .*/){}
/*. resource .*/ function bzopen(/*. args .*/){}
