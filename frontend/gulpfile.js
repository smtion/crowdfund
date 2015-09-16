var gulp = require('gulp');
var concat = require('gulp-concat');
var less = require('gulp-less');
var uglify = require('gulp-uglify');
var webserver = require('gulp-webserver'); 
var extend = require('gulp-extend');
//var uglify = require('gulp-uglify');

var src = './build/src';
var dist = '.build/dist';

var env = 'local';
// if (typeof argv.env !== 'undefined') {
  // env = argv.env;
// }


// gulp.task('compress', function() {
  // return gulp.src('lib/*.js')
    // .pipe(uglify())
    // .pipe(gulp.dest('build/dist'));
// });

 gulp.task('less', function() {
  return gulp.src('less/app.less')
    .pipe(less({compress: true}))
    .pipe(gulp.dest(src));
});

gulp.task('settings', function () {
  return gulp.src(['settings/common.json', 'settings/' + env + '.json'])
    .pipe(extend('settings.json'))
    // .pipe(ngConstant({
      // name: 'core.settings',
      // constants: {'env': env}
    // }))
    .pipe(gulp.dest(src));
});

gulp.task('watch', ['less', 'settings'], function () {
  gulp.watch('less/**/*.less', ['less']);
  gulp.watch('settings/*.json', ['settings']);
});

gulp.task('webserver', function() {
  gulp.src('.')
    .pipe(webserver({
      host: 'localhost',
      port: 9000,
      livereload: true,
      directoryListing: false,
      open: true,      
      fallback: 'index.html'
      // middleware: [
        // function (req, res, next) {
          // var url = req.url;
          // var isHtml = url.indexOf('.html', url.length - '.html'.length) != -1;
          // var delay = isHtml ? delay : 0;
          // console.log('Serving ' + url);
          // setTimeout(next, delay);
        // }
      // ],
    }));
});

gulp.task('dev', ['webserver', 'watch']);
gulp.task('default', ['dev']);