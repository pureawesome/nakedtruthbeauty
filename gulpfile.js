'use strict';

var gulp = require('gulp');
var postcss = require('gulp-postcss');
var sass = require('gulp-sass');

var autoprefixer = require('autoprefixer');
var cssnano = require('cssnano');

// var uglify = require('gulp-uglify');
// var pump = require('pump');
var criticalcss = require("criticalcss");
var fs = require('fs');
var purge = require('gulp-css-purge')

var request = require('request');
var path = require( 'path' );
var criticalcss = require("criticalcss");
var fs = require('fs');
var tmpDir = require('os').tmpdir();

gulp.task('css', function () {
  var processors = [
    autoprefixer,
    cssnano
  ];
  return gulp.src('./sites/all/themes/ntb/scss/ntb.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss(processors))
    .pipe(gulp.dest('./sites/all/themes/ntb/css/', {overwrite: true}));
});

gulp.task('critical', function () {
  // criticalcss -u https://nakedtruthbeauty.com -f css/ntb.css -o scss/critical/_critical.scss
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

gulp.task('critical_comp', function () {
  var processors = [
    autoprefixer,
    cssnano
  ];
  return gulp.src('./sites/all/themes/ntb/scss/critical/critical.scss')
    .pipe(sass().on('error', sass.logError))
    // .pipe(purge())
    .pipe(postcss(processors))
    .pipe(gulp.dest('./sites/all/themes/ntb/css/', {overwrite: true}));
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
