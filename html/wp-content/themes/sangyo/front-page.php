<?php get_header();?>
<section class="top-main-visual">
  <div class="top-main-visual__inner">
    <h1 class="top-main-visual__copy">
      <div class="top-main-visual__copy__en fadein-left">Change the world with trade</div>
      <div class="top-main-visual__copy__jp fadein-left">貿易で世界を変える</div>
    </h1>
    <div class="scroll-arrow fadein-left"><a href="http://"><span></span><span></span><span></span>
        <div class="txt">Scroll</div></a></div>
  </div>
  <div class="pattern"></div>
  <video src="<?php echo get_template_directory_uri(); ?>/images/top_video.mp4?2" autoplay="autoplay" loop="loop" muted="muted"></video>
</section>
<section class="top-infomation">
  <div class="top-infomation__inner row fadein">
    <div class="col-md-3">
      <h2 class="top-infomation__ttl">
        <div class="top-infomation__ttl__en">News</div>
        <div class="top-infomation__ttl__jp">最新情報</div>
        <div class="btn btn-outline-dark btn-lg mt-5 p-3 f-12">一覧を見る</div>
      </h2>
    </div>
    <div class="col-md-9">
      <?php
      $args = array(
      'post_type' => 'news',
      'posts_per_page' => '5'
      );
      $the_query = new WP_query($args);
      if ($the_query->have_posts()):
      ?>
      <?php while($the_query->have_posts()): $the_query->the_post(); ?>
      <div class="top-news row">
        <div class="top-news__date col-md-3"><?php the_time('Y年m月d日'); ?></div><a class="col-md-9" href="<?php the_permalink(); ?>">
          <h3 class="top-news__ttl"><?php the_title(); ?></h3></a>
      </div><?php endwhile; ?>
      <?php wp_reset_postdata(); endif; ?>
    </div>
  </div>
</section>
<section class="top-about">
  <div class="top-about__inner">
    <h2 class="top-about__ttl">
      <div class="top-about__ttl__en fadein">About</div>
      <div class="top-about__ttl__jp fadein">私たちにできること</div>
    </h2>
    <div class="top-about__detail fadein">
      <div class="top-about__detail__inner">
        <div class="top-about__detail__box">
          <div class="top-about__detail__box__inner">
            <div class="colum">
              <div class="top-about__detail__box__contents col-md-6">
                <div class="top-about__detail__box__contents__inner">
                  <p class="top-about__detail__box__contents__ttl">貿易会社として世界中に拠点を持ち、<br/>独自のルートを開拓</p>
                  <p class="top-about__detail__box__contents__info">大手貿易会社と比べ、独自の貿易ルートを開拓。コストカットを実現し、長年培ったノウハウを活用し幅広い商材を取り使っています。商材も金属やエネルギーなど社会インフラを支えるものから、消費者に直接届く食料品、医療従事者が使う専門機器まで取り扱っています。</p><a href="http://">
                    <div class="btn btn-outline-dark btn-block btn-lg">詳しくはこちら</div></a>
                </div>
              </div>
              <div class="top-about__detail__box__img col-md-6"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="top-business">
  <div class="top-business__inner">
    <h2 class="top-business__ttl">
      <div class="top-business__ttl__en fadein">Business</div>
      <div class="top-business__ttl__jp fadein">事業内容</div>
    </h2>
    <div class="colum fadein">
      <div class="top-business__box col-md-6"><a href="./metal/">
          <div class="top-business__box__bnr top-metal">
            <div class="top-business__box__bnr__inner">
              <div class="top-business__box__bnr__name fadein">金属・鉄鋼部門</div>
              <p class="top-business__box__bnr__info fadein">社会インフラを支える鉄と金属</p>
            </div>
          </div></a></div>
      <div class="top-business__box col-md-6"><a href="./food/">
          <div class="top-business__box__bnr top-food">
            <div class="top-business__box__bnr__inner">
              <div class="top-business__box__bnr__name fadein">食料部門</div>
              <p class="top-business__box__bnr__info fadein">暮らしを支える食料</p>
            </div>
          </div></a></div>
    </div>
    <div class="colum fadein">
      <div class="top-business__box col-md-6"><a href="./machine/">
          <div class="top-business__box__bnr top-machine">
            <div class="top-business__box__bnr__inner">
              <div class="top-business__box__bnr__name fadein">機械部門</div>
              <p class="top-business__box__bnr__info fadein">自動車から専門機器まで</p>
            </div>
          </div></a></div>
      <div class="top-business__box col-md-6"><a href="./energy/">
          <div class="top-business__box__bnr top-energy">
            <div class="top-business__box__bnr__inner">
              <div class="top-business__box__bnr__name fadein">エネルギー・化学品部門</div>
              <p class="top-business__box__bnr__info fadein">日本を支えるエネルギー</p>
            </div>
          </div></a></div>
    </div>
  </div>
</section>
<section class="top-blog">
  <div class="top-blog__inner">
    <h2 class="top-blog__ttl">
      <div class="top-blog__ttl__en fadein">Blog</div>
      <div class="top-blog__ttl__jp fadein">ブログ</div>
    </h2>
    <div class="top-blog__contents row">
      <?php
      $args = array(
      'post_type' => 'blog',
      'posts_per_page' => '4'
      );
      $the_query = new WP_query($args);
      if ($the_query->have_posts()):
      ?>
      <?php while($the_query->have_posts()): $the_query->the_post(); ?>
      <div class="top-blog__item col-md-3"><a href="<?php the_permalink(); ?>">
          <div class="top-blog__item__thum fadein"><?php the_post_thumbnail('post-thumbnail'); ?></div>
          <div class="top-blog__item__date fadein"><?php the_time('Y年m月d日'); ?></div>
          <div class="top-blog__item__ttl fadein">
            <h2 class="ttl"><?php the_title(); ?></h2>
          </div></a></div><?php endwhile; ?>
      <?php wp_reset_postdata(); endif; ?>
    </div>
  </div>
</section>
<section class="top-recruit">
  <div class="top-recruit__inner">
    <h2 class="top-recruit__ttl">
      <div class="top-recruit__ttl__en fadein">Recruit</div>
      <div class="top-recruit__ttl__jp fadein">採用情報</div>
    </h2>
    <div class="colum fadein"><a class="top-recruit__box human col-4" href="http://">
        <div class="top-recruit__box__figure">
          <h3 class="top-recruit__box__figure__copy fadein">求める人材</h3>
        </div></a><a class="top-recruit__box interview col-4 col-md-offset-3" href="http://">
        <div class="top-recruit__box__figure">
          <h3 class="top-recruit__box__figure__copy fadein">インタビュー</h3>
        </div></a><a class="top-recruit__box application col-4 col-md-offset-3" href="http://">
        <div class="top-recruit__box__figure">
          <h3 class="top-recruit__box__figure__copy fadein">募集要項</h3>
        </div></a></div>
  </div>
</section>
<section class="top-contact">
  <div class="top-contact__inner">
    <h2 class="top-contact__ttl">
      <div class="top-contact__ttl__en fadein">Contact</div>
      <div class="top-contact__ttl__jp fadein">お問い合わせ</div>
    </h2>
    <p class="top-contact__detail fadein">ご意見・ご質問など、お問い合わせは、下記フォームからお願いいたします。</p>
    <div class="top-contact__btn fadein"><a href="http://">Contact Form</a></div>
  </div>
</section><?php get_footer();?>