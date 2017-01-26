const gulp         = require('gulp'),
      zip          = require('gulp-zip');


/*------------------------------------------------------------------------------
  Task Runners
------------------------------------------------------------------------------*/

// Package the plugin for distribution
gulp.task('package', () => {
  return gulp.src('src/staff-grid/**/*')
    .pipe(zip('staff-grid.zip'))
    .pipe(gulp.dest('dist'));
});


// Default Task - runs styles and watch
gulp.task('default', ['package']);
