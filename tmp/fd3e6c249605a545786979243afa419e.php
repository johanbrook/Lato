<?php
require_once '/Users/Johan/Sites/johanbrook_wp3/wp-content/plugins/wordless/vendor/phamlp/haml/HamlHelpers.php';
?>  <!DOCTYPE html>
  <html>
  <head>
  <meta charset="utf-8" />
  <!-- Title -->
  <title><?php echo get_page_title(bloginfo("name"), " - "); ?></title>
  <!-- Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Lato:400,700|PT+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <!-- Stylesheet -->
  <?php echo stylesheet_link_tag("master"); ?>

  <!-- Hashgrid -->
  <?php echo stylesheet_link_tag("hashgrid"); ?>

  <!--[if lt IE 9]>
  <?php echo javascript_include_tag("http://html5shiv.googlecode.com/svn/trunk/html5.js"); ?>

  <![endif]-->
  <?php wp_head(); ?>
  </head>
  <body>
  <div class="sidebar">
  <?php echo render_partial("layouts/sidebar"); ?>

  </div>
  <section role="main">
  <?php echo yield(); ?>

  </section>
  <footer role="contentinfo">
  <?php echo render_partial("layouts/footer");; ?>

  </footer>
  <?php echo javascript_include_tag("http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"); ?>

  <?php echo javascript_include_tag("jquery.hashgrid"); ?>

  <?php echo javascript_include_tag("main"); ?>

  </body>
  </html>
