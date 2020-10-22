<?php get_header(); ?>
<section class="under-contents under-about">
  <div class="under-contents__inner">
    <h1 class="under-contents__ttl">
      <div class="under-contents__ttl__en">News</div>
      <div class="under-contents__ttl__ja">最新情報</div>
    </h1>
  </div>
</section>
<section id="content">
  <div class="container" id="content-wrap">
    <div class="col-md-9" id="main">
      <?php
      if ( have_posts() ) :
      while ( have_posts() ) : the_post();
      ?>
      <h1><?php the_title(); ?></h1>
      <section><?php the_content(); ?></section><?php
      endwhile;
      endif;
      ?>
    </div>
  </div>
</section><?php get_footer(); ?>