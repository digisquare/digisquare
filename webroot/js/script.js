/*!
 * Digisquare JS
 */

function toggle_visibility(id) {
  var e = document.getElementById(id);
  if(e.style.display == 'block') {
    e.style.display = 'none';
  } else {
    e.style.display = 'block';
  }
  return false;
}

$(document).ready( function () {
  $(".chzn-select").chosen();

  $(".chzn-select-deselect").chosen({
    allow_single_deselect:true
  });

  var start_at = Date.parse($('#EventStartAt').val());

  $('#datetimepicker_startat_date').datetimepicker({
    pickTime: false,
    language: 'fr',
    defaultDate: start_at
  });
  $('#datetimepicker_startat_time').datetimepicker({
    pickDate: false,
    language: 'fr',
    defaultDate: start_at
  });

  $("#datetimepicker_startat_date").on("dp.change",function (e) {
    $('#datetimepicker_endat_date').data("DateTimePicker").setMinDate(e.date);
    $('#datetimepicker_startat_time').data("DateTimePicker").setDate(e.date);
    $('#EventStartAt').val(new Date(e.date).toString("yyyy-MM-dd HH:mm:ss"));
  });
  $("#datetimepicker_startat_time").on("dp.change",function (e) {
    $('#datetimepicker_startat_date').data("DateTimePicker").setDate(e.date);
  });

  var end_at = Date.parse($('#EventEndAt').val());

  $('#datetimepicker_endat_date').datetimepicker({
    pickTime: false,
    language: 'fr',
    defaultDate: end_at
  });
  $('#datetimepicker_endat_time').datetimepicker({
    pickDate: false,
    language: 'fr',
    defaultDate: end_at
  });

  $("#datetimepicker_endat_date").on("dp.change",function (e) {
    $('#datetimepicker_startat_date').data("DateTimePicker").setMaxDate(e.date);
    $('#datetimepicker_endat_time').data("DateTimePicker").setDate(e.date);
    $('#EventEndAt').val(new Date(e.date).toString("yyyy-MM-dd HH:mm:ss"));
  });
  $("#datetimepicker_endat_time").on("dp.change",function (e) {
    $('#datetimepicker_endat_date').data("DateTimePicker").setDate(e.date);
  });

  if ($('#calendar').length > 0) {
    var url = "/events"
      + "?edition_id=" + $('#calendar').data('edition-id')
      + "&date=" + $('#calendar').data('date')
      + "&sort=start_at&direction=asc";
    $.getJSON(url, function(data) {
      var events = [];
      $.each(data.events, function(key, value) {
        value.Event.title = value.Event.name;
        value.Event.start = Date.parse(value.Event.start_at).getTime();
        value.Event.end = Date.parse(value.Event.end_at).getTime();
        events.push(value.Event);
      });
      var calendar = $("#calendar").calendar({
        language: 'fr-FR',
        tmpl_path: "/generated/tmpls/",
        events_source: events,
        view: 'month',
        day: $('#calendar').data('date') + '-01'
      });
      var height = ($('#calendar').height() / 100).toFixed() * 100;
      if ($('#upcoming-events').height() > height) {
        $('#upcoming-events').css('height', height);
        $('#upcoming-events').css('overflow-y', 'scroll');
      }
    });
  }

  // Twitter Script
  window.twttr = (function (d, s, id) {
    var t, js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src= "https://platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js, fjs);
    return window.twttr || (t = { _e: [], ready: function (f) { t._e.push(f) } });
  }(document, "script", "twitter-wjs"));

  twttr.ready(function (twttr) {
    twttr.widgets.createTimeline(
      '553992940708962305',
      document.getElementById('twitter-timeline'),
      {
        height: '380px',
        screenName: $('#twitter-timeline').data('screen-name'),
        chrome: 'noscrollbar'
      }
    );
  });

});
