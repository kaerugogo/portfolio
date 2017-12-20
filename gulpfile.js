'use strict';
// directory
var source = "wip"; // work in progress
var target = "dist"; // distribution

var gulp = require('gulp');
var bs = require('browser-sync').create();
var sass = require('gulp-sass');
var plumber = require('gulp-plumber');


gulp.task('copy', function(){
	return gulp.src([source + '/**/*.html'])
	.pipe(gulp.dest(target))
	.pipe(bs.stream());
});

gulp.task('copyJs', function(){
	return gulp.src([source + '/**/*.js'])
	.pipe(gulp.dest(target))
	.pipe(bs.stream());
});

gulp.task('copyPhp', function(){
	return gulp.src([source + '/**/*.php'])
	.pipe(gulp.dest(target))
	.pipe(bs.stream());
});

gulp.task('sass_compile', function(){
	return gulp.src([source + '/scss/**/*.scss'])
	.pipe(plumber())
	.pipe(sass())
	.pipe(gulp.dest(target + '/css/'))
	.pipe(bs.stream());
});

// watch task
gulp.task('default',['copy', 'copyJs', 'copyPhp', 'sass_compile'], function(){
	bs.init({
		server: {
			baseDir: target
		}
	});
	gulp.watch([source + '/**/*.html'], ['copy']);
	gulp.watch([source + '/**/*.js'], ['copyJs']);
	gulp.watch([source + '/**/*.php'], ['copyPhp']);
	gulp.watch([source + '/scss/**/*.scss'], ['sass_compile']);
});