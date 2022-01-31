// プラグインの読み込み
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var browserSync = require('browser-sync').create();
var del = require('del');
var webpack = require('webpack');
var webpackConfig = require('./webpack.config');
var webpackStream = require('webpack-stream');

const sass = require('gulp-sass')(require('sass'));

// 設定
var config = {
  paths: {
    dev: './',
    src: '_src/',
    sass: '_src/scss/',
    css: './',
    js: 'assets/js/',
    images: 'assets/images/',
    dist: 'dist/',
  }
};

gulp.task('webpack', function () {
  return webpackStream(webpackConfig, webpack)
    .pipe(gulp.dest(config.paths.js));
});

gulp.task('sass', function () {
  return gulp
    .src(config.paths.sass + '**/*.{scss, css}', { sourcemaps: true })
    .pipe($.plumber())
    .pipe($.sassGlob({
      ignorePaths: [
        'foundation/_config.scss',
        'foundation/_mixin.scss'
      ]
    }))
    .pipe(sass({
      outputStyle: 'expanded',
      precision: 3
    }))
    .pipe($.autoprefixer({
      cascade: false
    }))
    .pipe(gulp.dest(config.paths.css, { sourcemaps: './' }))
    .pipe(browserSync.stream());
});

// リリース用ディレクトリのファイルを削除
gulp.task('clean', function () {
  return del(config.paths.dist + '**/*');
});

// リリース用ディレクトリにファイルのコピー
gulp.task('copy', function () {
  return gulp
    .src([
      config.paths.dev + '**/*',
      '!' + config.paths.dev + '**/*.map',
      '!' + config.paths.dev + '_**/**/*',
      '!' + config.paths.dev + '**/_*',
      '!' + config.paths.dev + '**/_**/**/*'
    ])
    .pipe(gulp.dest(config.paths.distHtml));
});

// リリース用のタスク
gulp.task('dist', gulp.series(
  'clean',
  'copy',
));

gulp.task('server', function (cb) {
  browserSync.init({
    server: {
      baseDir: config.paths.dev
    }
  }, cb);
});

gulp.task('watch', function () {
  gulp.watch([
    config.paths.dev + '**/*.html',
    config.paths.dev + '**/*.php',
    config.paths.dev + '**/*.css',
    config.paths.dev + '**/*.js',
    '!' + config.paths.src + 'js/**/*.js'
  ]).on('change', browserSync.reload);

  gulp.watch(config.paths.sass + '**/*', gulp.series('sass'));
  gulp.watch(config.paths.src + 'js/**/*.js', gulp.series('webpack'));
});

// デフォルトのタスク
gulp.task('default', gulp.series('server', 'watch'));
