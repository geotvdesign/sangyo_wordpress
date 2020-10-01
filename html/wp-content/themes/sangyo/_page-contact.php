<?php get_header(); ?>
<!-- 上記が追記するコード -->

 <section id="content">
	 <div id="content-wrap" class="container">
 		<div id="main" class="col-md-9">
      <?php
      if ( have_posts() ) :
          while ( have_posts() ) : the_post();
      ?>
          <h1><?php the_title(); ?></h1>
          <section>
            <?php the_content(); ?>
          </section>
      <?php
          endwhile;
      endif;
      ?>
 		</div>
 	</div>
 </section>
 <!-- 下記が追記するコード -->
<?php get_footer(); ?>