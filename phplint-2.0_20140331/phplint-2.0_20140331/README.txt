PHPLint 2
=========

Copyright 2005-2014 by Umberto Salsi <phplint@icosaedro.it>
More info: http://www.icosaedro.it/phplint/

PHPLint is a validator and documentator for PHP sources. It is a set of PHP
source files, mostly libraries of general use, one of which is the PHPLint
program itself. Some batch files are also provided to help starting the
PHP CLI (command line interface) interpreter and run the PHPLint validator
itself.



What you will need
------------------

1. A computer with Windows or Unix or Linux or any other operating system for
   which a PHP interpreter is available.

2. Download and install the PHP interpreter version 5.3 or above.
   On Windows you may choose the NTS (non thread safe) version, 32-bits or
   64-bits depending on your system.
   
3. Dowload the PHPLint package as detailed below (if you are reading these
   notes, it is already there :-).

4. If you want to run the GUI interface of the PHPLint validator (phplint.tcl)
   you will need the Tcl/Tk interpreter from http://www.tcl.tk

5. A text editor, for example: Notepad, Notepad++, vim, etc. An IDE like
   NetBeans with the PHP plug-in is very handy to manage large projects.


Contents
--------

doc/
	Tutorial and reference manual.

stdlib/
	This directory is the root of all PHP source files of PHPLint and several
	other useful packages and classes. The namespace scheme exactly matches
	the structure of this directory, so the it\icosaedro\lint namespace
	is just the stdlib/it/icosaedro/lint/ directory.

stdlib/it/icosaedro/lint/PHPLint.php
	Command line interface for the PHPLint validator. Its task is simply
	to read the arguments from the command line and then to start the
	actual validator by calling the it\icosaedro\lint\Linter::main()
	function.

modules/
	Contains the "modules" stub files that PHPLint reads when it encounters
	a "/*. require_module 'xxx'; .*/" meta-code statement. In this case,
	PHPLint parses the file modules/xxx.php to learn which are the resources
	provided by the xxx extension of PHP. For example, 'standard' defines
	most of the commonly used constants, functions and classes of PHP,
	ranging from strlen() to DateTime. These ARE NOT actual PHP programs
	and are never actually needed to run a PHP program, but are requested
	by PHPLint only.

php.bat (Windows)
php (Unix/Linux)
	Shell script that invokes the PHP interpreter currently set in your
	system and passes the right php.ini as argument. You must edit this file
	to set the path of your PHP installation.

phpl.bat (Windows)
phpl (Unix/Linux)
	Shell script that starts PHPLint. For example, you may type:
	
		phpl myprogram.php
	
	to see the PHPLint report about your program.

example-*.php
	Some sample programs you may test PHPLint on.

test/stdlib
	Contains the test programs for some classes of the standard library.
	Each program has name "test-Class.php" where "Class" is the name of the
	class being tested. For example, to test Linter:

		php test/stdlib/it/icosaedro/lint/test-Linter.php

	This specific test program runs Linter on every source test available in
	the test/list directory (see below).

test/list/
	Contains several test source files used to check the Linter class.
	Naming convention on these files: "5-xxx.php" means it is a PHP 5 test
	source; "5-xxx.report.txt" is the generated report; "5-xxx.DIFFERS.txt"
	is the new, different report generated right now: if ok, delete the
	previous report and remove "DIFFERS." from the name of the new one.


Download the latest PHPLint package
-----------------------------------
Please check for new versions of the program at:

	http://www.icosaedro.it/phplint/

The version of the program follows the pattern "a.b_YYYYMMDD" where "a" is
the major version, "b" is the minor version, and "YYYYMMDD" is the release
date of the build.


Download the PHPLint current snapshot
-------------------------------------
You may also download the current version of the program, still under
development, from the CVS

	http://cvs.icosaedro.it:8080/viewvc/public/phplint/

then click on the link "Download this directory as GNU tarball" to download
the whole content of the directory. Save the file phplint.tar.gz anywhere
you want, and extract the content. On Windows you may use the 7-Zip file
archiver (http://www.7-zip.org).


Download and keep updated with CVS
----------------------------------
On Windows, install a CVS client program (for example from http://www.cvsnt.org)
then type these commands from the terminal:

	C:\> cd myprograms
	C:\myprograms> setx CVSROOT :pserver:anonymous:@cvs.icosaedro.it/home/cvs/public
	C:\myprograms> cvs checkout phplint

and later, to check for updates:

	C:\> cd c:\myprograms\phplint
	C:\myprograms\phplint> cvs update -dP

On Unix/Linux:

	$ cd myprograms
	$ export CVSROOT=:pserver:anonymous:@cvs.icosaedro.it/home/cvs/public
	$ cvs checkout phplint

and later, to check for updates:

	$ cd myprograms/phplint
	$ cvs update -dP


Installation
------------
There are 2 script files that are very handy while using PHPLint from the
command line: they are php.bat and phpl.bat (Windows) or php and phpl (on Unix
and Linux). The first script launches the PHP CLI interpreter and, in turn, the
latter uses the first to launch the PHPLint program, which is located at
stdlib/it/icosaedro/lint/PHPLint.php. So, the first and only thing to do is
to set in the first script the right path to the PHP CLI interpeter.

On Windows, use your preferred text editor to open the script file

	php.bat

or on Unix/Linux open the script file

	php

and set the PHP variable with the actual path to your "php.exe" program.
On Windows its name should be just "php.exe". On Unix/Linux it might be
"php-cli". Anyway, it is the CLI version of the PHP interpreter you must
set here.

	ATTENTION. You must really set the path to the PHP CLI executable of
	PHP, not the "CGI" version, not the "WIN" version. Setting the wrong
	PHP executable here may result in strange error messages (fails to
	access some file, or nothing is shown at all). To make sure the PHP
	CLI be configured, type this command:

	C:\phplint> php -v    (Windows)
	~/phplint $ ./php -v  (Unix, Linux)
	PHP 5.5.9 (cli) (built: Feb  5 2014 13:02:16)
	Copyright (c) 1997-2014 The PHP Group
	Zend Engine v2.5.0, Copyright (c) 1998-2014 Zend Technologies

This other command tells you which are the PHP extensions currently enabled:

	php -m

You may want to edit stdlib/php.ini to enable more estensions, for example
MySQL, sockets, etc.

The phpl.bat (Windows) and phpl (on Unix/Linux) shell scripts use the
script above to launch PHPLint.


Running PHPLint from command line
---------------------------------
Simply type on the terminal:

	cd directory/of/phplint
	phpl myprogram.php

or even, to save the report on file:

	phpl myprogram.php > report.txt

NOTE: On Unix/Linux you may need to type "./phpl" rather than "phpl".
      It is useful to set a symbolic link of this script on some
      directory in the $PATH, so that you may start phpl from any
      location.

To see which is the version of PHPLint you are running:

	phpl --version

To see all the options of PHPLint, type:

	phpl --help


Running PHPLint from GUI tool
-----------------------------
The phplint.tcl program is very handy, as it displays the report about
your source file and updates it continously as the source file changes,
so that you may edit the source, save it, and see immediately the result.

Before running phplint.tcl, you need to install the tcl/tk interpreter as
specified in the installation requirements. On Windows, the ".tcl" extension
must be associated to the "wish.exe" executable program of tcl/tk.
On Unix/Linux the executable bit flag may have to be set with the command
"chmod +x phplint.tcl", then the first line of the script takes care to
start the "wish" interpreter installed in the usual directory "/usr/bin/wish".

You may start phplint.tcl even from the command line:

	phplint.tcl myprogram.php


Generating the documents from the sources
-----------------------------------------
The PHPLint program allows to generate the HTML documents from the source by
simply adding the --doc option before the name of the source file. Example:

	phpl --doc MyProgr.php

generates MyProgr.html in the same directory of the source.

The GUI has a specific button name "Doc" to do that and to see immediately the
result in the browser.

You can also generate all the documents of a source tree with a single command
line using the utils/GenerateDoc.php program as described below.

You may start generating the documentation about the module files. Copy and
paste this command to your terminal:

	php utils/GenerateDoc.php --is-module --move modules doc/modules modules

that will generate the HTML documents about all the modules/*.php files and will
save the result under the doc/modules directory. The --is-module option relaxes
some checks that PHPLint should not make on these special files because they are
not actual PHP programs. The --move SRCROOT DOCROOT moves the generated HTML
files from the specified source root to the destination documentation root
directory, creating all the intermediate sub-directory as necessary.

The following command will do the same for the standard library:

	php utils/GenerateDoc.php --move stdlib doc/stdlib stdlib

This latter command take some time, and may require several minutes to complete
(about 20 minutes, on my 5 years old PC), so be patient.

Later, you may add or update the documentation about your specific programs
issuing a command similar to this one:

	php utils/GenerateDoc.php --move stdlib doc/stdlib stdlib/com/mycompany

Once all the documentation has been generate, you may navigate the doc/
directory with your preferred WEB browser.

Enjoy!

Umberto Salsi <salsi@icosaedro.it>
Bologna, 2014-03-10
