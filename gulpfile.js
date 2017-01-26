const gulp         = require('gulp'),
      sass         = require('gulp-sass'),
      uglify       = require('gulp-uglify'),
      rename       = require('gulp-rename'),
      nano         = require('gulp-cssnano'),
      sourcemaps   = require('gulp-sourcemaps'),
      autoprefixer = require('gulp-autoprefixer'),
      plumber      = require('gulp-plumber'),
      notify       = require('gulp-notify'),
      zip          = require('gulp-zip');


// Set the paths you will be working with
const cssFiles     = ['./src/staff-grid/styles/css/*.css', '!./src/staff-grid/styles/css/*.min.css'],
      sassFiles    = ['./src/staff-grid/styles/scss/**/*.scss'],
      styleFiles   = [cssFiles, sassFiles];

/*------------------------------------------------------------------------------
  Development Tasks
------------------------------------------------------------------------------*/

// Compile Sass
gulp.task('sass', function() {
  return gulp.src( sassFiles )
    .pipe(sourcemaps.init())
      .pipe(plumber())
      .pipe(sass({
        includePaths: []
      })
        .on('error', sass.logError))
        .on('error', notify.onError("Error compiling SASS!")
      )
      .pipe(autoprefixer({
        browsers: ['last 3 versions', 'Safari > 7'],
        cascade: false
      }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest( './src/staff-grid/styles/css' ));
});

/*------------------------------------------------------------------------------
  Production Tasks
------------------------------------------------------------------------------*/
// Minimize CSS
gulp.task('minify-css', ['sass'], function() {
	return gulp.src( cssFiles )
  	.pipe(rename({
      suffix: '.min'
    }))
    .pipe(nano({
      discardComments: {removeAll: true},
      autoprefixer: false,
      discardUnused: false,
      mergeIdents: false,
      reduceIdents: false,
      calc: {mediaQueries: true},
      zindex: false
    }))
    .pipe(gulp.dest( './src/staff-grid/styles/css' ));
});


/*------------------------------------------------------------------------------
  Task Runners
------------------------------------------------------------------------------*/

// Styles Task - minify-css is the only task we call, because it is dependent upon sass running first.
gulp.task('styles', ['minify-css']);

// Package the plugin for distribution
gulp.task('package', () => {
  return gulp.src('src/staff-grid/**/*')
    .pipe(zip('staff-grid.zip'))
    .pipe(gulp.dest('dist'));
});

// Watch Files For Changes
gulp.task('watch', function() {
  gulp.watch( sassFiles, ['styles']);
});

// Default Task - runs styles and watch
gulp.task('default', ['styles', 'watch']);
