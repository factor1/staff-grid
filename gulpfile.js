const gulp = require('gulp');
const zip = require('gulp-zip');

gulp.task('default', () => {
  return gulp.src('src/staff-grid/**/*')
    .pipe(zip('staff-grid.zip'))
    .pipe(gulp.dest('dist'));
});
