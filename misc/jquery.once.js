
/**
 * jQuery Once Plugin v1.2
 * http://plugins.jquery.com/project/once
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */
!function(n){var e={},r=0;n.fn.once=function(o,s){"string"!=typeof o&&(o in e||(e[o]=++r),s||(s=o),o="jquery-once-"+e[o]);var t=o+"-processed",c=this.not("."+t).addClass(t);return n.isFunction(s)?c.each(s):c},n.fn.removeOnce=function(e,r){var o=e+"-processed",s=this.filter("."+o).removeClass(o);return n.isFunction(r)?s.each(r):s}}(jQuery);
