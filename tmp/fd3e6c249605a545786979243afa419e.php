<?php
require_once '/Users/Johan/Sites/johanbrook_wp3/wp-content/plugins/wordless/vendor/phamlp/haml/HamlHelpers.php';
?>  <!DOCTYPE html>
  <html>
  <head>
<!--Charset  -->  <meta charset="utf-8" />
<!--Title  -->  <title><?php echo get_page_title(bloginfo("name"), " - "); ?></title>
<!--Stylesheets  -->  <?php echo stylesheet_link_tag("master"); ?>

<!--HTML5 Shiv  -->

<!--[if lt IE 9]>
  <?php echo javascript_include_tag("http://html5shiv.googlecode.com/svn/trunk/html5.js"); ?>


<![endif]-->
  <?php wp_head(); ?>
  </head>
  <body>
  <header role="banner">
  <?php echo render_partial("layouts/header");; ?>

  </header>
  <section role="main">
  <?php echo yield(); ?>

  </section>
  <?php echo javascript_include_tag("http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"); ?>

  <?php echo javascript_include_tag("main"); ?>

  </body>
  </html>
