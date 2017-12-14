'use strict';

var gulp = require('gulp');
var criticalcss = require('criticalcss');
var fs = require('fs');
var cleanCSS = require('gulp-clean-css');


gulp.task('critical', ['css'], function () {
  var criticals = {
    home: 'https://nakedtruthbeauty.com/',
    about: 'https://nakedtruthbeauty.com/about/',
    cart: 'https://nakedtruthbeauty.com/cart/',
    shop: 'https://nakedtruthbeauty.com/shop/',
    ingredients: 'https://nakedtruthbeauty.com/ingredients/',
    blog: 'https://nakedtruthbeauty.com/blog/'
  };

  var cssPath = 'sites/all/themes/ntb/css/ntb.css';

  for (var key in criticals) {
    if (Object.prototype.hasOwnProperty.call(criticals, key)) {
      generateCriticalCSS(cssPath, key, criticals[key]);
    }
  }
});

<<<<<<< HEAD
gulp.task('minify-crit', function () {
=======
gulp.task('crit-css', ['critical'], function () {
  var processors = [
    autoprefixer,
    cssnano
  ];
  return gulp.src('./sites/all/themes/ntb/scss/ntb_critical.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss(processors))
    .pipe(gulp.dest('./sites/all/themes/ntb/css/', {overwrite: true}));
});

gulp.task('minify', ['crit-css'], function () {
>>>>>>> issues/43-no-bootstrap
  var css = [
    // 'sites/all/themes/ntb/css/ntb.css',
    'sites/all/themes/ntb/css/ntb_critical.css'
  ];

  css.forEach(function (css_file) {
    return gulp.src(css_file)
      .pipe(cleanCSS({
        debug: true,
        level: {
          2: {
            all: true
          }
        }
      }, function (details) {
        console.log(details.name + ': ' + details.stats.originalSize);
        console.log(details.name + ': ' + details.stats.minifiedSize);
      }))
      .pipe(gulp.dest('sites/all/themes/ntb/css/'));
  });
});

gulp.task('build', ['css', 'critical', 'crit-css', 'minify']);

function generateCriticalCSS(cssPath, key, value) {
  criticalcss.getRules(cssPath, function (err, output) {
    if (err) {
      throw new Error(err);
    }
    else {
      criticalcss.findCritical(value, {rules: JSON.parse(output)}, function (err, output) {
        if (err) {
          throw new Error(err);
        }
        else {
          fs.writeFile('sites/all/themes/ntb/scss/critical/_critical_' + key + '.scss', output)
        }
      });
    }
  });
}
