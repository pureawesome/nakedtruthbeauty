'use strict';

var gulp = require('gulp');
var criticalcss = require('criticalcss');
var fs = require('fs');
var cleanCSS = require('gulp-clean-css');


gulp.task('critical', function () {
  var criticals = {
    home: 'https://nakedtruthbeauty.com/',
    about: 'https://nakedtruthbeauty.com/about/',
    cart: 'https://nakedtruthbeauty.com/cart/',
    shop: 'https://nakedtruthbeauty.com/shop/',
    ingredients: 'https://nakedtruthbeauty.com/ingredients/',
    blog: 'https://nakedtruthbeauty.com/blog/'
  }

  var cssPath = 'sites/all/themes/ntb/css/ntb.css';

  for (var key in criticals) {
    if (Object.prototype.hasOwnProperty.call(criticals, key)) {
      generateCriticalCSS(cssPath, key, criticals[key]);
    }
  }
});

gulp.task('minify-crit', function () {
  var css = [
    'sites/all/themes/ntb/css/critical/ntb_critical.css',
    'sites/all/themes/ntb/css/ntb.css'
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
      .pipe(gulp.dest('sites/all/themes/ntb/css/compressed/'));
  });
});

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
