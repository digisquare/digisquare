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

});
