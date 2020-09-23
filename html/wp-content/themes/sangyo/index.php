<?php get_header(); ?> <!--header.php読み込み-->
 <section id="content">
	 <div id="content-wrap" class="container">
 		<div id="main" class="col-md-9">
 			<h1 class="text-center">個人事業主向けWebスクール ウェブストエイト</h1>
 			<p>
 				ウェブストエイトは自分でホームページ制作・Web集客したい方向けの
 				少人数制個別指導のスクール・塾です！
 				<br><br>
 				継続6ヶ月コースとお試し1ヶ月コースから選択して受講できます。
 			</p>
 			<div class="row">
 				<div class="col-md-6">
 					<p><img src="<?php echo get_template_directory_uri(); ?>/images/pc-wood.jpg" alt="6ヶ月コース画像"></p>
 					<h2 class="text-center">しっかり6ヶ月コース</h2>
 					<p>ホームページ作成からWeb集客まで一通り習得して売上拡大したい方向けのコース</p>

 				</div>
 				<div class="col-md-6">
 					<p><img src="<?php echo get_template_directory_uri(); ?>/images/pc-leaf.jpg" alt="1ヶ月コース画像"></p>
 					<h2 class="text-center">お試し1ヶ月コース</h2>
 					<p>特定範囲のみ習いたい・まずは試しに受講してみたい方向けのコース</p>
 				</div>
 			</div>
 			<p class="text-center">
 				<br>
 				お申し込みは<a href="https://webst8.com">こちらから</a>
 				<br><br>
 			</p>
			 <div id="posts">
				<h1>記事一覧</h1>
				<hr>
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
					?>
						<h2>
				<?php the_time('Y年n月j日'); ?>&nbsp;&nbsp;
							<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<hr>
					<?php
						endwhile;
					endif;
					?>
				</div>
 		</div>
 		<div id="sidebar" class="col-md-3">
		 <?php get_sidebar(); ?>
 		</div>
 	</div>
 </section>
 <?php get_footer(); ?>