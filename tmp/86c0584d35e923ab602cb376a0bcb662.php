<?php
require_once '/Users/Johan/Sites/johanbrook_wp3/wp-content/plugins/wordless/vendor/phamlp/haml/HamlHelpers.php';
?><h2>
  Archive
</h2><ul class="archive">
  <?php while (have_posts()) { ?>

  <?php the_post(); ?>
<li>
  <?php echo render_partial("posts/post"); ?>

</li><?php } ?>
</ul>