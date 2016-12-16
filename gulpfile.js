const gulp = require('gulp');
const zip = require('gulp-zip');

gulp.task('default', () => {
  return gulp.src('src/staff-grid-plugin/**/*')
    .pipe(zip('staff-grid-plugin.zip'))
    .pipe(gulp.dest('dist'));
});
