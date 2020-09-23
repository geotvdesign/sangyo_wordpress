<?php
function sangyo_setup() {
   //ここに関数の中身を記述します。
   add_theme_support( 'post-thumbnails' ); //アイキャッチ画像をON
   add_theme_support( 'menus');  //メニュー機能をON
}
add_action( 'after_setup_theme', 'sangyo_setup' ); //after_setup_themeアクションフック※に登録します。