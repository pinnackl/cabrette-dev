$(function(){
  initCalendar();
});
function initCalendar(filters) {
    var vhInPx = document.documentElement.clientHeight * 0.01;
    var eventsBackup;
    var $calendarInfo = $('.calendar');
    var dateFormat = 'YYYY-MM-DD';
    $('#user-calendar').fullCalendar({
        lang: 'fr',
        titleFormat:'MMM YYYY',
        header: {
            left: 'title',
            center: '',
            right: 'prev,next'
        },

        firstDay: 1,
        minTime: '00:00',
        maxTime: '23:59',
        eventLimit: 20,
        editable: true,
        height: vhInPx*70,
        eventColor: '#378006',
        defaultView: 'month',
        eventSources: [{
            events: function loadFreeTimeSlots(start, end, timezone, callback) {
                var params = ['date_start='+ start.format(dateFormat),'date_end='+ end.format(dateFormat)];
                for (var key in filters) {
                    params.push(key+"="+filters[key]);
                }
                $.get($calendarInfo.data('fetch-url') + '?' + params.join('&'), function (data) {
                    console.log(data)
                    var events = [];

                    for (var index in data.eventsUser) {
                        console.log('even');

                        var event = data.eventsUser[index];
                        console.log(event);
                        events.push({
                            id: event._id,
                            title:  event.title,
                            start: event.date_start,
                            end: event.date_end,
                            description: event.title
                        });
                    }
                    eventsBackup=events;
                    callback(events);
                });
            }
        }],

        eventClick: function eventClicked(event) {
        },

        dayClick: function(date, allDay, jsEvent, view) {

                alert('Clicked on: ' + date.format());

        },

        eventDrop: function (event, delta, revertFunc) {

        },

        eventResize: function (event, delta, revertFunc) {
            $.ajax({
                method: 'PUT',
                url: $calendarInfo.data('fetch-url') + '/' + event.id,
                data: {
                    resize: 'true',
                    date_end: event.end.format(dateFormat)
                },
                error: function () {
                    revertFunc();
                    alert('Erreur lors du redimensionnement')
                }
            });

        },

        eventRender: function(event, element,view) {

            $('td.fc-day').hover(function () {

                //css('background-color', 'red');
            } );
            //element.html(event.title+"<i  class='fa fa-close pull-right text-danger' id='"+event.id+"'></i>");

            element.hover(function () {

            });


            element.mouseover(function ()
            {
                $(this).tooltip({
                    content: "Awesome title!"
                });

                //var strDate = $(this).data('date');
                $(this).addClass('fc-highlight');
            });
            element.mouseout(function ()
            {
                $(this).removeClass('fc-highlight');
            })
            $('td.fc-day-number').mouseout(function () {});
        },

        eventMouseover: function(calEvent, jsEvent) {
          var eventids=[];

            //$("a[data-id='"+id+"']").parent("td").css('background-color', colors[calEvent.type]);
        },

        eventMouseout: function(calEvent, jsEvent) {

            //$("a[data-id='"+id+"']").parent("td").css("background-color", '');
        },
    });
}
