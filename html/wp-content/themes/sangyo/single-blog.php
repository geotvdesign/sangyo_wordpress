<?php get_header(); ?>
<section class="under-contents under-blog">
  <div class="under-contents__inner">
    <h1 class="under-contents__ttl">
      <div class="under-contents__ttl__en">Blog</div>
      <div class="under-contents__ttl__ja">ブログ</div>
    </h1>
  </div>
</section>
<section class="info">
  <div class="info__inner row">
    <div class="info__contents col-md-8">
      <?php
      if ( have_posts() ) :
      while ( have_posts() ) : the_post();
      ?>
      <div class="info-cat">
        <?php
        $term = get_the_terms($post->ID,'blog_category');
        echo $term[0]->name;
        ?>
      </div>
      <h1 class="info__contents__ttl"><?php the_title(); ?></h1>
      <div class="info__contents__date"><?php the_time('Y年m月d日'); ?></div>
      <div class="info__contents__info"><?php the_content(); ?></div><?php wp_pagenavi(); ?>
      <?php
      endwhile;
      endif;
      ?>
      <div class="pager">
        <div class="pager-inner">
          <div class="prev"><?php previous_post_link('%link', '前の記事へ'); ?></div>
          <div class="next"><?php next_post_link('%link', '次の記事へ'); ?></div>
        </div>
      </div>
    </div>
    <div class="info__sidebar col-md-4"><?php get_sidebar('blog'); ?></div>
  </div>
</section><?php get_footer(); ?>