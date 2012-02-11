<?php

/*
 * Configure Wordless preferences here.
 */

if(ENV == ENV_PRODUCTION){
	Wordless::set_preference("js.yui_compress",      true);
	Wordless::set_preference("js.yui_munge",         true);
}
else {
	Wordless::set_preference("assets.cache_enabled",  false);
}

Wordless::set_preference("css.compass_path", "/Users/Johan/.wordless_compass");
Wordless::set_preference("js.ruby_path", "/Users/Johan/.wordless_ruby");