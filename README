# Kohana-Real post process integration

This module allows to write caches, logs or anything else to be processed after user got the content.
This is a very early version but works so far as expected.
You can have destruct functions in classes which gets called after the output of the content.
This means you can easily process data after content flushing.

A little workaround is needed in the controller, because of Request::factory()->execute()… in the index.php.
This function calls your controller by the php reflection api, which means that at the end of the script
the controller gets destructed. You can "overwrite" this behaviour. For further instructions
read the usage part.


## Requirements

* Dont use any exits in the middle of your scripts, just return nothing otherwise it wont work.

## Usage

	The module extends the Kohana_Request controller for outputing content.
	It cleans all output buffers and prepends it to the body.
	Then it gets the user headers for compression and compresses the data, calculate its length and
	set the specified header data. In the end it flushes everything out.
	
	Controller:
	The controller got extended and you can now set a variable $this->post_process to true and the before function does everything for you.
	If you dont know, if your controller needs to process something in the destruct function, then you can also
	add it by your own in any function by calling: $this->post_process();

## Installation
	
	As always in koahana you need to check this module out to "realpostprocess" and add to your bootstrap at the modules part:
	'realpostprocess'=>MODPATH.'realpostprocess'. Thats it!


Any enhancements are welcome.