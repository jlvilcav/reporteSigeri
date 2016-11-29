$(document).ready(function(){
   $("#dtDesde1").datetimepicker({
        minDate: 0,
        maxDate: "+60D",
        numberOfMonths: 2,
        onSelect: function(selected) {
          $("#txtToDate").datepicker("option","minDate", selected)
        }
    });

    $("#dtHasta2").datetimepicker({
        minDate: 0,
        maxDate:"+60D",
        numberOfMonths: 2,
        onSelect: function(selected) {
           $("#txtFromDate").datepicker("option","maxDate", selected)
        }
    });
});