// Static resources

var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

elixir(function(mix) {
 mix.sass('bootstrap.scss', 'public/css/bootstrap.css');
 mix.sass('app.scss', 'public/css/app.css');
 mix.sass('admin.scss', 'public/css/admin.css');

 mix.version([
  'css/bootstrap.css',
  'css/app.css',
  'css/admin.css'
 ]);
});


// Test launcher

var gulp = require('gulp');
var sys = require('sys');
var exec = require('child_process').exec;
var notify = require("gulp-notify");
var gutil = require('gulp-util');

gulp.task('phpunit', function() {
 console.log('\n$ phpunit '+phpunitPath+'\n');
 exec('phpunit '+phpunitPath, function(error, stdout) {
  console.log('\n'+stdout);
  if (! error) {
   console.log(gutil.colors.bgGreen('                                                                                                            '));
  } else {
   console.log(gutil.colors.bgRed('                                                                                                            '));
  }
  console.log('\n============================================================================================================\n');
 });
});

gulp.task('tdd', function() {
 var watcher = gulp.watch('tests/**/*.php', { debounceDelay: 1000 }, ['phpunit']);
 watcher.on('change', function(event){
  GLOBAL.phpunitPath = event.path;
 });

 var watcher = gulp.watch('app/**/*.php', { debounceDelay: 1000 }, ['phpunit']);
 watcher.on('change', function(event){
  GLOBAL.phpunitPath = event.path.replace('app', 'tests').replace('.php', 'Test.php');
 });
});
