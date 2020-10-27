
<?php get_header(); ?><!-- 上記が追記するコード -->
<section class="under-contents under-news">
  <div class="under-contents__inner">
    <h1 class="under-contents__ttl">
      <div class="under-contents__ttl__en">News</div>
      <div class="under-contents__ttl__ja">最新情報一覧</div>
    </h1>
  </div>
</section>
<section class="info">
  <div class="info__inner row">
    <div class="info__contents col-md-8">
    <!-- ループで一覧を表示 -->
    <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>
      <div <?php post_class(); ?>>
        <!-- タイトルにリンクを付けて表示 -->
        <h3><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h3>
        <!-- 抜粋を表示 -->
        <?php the_excerpt(); ?>
      </div>
      <?php endwhile; ?>
    <?php endif; ?>
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
      <?php endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </div>
    <div class="info__sidebar col-md-4"><?php get_sidebar('news'); ?></div>
  </div>
</section><?php get_footer(); ?>