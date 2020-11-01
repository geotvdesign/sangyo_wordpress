const { src, dest, watch, series, parallel } = require('gulp');
var sass = require('gulp-sass');
var pug = require('gulp-pug');
var rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var plumber = require('gulp-plumber');
const webpackStream = require("webpack-stream");
const webpack = require("webpack");
var browserSync = require('browser-sync');
//画像圧縮
const imagemin = require('gulp-imagemin');
const mozjpeg = require('imagemin-mozjpeg');
const pngquant = require('imagemin-pngquant');

// webpackの設定ファイルの読み込み
const webpackConfig = require("./webpack.config");

const Pug = () => {
    return src('./workspace/pug/**/*.pug') //コンパイル元
    .pipe(plumber()) //エラーが起きてもそのまま処理
    .pipe(pug({
        pretty: true //改行
    }))
	.pipe(rename({
		extname: '.php' //PHPファイルとして出力
	}))
    .pipe(dest('./html/wp-content/themes/sangyo/'))     //コンパイル先
}

const cssSass = () => {
    return src('./workspace/scss/**/*.scss') //コンパイル元
    .pipe(autoprefixer({ //ベンダープレフィックスつける
        cascade:false //ベンダープレフィックス付きのプロパティのインデントを整形する
    }))
    .pipe(plumber())
    .pipe(sass({ outputStyle: 'expanded' }))
    .pipe(dest('./html/wp-content/themes/sangyo/css'))     //コンパイル先
}

const bundle = () => {
    // ☆ webpackStreamの第2引数にwebpackを渡す☆
    return webpackStream(webpackConfig, webpack)
    .pipe(dest('./html/wp-content/themes/sangyo/js'))     //コンパイル先
}

//画像圧縮
const taskImagemin = () =>
    src('workspace/images/*')
    .pipe(plumber())
    .pipe(imagemin([
        pngquant({
            quality: [ 0.65, 0.8 ], speed: 1
        }),
        mozjpeg({
            quality: 80
        }),
        imagemin.gifsicle({
            interlaced: false
        }),
        imagemin.svgo({
            plugins: [
                { removeViewBox: true },
                { cleanupIDs: false }
            ]
        }),
    ]))
    .pipe(dest('html/wp-content/themes/sangyo/images'));

const watchFiles = (done) => {
    watch('./workspace/scss/**/*.scss', series(cssSass)) //watch('監視するファイル',処理)
    watch('./workspace/pug/**/*.pug', series(Pug))
    watch('./workspace/js/**/*.js', series(bundle))
    watch('./workspace/images/*', taskImagemin)
    done();
}

exports.default = series(series(cssSass,Pug,bundle,taskImagemin), parallel(bundle,watchFiles)); //seriesは「順番」に実行、seriesは「順番」に実行