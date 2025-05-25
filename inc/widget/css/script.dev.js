"use strict";

jQuery(document).ready(function ($) {
  var page = 1;
  var loading = false;
  var widgetId = '#i8-latestpost-widget';
  $(widgetId).on('click', '.i8-load-more', function (e) {
    e.preventDefault();
    if (loading) return;
    loading = true;
    page++;
    var data = {
      action: 'i8_load_more_posts',
      page: page,
      widget_id: $(widgetId).data('widget-id')
    };
    $.ajax({
      url: i8_ajax_obj.ajax_url,
      type: 'POST',
      data: data,
      success: function success(res) {
        if (res.success && res.data.html) {
          $(widgetId).find('.row.i8-last-post-1').append(res.data.html);

          if (!res.data.has_more) {
            $(widgetId).find('.i8-load-more').hide();
          }
        } else {
          $(widgetId).find('.i8-load-more').hide();
        }

        loading = false;
      },
      error: function error() {
        loading = false;
      }
    });
  });
});