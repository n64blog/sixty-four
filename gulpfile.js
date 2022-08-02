var gulp = require( 'gulp' );
var rename = require( 'gulp-rename' );
var sass = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );
var sourcemaps = require( 'gulp-sourcemaps' );
var concat = require('gulp-concat');
var uglify = require( 'gulp-uglify' );

var styleSRC = 'sass/style.scss';
var styleDIST = './';
var styleWATCH = 'sass/**/*.scss';

//var jsDIST = './';
//var jsWATCH = 'scripts/*.js';
//var jsFILES = ['./scripts/js-cookie.js', './scripts/main.js'];


/* Stylesheets */

gulp.task( 'style', function(){
  return gulp.src( styleSRC )
    .pipe( sourcemaps.init() )
    .pipe( sass({
      errorLogToConsole: true
    }) )
    .on( 'error', console.error.bind( console ) )
    .pipe( autoprefixer({
      cascade: false 
    }) )
    .pipe( sourcemaps.write( './' ) )
    .pipe( gulp.dest( styleDIST ) );
} ) ;

gulp.task( 'style-min', function(){
  return gulp.src( styleSRC )
    .pipe( sourcemaps.init() )
    .pipe( sass({
      errorLogToConsole: true,
      outputStyle: 'compressed'
    }) )
    .on( 'error', console.error.bind( console ) )
    .pipe( autoprefixer({
      cascade: false 
    }) )
    .pipe( rename( { suffix: '.min' } ) )
    .pipe( sourcemaps.write( './' ) )
    .pipe( gulp.dest( styleDIST ) );
} ) ;


/* Scripts 

gulp.task( 'js', function() {
  return gulp.src( jsFILES )
    .pipe( concat('scripts.js') )
    .pipe( uglify() )
    .pipe(gulp.dest( jsDIST ) );
} ) ;
*/

/* Default */

gulp.task( 'default', gulp.series( ['style', 'style-min'] ) );

/* Watch */

gulp.task( 'watch', gulp.series( ['default'], function(){
  gulp.watch( styleWATCH, gulp.series( ['style'] ) );
  gulp.watch( styleWATCH, gulp.series( ['style-min'] ) );
  //gulp.watch( jsWATCH, gulp.series( ['js'] ) );
} ) );
