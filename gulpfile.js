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

// FONTS
gulp.task('fonts', function() {
  plugins.del(dest + 'fonts');

  // Socicon Fonts
  gulp.src(webroot + 'socicon/font/*')
    .pipe(plugins.plumber())
    .pipe(gulp.dest(dest + 'fonts'));

  return gulp.src(plugins.mainBowerFiles())
    .pipe(plugins.plumber())
    .pipe(plugins.filter(['*.eot', '*.svg', '*.ttf', '*.woff', '*.otf']))
    .pipe(gulp.dest(dest + 'fonts'))
    .pipe(plugins.livereload());

});

// CSS
gulp.task('css', function() {
  plugins.del(dest + 'css');

  // Bootstrap Maps
  gulp.src(bower + 'bootstrap/dist/css/*.map')
    .pipe(plugins.plumber())
    .pipe(gulp.dest(dest + 'css'));

  // Chosen Sprite
  gulp.src(bower + 'chosen_v1.3.0/*.png')
    .pipe(plugins.plumber())
    .pipe(gulp.dest(dest + 'css'));

  // Bootstrap Calendar Templates
  gulp.src(bower + 'bootstrap-calendar/tmpls/*.html')
    .pipe(plugins.plumber())
    .pipe(gulp.dest(dest + 'tmpls'));

  // Bootstrap Calendar Images
  gulp.src(bower + 'bootstrap-calendar/img/*.png')
    .pipe(plugins.plumber())
    .pipe(gulp.dest(dest + 'img'));

  var cssFiles = [
    bower + 'chosen_v1.3.0/chosen.css',
    webroot + 'css/style.scss',
    webroot + 'css/date.scss',
    webroot + 'css/brandcolors.css',
    webroot + 'socicon/socicon.css'
  ];

  return gulp.src(plugins.mainBowerFiles().concat(cssFiles))
    .pipe(plugins.plumber())
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
    webroot + 'js/datetimepicker.locale.fr.js',
    bower + 'bootstrap-calendar/js/language/fr-FR.js'
  ];

  return gulp.src(plugins.mainBowerFiles().concat(jsFiles))
    .pipe(plugins.plumber())
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
  gulp.watch(webroot + 'socicon/*', ['css']);
  gulp.watch(webroot + 'js/*', ['js']);
  gulp.watch('View/**/*.ctp', ['ctp']);
});

gulp.task('ctp', function() {
  gulp.src('View/**/*.ctp')
    .pipe(plugins.plumber())
    .pipe(plugins.livereload());
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['fonts', 'css', 'js', 'watch']);