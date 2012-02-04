<?php
require_once '/Users/Johan/Sites/johanbrook_wp3/wp-content/plugins/wordless/vendor/phamlp/haml/HamlHelpers.php';
?>  <hgroup>
  <h1>
  <?php echo link_to(get_bloginfo("name"), get_bloginfo("url")); ?>

  </h1>
  <h2>
  <?php echo get_bloginfo("description"); ?>

  </h2>
  </hgroup>
