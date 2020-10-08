<?php get_header();?>
<section class="under-contents under-contact">
  <div class="under-contents__inner">
    <h1 class="under-contents__ttl">
      <div class="under-contents__ttl__en">Contact</div>
      <div class="under-contents__ttl__ja">お問い合わせ</div>
    </h1>
  </div>
</section>
<section></section><?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>
<?php get_footer();?>