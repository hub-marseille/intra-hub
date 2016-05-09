var app = angular.module("calendarApp", []);

app.controller("calendarCtrl", function($scope)
{
  var req = new XMLHttpRequest;

  req.onload = function()
  {
    var ret;

    if (req.status >= 200 && req.status < 400)
    {
      ret = JSON.parse(req.responseText);
      if (ret.success)
      {
        ret.events.forEach(function(field)
        {
          field.start = field.start.replace(/ /g, 'T');
          field.end = field.end.replace(/ /g, 'T');
          field.color = "#" + field.color;
        });
        console.log(ret.events);
         angular.element(document).ready(function()
         {
           angular.element(document.getElementById('calendar')).fullCalendar(
             {
               header: {
                 left: 'prev,next today',
                 center: 'title',
                 right: 'month,agendaWeek,agendaDay'
               },
               defaultDate: new Date().toISOString(),
               editable: false,
               eventLimit: true, // allow "more" link when too many events
               timeFormat: 'H:mm',
               events: ret.events
             }
           )
         });
      }
    }
  }
  req.open("GET", base_url+"calendar/public_events", true);
  req.send();
});
