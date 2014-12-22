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

  $('#datetimepicker_startat_date').datetimepicker({
    pickTime: false,
    language: 'fr'
  });
  $('#datetimepicker_startat_time').datetimepicker({
    pickDate: false,
    language: 'fr'
  });
  $('#datetimepicker_endat_date').datetimepicker({
    pickTime: false,
    language: 'fr'
  });
  $('#datetimepicker_endat_time').datetimepicker({
    pickDate: false,
    language: 'fr'
  });
  $("#datetimepicker_startat_date").on("dp.change",function (e) {
     $('#datetimepicker_endat_date').data("DateTimePicker").setMinDate(e.date);
  });
  $("#datetimepicker_endat_date").on("dp.change",function (e) {
     $('#datetimepicker_startat_date').data("DateTimePicker").setMaxDate(e.date);
  });

});
