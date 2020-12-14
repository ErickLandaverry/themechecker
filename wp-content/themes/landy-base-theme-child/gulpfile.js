const gulp = require('gulp');
const sass = require('gulp-sass');
var browserSync = require('browser-sync').create();

// Compile scss into css
function style() {
    // Where is file
    return gulp.src('./scss/**/*.scss')
    // Pass file through sass compiler
        .pipe(sass())
    // where to save compiled css
        .pipe(gulp.dest('./'))

        .pipe(browserSync.stream());
};

function watch() {
    browserSync.init({
        server:{
            baseDir:'./'
        },
        port: 10008
    });
    gulp.watch('./scss/**/*.scss', style);
    gulp.watch('./*.html').on('change',  browserSync.reload);
    gulp.watch('./js/**/*/.js').on('change', browserSync.reload);
}
exports.style = style;
exports.watch = watch;