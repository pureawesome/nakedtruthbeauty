!function(r){Drupal.behaviors.batch={attach:function(t,e){r("#progress",t).once("batch",function(){var t=r(this),o=function(r,t,o){100==r&&(o.stopMonitoring(),window.location=e.batch.uri+"&op=finished")},n=function(o){t.prepend(r('<p class="error"></p>').html(e.batch.errorMessage)),r("#wait").hide()},a=new Drupal.progressBar("updateprogress",o,"POST",n);a.setProgress(-1,e.batch.initMessage),t.append(a.element),a.startMonitoring(e.batch.uri+"&op=do",10)})}}}(jQuery);
