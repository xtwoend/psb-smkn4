<?php

return array(

    'debug' => false,
    'binpath' => 'lib/',
	'binfile' => 'wkhtmltopdf.exe',
	'output_mode' => 'I', // D ->  Force the client to download PDF file , I -> When possible, force the client to embed PDF file, S ->  Returns the PDF file as a string, F -> PDF file is saved on the server. The path+filename is returned 
	'page_size'	=> 'A4',
	'tmppath'	=> public_path('/') ,
	'orientation' => 'Portrait'
);