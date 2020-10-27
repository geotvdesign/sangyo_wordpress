<?php
function sangyo_setup() {
   //ここに関数の中身を記述します。
   add_theme_support( 'post-thumbnails' ); //アイキャッチ画像をON
   add_theme_support( 'menus');  //メニュー機能をON
   add_theme_support( 'post-thumbnails' );//アイキャッチ画像のサイズを指定する
   set_post_thumbnail_size( 200, 200, true );//アイキャッチ画像のサイズを指定する
}
add_action( 'after_setup_theme', 'sangyo_setup' ); //after_setup_themeアクションフック※に登録します。

// カスタム投稿タイプ
function create_post_type() {
   $exampleSupports = [  // supports のパラメータを設定する配列（初期値だと title と editor のみ投稿画面で使える）
     'title',  // 記事タイトル
     'editor',  // 記事本文
     'thumbnail',  // アイキャッチ画像
     'revisions',  // リビジョン
   ];
   register_post_type( 'news',  // カスタム投稿ID
      array(
       'label' => 'News',  // カスタム投稿名(管理画面の左メニューに表示されるテキスト)
       'public' => true,  // 投稿タイプをパブリックにするか否か
       'has_archive' => true,  // アーカイブ(一覧表示)を有効にするか否か
       'menu_position' => 5,  // 管理画面上でどこに配置するか今回の場合は「投稿」の下に配置
       'show_in_rest' => true,//新エディタ Gutenberg を有効化（REST API を有効化）
       'supports' => $exampleSupports, // 投稿画面でどのmoduleを使うか的な設定
       'taxonomies' => array('news_category'),  //使用するタクソノミー
       'has_archive' => true//アーカイブ表示
      )
   );
   register_post_type( 'blog',  // カスタム投稿ID
      array(
       'label' => 'Blog',  // カスタム投稿名(管理画面の左メニューに表示されるテキスト)
       'public' => true,  // 投稿タイプをパブリックにするか否か
       'has_archive' => true,  // アーカイブ(一覧表示)を有効にするか否か
       'menu_position' => 5,  // 管理画面上でどこに配置するか今回の場合は「投稿」の下に配置
       'show_in_rest' => true,//新エディタ Gutenberg を有効化（REST API を有効化）
       'supports' => $exampleSupports  // 投稿画面でどのmoduleを使うか的な設定
      )
   );
 }

 add_action( 'init', 'create_post_type' ); // アクションに上記関数をフックします

//カスタムタクソノミー作成
function add_taxonomy() {
   //News
   register_taxonomy(
      'news_category',//カスタムタクソノミーのシステム上の値
      'news',//URLの末尾につく値
      array(
         'label' => 'ニュースカテゴリ',//表示される名前
         'singular_label' => 'ニュースカテゴリ',//表示される名前
         'labels' => array(
            'all_items' => 'ニュースカテゴリ一覧',//投稿画面に表示される名前
            'add_new_item' => 'ニュースカテゴリを追加'//投稿画面に表示される名前
         ),
         'public' => true,  // 管理画面及びサイト上に公開
         'show_ui' => true,//管理画面上に編集画面を表示する
         'show_in_rest' => true,//投稿画面に表示
         'hierarchical' => true//階層を持たせるかどうか
      )
   );
   //Blog
   register_taxonomy(
      'blog_category',//カスタムタクソノミーのシステム上の値
      'blog',//URLの末尾につく値
      array(
         'label' => 'ブログカテゴリ',//表示される名前
         'singular_label' => 'ブログカテゴリ',//表示される名前
         'labels' => array(
            'all_items' => 'ブログカテゴリ一覧',//投稿画面に表示される名前
            'add_new_item' => 'ブログカテゴリを追加'//投稿画面に表示される名前
         ),
         'public' => true,  // 管理画面及びサイト上に公開
         'show_ui' => true,//管理画面上に編集画面を表示する
         'show_in_rest' => true,//投稿画面に表示
         'hierarchical' => true//階層を持たせるかどうか
      )
   );
}
add_action( 'init', 'add_taxonomy' );

//アーカイブページ投稿表示設定
function change_posts_per_page($query) {
   if ( is_admin() || ! $query->is_main_query() ){
      return;
   }
   if ( $query->is_post_type_archive( 'news' ) ) {
      $query->set( 'posts_per_page', '3' ); return;
   }
   if ( $query->is_post_type_archive( 'blog' ) ) {
      $query->set( 'posts_per_page', '3' ); return;
   }
   //以下カスタムタクソノミーアーカイブページ
   if ( $query->is_tax('news_category', 'info') ) {
      $query->set( 'posts_per_page', '3' ); return;
   }
   if ( $query->is_tax('news_category', 'topics') ) {
      $query->set( 'posts_per_page', '3' ); return;
   }
   if ( $query->is_tax('blog_category', 'recruit') ) {
      $query->set( 'posts_per_page', '3' ); return;
   }
   if ( $query->is_tax('blog_category', 'metal') ) {
      $query->set( 'posts_per_page', '3' ); return;
   }
   if ( $query->is_tax('blog_category', 'food') ) {
      $query->set( 'posts_per_page', '3' ); return;
   }
   if ( $query->is_tax('blog_category', 'machine') ) {
      $query->set( 'posts_per_page', '3' ); return;
   }
   if ( $query->is_tax('blog_category', 'energy') ) {
      $query->set( 'posts_per_page', '3' ); return;
   }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );

