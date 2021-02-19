($ => {
  $(document).ready(() => {
    const popupOverlay = $('.torque-popup-overlay');
    const popup = $('.torque-popup');
    const hasPopup = 0 < popup.length;
    const cookieName = 'everton-popup';

    if (hasPopup) {
      // get title, content and 'cookie show' status
      const popupTitle = $('.popup-title').html().trim().replace(/[\n\r]/g, "");
      const popupContent = $('.popup-content').html().trim().replace(/[\n\r]/g, "");
      const showPopup = getPopupShowStatus( popupTitle, popupContent, getCookie(cookieName) );

      if (showPopup) {
        // reset the cookie
        const cookieValue = popupTitle.toString() + '|' + popupContent.toString();
        deleteCookie(cookieName);
        setCookie(cookieName, cookieValue, 1 );

        // show the popup, after 5 seconds
        setTimeout(() => {
          popupOverlay.fadeIn(400);
          popup.fadeIn(600);
        }, 5000);
      }

      // add click event for close button
      $('.popup-close-btn').click(function() {
        // hide the popup
        popupOverlay.fadeOut(250);
        popup.fadeOut(250);
      });
    }

  });

  function getPopupShowStatus(newTitle, newContent, cookie) {
    // if no cookie is set, show the popup
    if (!cookie) return true;

    // get the title and content stored in the cookie
    const oldTitle = cookie.split('|')[0];
    const oldContent = cookie.split('|')[1];
    // if the title or the content have changed, show the popup
    if (
      newTitle !== oldTitle
      || newContent !== oldContent
    ) return true;

    // otherwise show the cookie!
    return false;
  }

  function deleteCookie(cname) {
    setCookie(cname, "", -1);
  }
  

  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return false;
  }

})(jQuery);
