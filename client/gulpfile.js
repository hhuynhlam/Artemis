'use strict';

var del = require('del');
var gulp = require('gulp');
var jade = require('gulp-jade');
var jshint = require('gulp-jshint');
var less = require('gulp-less');
var plumber = require('gulp-plumber');
var shell = require('gulp-shell');


//======================================
// JSHint
//======================================

gulp.task('jshint', function() {
    return gulp.src([
        'gruntfile.js', 
        '**/*.js', 
        '!_dist/**/*.js', 
        '!vendor/bower_components/**/*.js', 
        '!node_modules/**/*.js',
        '!**/*.spec.js'
    ])
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'));
});


//======================================
// Less
//======================================

gulp.task('less', function () {
    return gulp.src('./assets/less/global.less')
    .pipe(plumber())
    .pipe(less())
    .pipe(gulp.dest('./assets/css'));
});

//======================================
// Jade
//======================================

gulp.task('jade', function () {
    return gulp.src('./**/*.jade')
    .pipe(plumber())
    .pipe(jade())
    .pipe(gulp.dest('./'));
});


//======================================
// Clean
//======================================

gulp.task('clean', function() {
    del(['_dist/**/*', '!_dist/env.json']);
});


//======================================
// Copy
//======================================

gulp.task('copy', function() {
    gulp.src('assets/**/*').pipe(gulp.dest('_dist/assets'));
    gulp.src('components/**/*').pipe(gulp.dest('_dist/components'));
    gulp.src('core/**/*').pipe(gulp.dest('_dist/core'));
    gulp.src('pages/**/*').pipe(gulp.dest('_dist/pages'));
    gulp.src('services/**/*').pipe(gulp.dest('_dist/services'));
    gulp.src('vendor/**/*').pipe(gulp.dest('_dist/vendor'));
    gulp.src(['app.js', 'index.html']).pipe(gulp.dest('_dist'));
});


//======================================
// Watch
//======================================
 
gulp.task('watch', function () {
    gulp.watch('./**/*.less', ['less']);
    gulp.watch('./**/*.jade', ['jade']);
});


//======================================
// Shell
//======================================

gulp.task('serve', ['less', 'jade', 'watch'], shell.task([ 'node ./server.js' ]));


//======================================
// Primary Tasks
//======================================
gulp.task('default', ['jshint', 'less', 'jade']);


