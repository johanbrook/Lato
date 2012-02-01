<?php
require_once '/Users/Johan/Sites/johanbrook_wp3/wp-content/plugins/wordless/vendor/phamlp/haml/HamlHelpers.php';
?><!--Charset  --><meta content="text/html;charset=UTF-8" http-equiv="Content-type" /><!--Title  --><title>
  <?php echo get_page_title(bloginfo('name'), " – "); ?>

</title><!--Stylesheets  -->  <?php echo stylesheet_link_tag("screen"); ?>

<!--HTML5 Shiv  -->

<!--[if lt IE 9]>
  <?php echo javascript_include_tag("http://html5shiv.googlecode.com/svn/trunk/html5.js"); ?>


<![endif]-->
  <?php wp_head(); ?>
