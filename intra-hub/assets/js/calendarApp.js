var app = angular.module("calendarApp", []);

app.controller("calendarCtrl", function($scope)
{
  var req = new XMLHttpRequest;
  console.log("coucou");

  req.onload = function()
  {
    var ret;
    console.log("Je suis dans le onload");

    if (req.status > 200 && req.status < 400)
    {
      ret = JSON.parse(req.responseText);
      if (ret.succes)
      {
         angular.element(document).ready(function()
         {
           console.log("Je suis la");
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
               events: JSON.parse(ret.events)
             }
           )
         });
      }
    }
  }
  console.log("Je suis ici");
  req.open("GET", base_url+"calendar/public_events", true);
  req.send();

//   angular.element(document).ready(function ()
//   {
//     angular.element(document.getElementById('calendar')).fullCalendar({
//       header: {
//         left: 'prev,next today',
//         center: 'title',
//         right: 'month,agendaWeek,agendaDay'
//       },
//       defaultDate: new Date().toISOString(),
//       editable: false,
//       eventLimit: true, // allow "more" link when too many events
//       events: [
//         {
//           title: 'All Day Event',
//           start: '2016-01-01'
//         },
//         {
//           title: 'Long Event',
//           start: '2016-01-07',
//           end: '2016-01-10'
//         },
//         {
//           id: 999,
//           title: 'Repeating Event',
//           start: '2016-01-09T16:00:00'
//         },
//         {
//           id: 999,
//           title: 'Repeating Event',
//           start: '2016-01-16T16:00:00'
//         },
//         {
//           title: 'Conference',
//           start: '2016-01-11',
//           end: '2016-01-13'
//         },
//         {
//           title: 'Meeting',
//           start: '2016-01-12T10:30:00',
//           end: '2016-01-12T12:30:00'
//         },
//         {
//           title: 'Lunch',
//           start: '2016-01-12T12:00:00'
//         },
//         {
//           title: 'Meeting',
//           start: '2016-01-12T14:30:00'
//         },
//         {
//           title: 'Happy Hour',
//           start: '2016-01-12T17:30:00'
//         },
//         {
//           title: 'Dinner',
//           start: '2016-01-12T20:00:00'
//         },
//       {
//         title: 'Birthday Party',
//         start: '2016-01-13T07:00:00'
//       },
//       {
//         title: 'Click for Google',
//         url: 'http://google.com/',
//         start: '2016-01-28'
//       }
//     ]
//   });
//   });
});
