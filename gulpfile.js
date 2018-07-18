var gulp        = require('gulp');
var php         = require('gulp-connect-php');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
    return gulp.src(['node_modules/bootstrap/scss/bootstrap.scss', 'src/scss/*.scss'])
        .pipe(sass())
        .pipe(gulp.dest("src/css"))
        .pipe(browserSync.stream());
});

// Move the javascript files into our /src/js folder
gulp.task('js', function() {
    return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js', 'node_modules/jquery/dist/jquery.min.js', 'node_modules/popper.js/dist/umd/popper.min.js'])
        .pipe(gulp.dest("src/js"))
        .pipe(browserSync.stream());
});

gulp.task('php', ['sass'], function() {
    php.server({ base: './', hostname: 'localhost', port: 8080, keepalive: true});
});

// Static Server + watching scss/html files
gulp.task('serve', ['php'], function() {

    browserSync.init({
        proxy: 'localhost',
        port: 8080,
        open: true,
        notify: false  
    });

    gulp.watch(['node_modules/bootstrap/scss/bootstrap.scss', 'src/scss/*.scss'], ['sass']);
    gulp.watch('application/*/*.php').on('change', browserSync.reload);
});

gulp.task('default', ['js','serve']);