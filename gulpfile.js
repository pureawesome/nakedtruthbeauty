var gulp = require('gulp');
var criticalcss = require('criticalcss');
var fs = require('fs');
var cleanCSS = require('gulp-clean-css');

var autoprefixer = require('autoprefixer');
var cssnano = require('cssnano');
var postcss = require('gulp-postcss');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');


gulp.task('dev-css', function () {
  'use strict';
  var processors = [
    autoprefixer,
    cssnano
  ];
  return gulp.src('./sites/all/themes/ntb/scss/ntb.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./sites/all/themes/ntb/css/', {overwrite: true}));
});

gulp.task('css', function () {
  'use strict';
  var processors = [
    autoprefixer,
    cssnano
  ];
  return gulp.src('./sites/all/themes/ntb/scss/ntb.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(postcss(processors))
    .pipe(gulp.dest('./sites/all/themes/ntb/css/', {overwrite: true}));
});

gulp.task('watch_css', function () {
  'use strict';
  gulp.watch('./sites/all/themes/ntb/scss/ntb.scss', ['css']);
});

gulp.task('critical', ['css'], function () {
  'use strict';
  var criticals = {
    home: 'https://staging.nakedtruthbeauty.com/',
    about: 'https://staging.nakedtruthbeauty.com/about/',
    cart: 'https://staging.nakedtruthbeauty.com/cart/',
    shop: 'https://staging.nakedtruthbeauty.com/shop/',
    ingredients: 'https://staging.nakedtruthbeauty.com/ingredients/',
    blog: 'https://staging.nakedtruthbeauty.com/blog/'
  };

  var cssPath = 'sites/all/themes/ntb/css/ntb.css';

  for (var key in criticals) {
    if (Object.prototype.hasOwnProperty.call(criticals, key)) {
      generateCriticalCSS(cssPath, key, criticals[key]);
    }
  }
});

gulp.task('crit-css', ['critical'], function () {
  'use strict';
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
  'use strict';
  var css = [
    'sites/all/themes/ntb/css/ntb.css',
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
  'use strict';
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
