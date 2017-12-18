'use strict';
// ディレクトリの設定
var source 	= "wip";		// work in progress
var target 	= "dist";	// distribution

var gulp 	= require('gulp');
var bs 		= require('browser-sync').create();
var sass		= require('gulp-sass');
var plumber	= require('gulp-plumber');


gulp.task('copy', function(){
	return gulp.src([source + '/**/*.html'])
	.pipe(gulp.dest(target))
	.pipi(bs.stream());
});

gulp.task('sass_compile', function(){
	return gulp.src([source + '/scss/**/*.scss'])
	.pipe(plumber()) // 監視タスクの中断を避ける
	.pipe(sass())
	.pipe(gulp.dest(target + '/css/'))
	.pipe(bs.stream());
});

// 監視タスク
gulp.task('default', ['copy', 'sass_compile'], function(){
	bs.init({
		server: {
			baseDir: target
		}
	});
	gulp.watch([source + '/**/*.html'], ['copy']);
	gulp.watch([source + '/scss/**/*.scss'], ['sass_compile'])
});
