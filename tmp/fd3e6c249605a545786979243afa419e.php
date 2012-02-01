<?php
require_once '/Users/Johan/Sites/johanbrook_wp3/wp-content/plugins/wordless/vendor/phamlp/haml/HamlHelpers.php';
?><!DOCTYPE html>
<html>
<head>
  <?php echo render_partial("layouts/head"); ?>

</head><body>
<div class="page-wrapper">
<header class="site-header">
  <?php echo render_partial("layouts/header"); ?>

</header><section class="site-content">
  <?php echo yield(); ?>

</section><footer class="site-footer">
  <?php echo render_partial("layouts/footer"); ?>

</footer>  <?php echo javascript_include_tag("http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"); ?>

  <?php echo javascript_include_tag("application"); ?>

</div></body></html>