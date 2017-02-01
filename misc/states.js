!function(e){function t(e,t){return"undefined"==typeof e?t:"undefined"==typeof t?e:e&&t}function n(e,t){return t&&"undefined"!=typeof e?!e:e}function i(e,t){return e===t?"undefined"!=typeof e||e:"undefined"==typeof e||"undefined"==typeof t}var r=Drupal.states={postponed:[]};Drupal.behaviors.states={attach:function(t,n){var i=e(t);for(var s in n.states)for(var a in n.states[s])new r.Dependent({element:i.find(s),state:r.State.sanitize(a),constraints:n.states[s][a]});for(;r.postponed.length;)r.postponed.shift()()}},r.Dependent=function(t){e.extend(this,{values:{},oldValue:null},t),this.dependees=this.getDependees();for(var n in this.dependees)this.initializeDependee(n,this.dependees[n])},r.Dependent.comparisons={RegExp:function(e,t){return e.test(t)},Function:function(e,t){return e(t)},Number:function(e,t){return"string"==typeof t?i(e.toString(),t):i(e,t)}},r.Dependent.prototype={initializeDependee:function(t,n){var i;this.values[t]={};for(var s in n)if(n.hasOwnProperty(s)){if(i=n[s],e.inArray(i,n)===-1)continue;i=r.State.sanitize(i),this.values[t][i.name]=null,e(t).bind("state:"+i,e.proxy(function(e){this.update(t,i,e.value)},this)),new r.Trigger({selector:t,state:i})}},compare:function(e,t,n){var s=this.values[t][n.name];return e.constructor.name in r.Dependent.comparisons?r.Dependent.comparisons[e.constructor.name](e,s):i(e,s)},update:function(e,t,n){n!==this.values[e][t.name]&&(this.values[e][t.name]=n,this.reevaluate())},reevaluate:function(){var e=this.verifyConstraints(this.constraints);e!==this.oldValue&&(this.oldValue=e,e=n(e,this.state.invert),this.element.trigger({type:"state:"+this.state,value:e,trigger:!0}))},verifyConstraints:function(n,i){var r;if(e.isArray(n)){for(var s=e.inArray("xor",n)===-1,a=0,o=n.length;a<o;a++)if("xor"!=n[a]){var l=this.checkConstraints(n[a],i,a);if(l&&(s||r))return s;r=r||l}}else if(e.isPlainObject(n))for(var u in n)if(n.hasOwnProperty(u)&&(r=t(r,this.checkConstraints(n[u],i,u)),r===!1))return!1;return r},checkConstraints:function(e,t,i){return"string"!=typeof i||/[0-9]/.test(i[0])?i=null:"undefined"==typeof t&&(t=i,i=null),null!==i?(i=r.State.sanitize(i),n(this.compare(e,t,i),i.invert)):this.verifyConstraints(e,t)},getDependees:function(){var e={},t=this.compare;return this.compare=function(t,n,i){(e[n]||(e[n]=[])).push(i.name)},this.verifyConstraints(this.constraints),this.compare=t,e}},r.Trigger=function(t){e.extend(this,t),this.state in r.Trigger.states&&(this.element=e(this.selector),this.element.data("trigger:"+this.state)||this.initialize())},r.Trigger.prototype={initialize:function(){var e=r.Trigger.states[this.state];if("function"==typeof e)e.call(window,this.element);else for(var t in e)e.hasOwnProperty(t)&&this.defaultTrigger(t,e[t]);this.element.data("trigger:"+this.state,!0)},defaultTrigger:function(t,n){var i=n.call(this.element);this.element.bind(t,e.proxy(function(e){var t=n.call(this.element,e);i!==t&&(this.element.trigger({type:"state:"+this.state,value:t,oldValue:i}),i=t)},this)),r.postponed.push(e.proxy(function(){this.element.trigger({type:"state:"+this.state,value:i,oldValue:null})},this))}},r.Trigger.states={empty:{keyup:function(){return""==this.val()}},checked:{change:function(){return this.is(":checked")}},value:{keyup:function(){return this.length>1?this.filter(":checked").val()||!1:this.val()},change:function(){return this.length>1?this.filter(":checked").val()||!1:this.val()}},collapsed:{collapsed:function(e){return"undefined"!=typeof e&&"value"in e?e.value:this.is(".collapsed")}}},r.State=function(e){for(this.pristine=this.name=e;;){for(;"!"==this.name.charAt(0);)this.name=this.name.substring(1),this.invert=!this.invert;if(!(this.name in r.State.aliases))break;this.name=r.State.aliases[this.name]}},r.State.sanitize=function(e){return e instanceof r.State?e:new r.State(e)},r.State.aliases={enabled:"!disabled",invisible:"!visible",invalid:"!valid",untouched:"!touched",optional:"!required",filled:"!empty",unchecked:"!checked",irrelevant:"!relevant",expanded:"!collapsed",readwrite:"!readonly"},r.State.prototype={invert:!1,toString:function(){return this.name}},e(document).bind("state:disabled",function(t){t.trigger&&e(t.target).attr("disabled",t.value).closest(".form-item, .form-submit, .form-wrapper").toggleClass("form-disabled",t.value).find("select, input, textarea").attr("disabled",t.value)}),e(document).bind("state:required",function(t){if(t.trigger)if(t.value){var n=e(t.target).closest(".form-item, .form-wrapper").find("label");n.find(".form-required").length||n.append('<span class="form-required">*</span>')}else e(t.target).closest(".form-item, .form-wrapper").find("label .form-required").remove()}),e(document).bind("state:visible",function(t){t.trigger&&e(t.target).closest(".form-item, .form-submit, .form-wrapper").toggle(t.value)}),e(document).bind("state:checked",function(t){t.trigger&&e(t.target).attr("checked",t.value)}),e(document).bind("state:collapsed",function(t){t.trigger&&e(t.target).is(".collapsed")!==t.value&&e("> legend a",t.target).click()})}(jQuery);
