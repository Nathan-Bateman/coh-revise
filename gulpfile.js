//////
//Required
////////////////
var gulp = require('gulp'),
	uglify = require('gulp-uglify'),
	rename = require('gulp-rename'),
	uncss = require('gulp-uncss'),
	cleancss = require('gulp-cleancss'),
	concat = require('gulp-concat'),
	plumber = require('gulp-plumber'),
	htmlmin = require('gulp-htmlmin');

//////
//Scripts Task
//////////////// Grabs all .js files and pipes them out to a destination
gulp.task('concatscripts', function(){
	return gulp.src([ 'js/jQuery.js','js/knockout-3.3.0.js','js/bootstrap.js' ,'js/main.js', 'js/news.js', 'js/sponsor.js'])
	.pipe(plumber())
    .pipe(concat('final.js'))
	.pipe(gulp.dest('js'))
	console.log('concat works');
});

gulp.task('scripts', function(){
	gulp.src(['js/**/*final.js', '!js/**/*.min.js'])
	.pipe(plumber())
	.pipe(rename({suffix:'.min'}))
	.pipe(uglify())
	.pipe(gulp.dest('js'));
	console.log('scripts works');
});

//////
//CSS Task
////////////////

/////
//Minify Task
/////////////
gulp.task('minifycss', function() {
	gulp.src(['css/final.css'])
	.pipe(plumber())
	.pipe(cleancss({keepBreaks: false}))
	.pipe(rename({suffix:'.min'}))
	.pipe(gulp.dest('css'));
});
/////
//Concat Styles Task
/////////////
gulp.task('concatcss', function() {
    gulp.src(['css/bootstrap.clean.css','css/main.css'])
        .pipe(plumber())
    	.pipe(concat('final.css'))
        .pipe(gulp.dest('css'));
});
//UNCSS Task
/////////////
gulp.task('uncss', function() {
    gulp.src('css/bootstrap.css')
        .pipe(uncss({
            html: ['http://localhost:8888/index.php', 'http://localhost:8888/about.php', 'http://localhost:8888/projects.php','http://localhost:8888/news.php','http://localhost:8888/donate.php','http://localhost:8888/news-archive.php','http://localhost:8888/sponsor.php','http://localhost:8888/emunah.php'],
            ignore:['.modal-open']
        }))
        .pipe(rename({suffix:'.clean'}))
        .pipe(gulp.dest('css'));
});
//////
//HTML Task - only right before deploy
////////////////
gulp.task('minifyhtml', function() {
  return gulp.src('minifyhtml/*.php')
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest('minifyhtml'));
});


//Watch Task
////////////////
//////
gulp.task('watch', function(){
	gulp.watch('js/**/*.js', ['concatscripts','scripts']);
	//gulp.watch('css/**/*.css', ['concatcss']);
});


//Default Task
////////////////
gulp.task('default', ['watch']);