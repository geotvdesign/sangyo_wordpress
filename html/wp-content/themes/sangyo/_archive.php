<?php get_header(); ?>
<!-- 上記が追記するコード -->

 <section id="content">
	 <div id="content-wrap" class="container">
 		<div id="main" class="col-md-9">
      <?php
      $args = array(
        'post_type' => 'news',// 投稿タイプを指定
        'posts_per_page' => 10,// 表示する記事数
      );
      $news_query = new WP_Query( $args );
      if ( $news_query->have_posts() ):
        while ( $news_query->have_posts() ):
          $news_query->the_post();
      ?>

      <!-- ここにhtml -->

      <?php endwhile;
      endif;
      wp_reset_postdata();
      ?>
 		</div>
 		<div id="sidebar" class="col-md-3">
			<?php get_sidebar(); ?>
			<!-- 上記が追記するコード -->
 		</div>
 	</div>
 </section>
 <!-- 下記が追記するコード -->
<?php get_footer(); ?>