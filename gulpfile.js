// Gulp
var gulp = require('gulp');

 // Plugins
var plugins = require('gulp-load-plugins')({
  pattern: ['gulp-*', 'gulp.*', 'main-bower-files', 'del'],
  replaceString: /\bgulp[\-.]/
});

var bower = './bower_components/';
var webroot = './webroot/';
var dest = './webroot/generated/';

// CSS
gulp.task('css', function() {
  plugins.del(dest + 'css');

  // Bootstrap Fonts
  gulp.src(bower + 'bootstrap/dist/fonts/*')
    .pipe(gulp.dest(dest + 'fonts'));

  // Chosen Sprite
  gulp.src(bower + 'chosen_v1.3.0/*.png')
    .pipe(gulp.dest(dest + 'css'));

  var cssFiles = [
    bower + 'chosen_v1.3.0/chosen.css',
    webroot + 'css/style.scss'
  ];

  return gulp.src(plugins.mainBowerFiles().concat(cssFiles))
    .pipe(plugins.filter(['*.css', '*.scss']))
    .pipe(plugins.sass({ style: 'expanded' }))
    .pipe(plugins.concat('main.css'))
    .pipe(gulp.dest(dest + 'css'))
    .pipe(plugins.minifyCss({keepSpecialComments:0}))
    .pipe(plugins.concat('main.min.css'))
    .pipe(plugins.rev())
    .pipe(gulp.dest(dest + 'css'))
    .pipe(plugins.rev.manifest())
    .pipe(gulp.dest(dest + 'css'))
    .pipe(plugins.livereload());

});

// JS
gulp.task('js', function() {
  plugins.del(dest + 'js');

  var jsFiles = [
    bower + 'chosen_v1.3.0/chosen.jquery.js',
    webroot + 'js/script.js',
    webroot + 'js/datetimepicker.locale.fr.js'
  ];

  return gulp.src(plugins.mainBowerFiles().concat(jsFiles))
    .pipe(plugins.filter('*.js'))
    .pipe(plugins.concat('main.js'))
    .pipe(gulp.dest(dest + 'js'))
    .pipe(plugins.uglify())
    .pipe(plugins.concat('main.min.js'))
    .pipe(plugins.rev())
    .pipe(gulp.dest(dest + 'js'))
    .pipe(plugins.rev.manifest())
    .pipe(gulp.dest(dest + 'js'))
    .pipe(plugins.livereload());
});

// Rerun the task when a file changes
gulp.task('watch', function() {
  plugins.livereload.listen();
  gulp.watch(webroot + 'css/*', ['css']);
  gulp.watch(webroot + 'js/*', ['js']);
  gulp.watch('View/**/*.ctp', ['ctp']);
});

gulp.task('ctp', function() {
  gulp.src('View/**/*.ctp')
    .pipe(plugins.livereload());
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['css', 'js', 'watch']);