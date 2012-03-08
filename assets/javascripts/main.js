(function() {
  var hideAddressBar, init, preventAutoscale, scrollToContentOnSingle;

  preventAutoscale = function() {
    var viewportmeta;
    viewportmeta = document.querySelector('meta[name="viewport"]');
    if (viewportmeta) {
      viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0';
      document.body.addEventListener('gesturestart');
    }
    (function() {
      return viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1.6';
    });
    return false;
  };

  hideAddressBar = function() {
    return setTimeout(function() {
      return scrollTo(0, 1);
    }, 100);
  };

  scrollToContentOnSingle = function() {
    var header_height;
    if (document.body.className.match(/single/i)) {
      header_height = document.querySelector('[role="complementary"]').getBoundingClientRect().height;
      return scrollTo(0, header_height);
    }
  };

  init = function() {
    if (navigator.userAgent.match(/iPhone/i || navigator.userAgent.match(/iPad/i))) {
      preventAutoscale();
      hideAddressBar();
      return scrollToContentOnSingle();
    }
  };

  document.addEventListener("DOMContentLoaded", init, false);

}).call(this);
