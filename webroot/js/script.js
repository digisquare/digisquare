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

  $('.event-name').popover({
    trigger: 'hover',
    placement: 'bottom',
    html: true
  });

  $('.feed-popover').popover({
    trigger: 'click',
    placement: 'bottom',
    html: true
  }).click(function(e) {
    e.preventDefault();
  });

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
    twttr.widgets.createTimeline(
      '553992940708962305',
      document.getElementById('twitter-home-timeline'),
      {
        height: '614px',
        screenName: $('#twitter-home-timeline').data('screen-name'),
        chrome: 'noscrollbar'
      }
    );
  });

});
