<?php
require_once '/Users/Johan/Sites/johanbrook_wp3/wp-content/plugins/wordless/vendor/phamlp/haml/HamlHelpers.php';
?>  <article role="article">
  <header>
  <?php if(is_single()):?>
  <h1>
  <?php echo the_title(); ?>

  </h1>
  <?php else: ?>
  <h1>
  <?php echo link_to(get_the_title(), get_permalink()); ?>

  </h1>
  <?php endif;?>
  <small class="meta">
  <time datetime="<?php the_time("c");?>" pubdate><?php the_time("F y, 2012");?></time>
  <?php echo sep(); ?>

  <a href="<?php the_permalink();?>">Permalink</a>
  </small>
  </header>
  <div class="post-text">
  <?php echo get_the_filtered_content(); ?>

  </div>
  </article>
