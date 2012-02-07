<?php
define("LINK", "jb_link");
define("LINK_NAME", "jb_link_name");

define("EXCERPT_LENGTH", 40);

define("GOOGLE_ANALYTICS_ID", "UA-4471592-8");

define("ENV_DEVELOPMENT", 10);
define("ENV_PRODUCTION", 1);


$host = $_SERVER['HTTP_HOST'];
$allowed_sites = array(
	"johanbrook.dev",
	"localhost"
);
$env = (in_array($host, $allowed_sites) || (isset($_GET['dev']) && $_GET['dev'] == 1)) ? ENV_DEVELOPMENT : ENV_PRODUCTION;

define("ENV", $env);

?>