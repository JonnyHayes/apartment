var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    cleancss = require('gulp-clean-css'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    sourcemaps = require('gulp-sourcemaps'),
    coffee = require('gulp-coffee'),
    lightmin = require('gulp-lightmin');

// Default task
gulp.task('default', ['sass', 'scripts_lib', 'scripts_validation', 'scripts', 'images', 'coffee', 'minify_finder']);

// Watch for changes
gulp.task('watch', function() {
  gulp.watch(['*.scss', 'stylesheets/*.scss'], ['sass']);
  gulp.watch('js/*.js', ['scripts']);
  gulp.watch('js/lib/*.js', ['scripts_lib']);
  gulp.watch('js/bootstrap-validation/*.js', ['scripts_validation']);
  gulp.watch('img/raw/*', ['images']);
  gulp.watch('coffee/*.coffee', ['coffee']);
  gulp.watch('templates/js/finder-home-query.twig', ['minify_finder']);
});

// Libsass version, to compile scss into css
gulp.task('sass', function() {
  return gulp.src(['*.scss', 'stylesheets/lib/*.scss', 'stylesheets/*.scss'])
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(autoprefixer('last 2 version', '> 1%', 'safari 5', 'ie 8', 'ie 9', 'ios 6', 'android 4'))
    // Build out style.css, to load child theme
    .pipe(gulp.dest('./'))
    // Minify css
    .pipe(cleancss())
    .pipe(rename({
      suffix: '.min',
    }))
    // Output sourcemaps into maps directory
    .pipe(sourcemaps.write('./maps'))
    // Output style file into theme's root
    .pipe(gulp.dest('./'));
    // .pipe(sourcemaps.write('./maps'))
});

// Concatenate and uglify lib scripts, custom scripts
gulp.task('scripts_lib', function() {
  return gulp.src(['js/lib/*.js'])
    .pipe(concat('lib.js'))
    .pipe(uglify())
    .pipe(rename({
      suffix: '.min',
    }))
    .pipe(gulp.dest('./'));
});
// bootstrap validation
gulp.task('scripts_validation', function() {
  return gulp.src([
      'js/bootstrap-validation/jqBootstrapValidation.js',
      'js/bootstrap-validation/bootstrap-formhelpers.js'])
    .pipe(concat('validation.js'))
    .pipe(gulp.dest('./'));
});
gulp.task('scripts', function() {
  return gulp.src(['js/*.js', '!js/resize-*.js'])
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(rename({
      suffix: '.min',
    }))
    .pipe(gulp.dest('./'));
});

// Optimize images
gulp.task('images', function() {
  return gulp.src(['img/raw/*', 'img/raw/app/*', 'img/raw/bg/*', 'img/samples/*'])
    .pipe(imagemin({
      progressive: false,
      optimizationLevel: 3,
    }))
    .pipe(gulp.dest('img/optimized'));
});

// Compile CoffeeScript
gulp.task('coffee', function() {
  return gulp.src(['coffee/*.coffee'])
    .pipe(sourcemaps.init())
    .pipe(coffee({
      // bare: true
    }))
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest('./js/build'));
});

// Minify the home finder template
gulp.task('minify_finder', function() {
  return gulp.src('templates/js/finder-home-query.twig')
    .pipe(lightmin())
    .pipe(gulp.dest('templates/js/build'));
});
