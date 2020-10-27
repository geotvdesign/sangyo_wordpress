<?php get_header(); ?>
<section class="under-contents under-news">
  <div class="under-contents__inner">
    <h1 class="under-contents__ttl">
      <div class="under-contents__ttl__en">News</div><?php if ( is_object_in_term($post->ID, 'news_category','info') ): ?>
      <div class="under-contents__ttl__ja">お知らせ</div><?php elseif ( is_object_in_term($post->ID, 'news_category','topics') ): ?>
      <div class="under-contents__ttl__ja">トピックス</div><?php endif; ?>
    </h1>
  </div>
</section>
<section class="info">
  <div class="info__inner row">
    <div class="info__contents col-md-8">
      <ul><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <li class="info-list">
          <div class="info-cat">
            <?php
            $term = get_the_terms($post->ID,'news_category');
            echo $term[0]->name;
            ?>
          </div>
          <div class="info-list__date"><?php the_time('Y年m月d日'); ?></div><!-- タイトルにリンクを付けて表示 -->
          <div class="info-list__ttl"><h3><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h3></div><!-- 抜粋を表示 -->
          <div class="info-list__info"><?php the_excerpt(); ?></div>
        </li><?php endwhile; ?>
        <?php endif; ?>
        <?php wp_pagenavi(); ?>
      </ul>
    </div>
    <div class="info__sidebar col-md-4"><?php get_sidebar('news'); ?></div>
  </div>
</section><?php get_footer(); ?>