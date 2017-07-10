$.fn.random = function() {
  return this.eq( Math.floor( Math.random() * this.length ) );
};

$(document).on('click', '.link-set__item--contact .link-set__item__title', function() {
  var $contact = $('.contact-info');

  if ( $contact.hasClass('transitioning') ) {
    return;
  }

  $contact.addClass('transitioning');
  $contact.css({ opacity: 0 }).show().transition({ opacity: 1 }, function() {
    $contact.removeClass('transitioning');
  });
});

$(document).on('click', '.contact-info__close-button', function() {
  var $contact = $('.contact-info');

  if ( $contact.hasClass('transitioning') ) {
    return;
  }

  $contact.addClass('transitioning');
  $contact.transition({ opacity: 0 }, function() {
    $contact.hide().removeClass('transitioning');
  });
});

$(function() {
  var $body = $('body');
  var $mediaWrapper = $('#active-media-wrapper');
  var $linkSet = $('.link-set');
  var $linkSetItems = $linkSet.find('.link-set__item');
  var $linkSetLinks = $linkSetItems.find('a');

  $linkSetLinks.hover(function() {
    activateLink( $(this).closest('.link-set__item') );
  }, function() {
    deactivateLinks();
  });

  function activateLink( $linkSetItem ) {
    var $media = $linkSetItem.find('.link-set__media');
    var $images = $media.find('img');
    var $videos = $media.find('.video-item');
    var useImage = Math.random() < 0.5 ? true : false;
    var $mediaItemToUse = false;
    var mediaItemType = false;

    if ( $images.length && $videos.length ) {
      if ( useImage ) {
        $mediaItemToUse = $images.random();
        mediaItemType = 'image';
      } else {
        $mediaItemToUse = $videos.random();
        mediaItemType = 'video';
      }
    } else if ( $images.length ) {
      $mediaItemToUse = $images.random();
      mediaItemType = 'image';
    } else if ( $videos.length ) {
      $mediaItemToUse = $videos.random();
      mediaItemType = 'video';
    } else {
      return;
    }

    $('html').addClass('link-set-active');
    $linkSetItem.addClass('active');

    if ( mediaItemType == 'image' ) {
      addImage( $mediaItemToUse );
    } else {
      addVideo( $mediaItemToUse );
    }
  }

  function addImage( $mediaItem ) {
    var src = $mediaItem.attr('src');
    var imageHTML = '<div class="active-media-image inactive" style="background-image: url(' + src + ');"></div>';

    $mediaWrapper.prepend( imageHTML );

    setTimeout(function() {
      $mediaWrapper.find('.active-media-image.inactive').removeClass('inactive');
    });
  }

  function addVideo( $mediaItem ) {
    var src = $mediaItem.attr('data-src');
    var videoHTML = '<video class="inactive" src="' + src + '" autoplay loop muted></video>';

    $mediaWrapper.prepend( videoHTML );

    setTimeout(function() {
      $mediaWrapper.find('video.inactive').removeClass('inactive');
    });
  }

  function deactivateLinks() {
    $('html').removeClass('link-set-active');
    $linkSetItems.removeClass('active');

    $mediaWrapper.children().not('.transition-out').each(function() {
      var $that = $(this);

      $that.addClass('transition-out');

      $that.transition({ opacity: 0 }, 500, function() {
        $that.remove();
      });
    });
  }
});
