<?php
require_once '/Users/Johan/Sites/johanbrook_wp3/wp-content/plugins/wordless/vendor/phamlp/haml/HamlHelpers.php';
?>  <?php global $post;?>
  <article role="article" <?php if(get_post_format()) echo 'class="'.get_post_format().'"';?>>
  <header>
  <?php if(get_post_format() == "link"):?>
  <em title="This is a linked post. Clicking the heading will take you to the target" class="suphead">
  <span class="label">Linked</span> <span class="link-url"><?php echo get_post_meta($post->ID, LINK, true);?></span>
  </em>
  <h1>
  <?php echo link_to(get_the_title() . " →",
  get_post_meta($post->ID, LINK, true),
  array("title" => get_post_meta($post->ID, LINK_NAME, true))
  ); ?>
  </h1>
  <?php else: ?>
  <?php if(is_single()):?>
  <h1>
  <?php echo the_title(); ?>

  </h1>
  <?php else:?>
  <h1>
  <?php echo link_to(get_the_title(), get_permalink()); ?>

  </h1>
  <?php endif; endif;?>
  <small class="meta">
  <time datetime="<?php the_time("c");?>" pubdate><?php the_time("F y, 2012");?></time>
  <?php echo sep(); ?>

  <a href="<?php the_permalink();?>">Permalink</a>
  </small>
  </header>
  <div class="post-text">
  <?php
  if(is_single() || get_post_format() == "link")
  echo get_the_filtered_content();
  else
  the_excerpt();
  ?>
  </div>
  </article>
