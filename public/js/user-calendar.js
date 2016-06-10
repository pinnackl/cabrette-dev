$(function(){
  initCalendar();
});
function initCalendar(filters) {
    var vhInPx = document.documentElement.clientHeight * 0.01;
    var eventsByDay={};
    var eventsBackup;
    var mouseInTimeout;
    var mouseOutTimeout;
    var mouseInDelay=500;
    var mouseOutDelay=1000;
    var $calendarInfo = $('.calendar');
    var dateFormat = 'YYYY-MM-DD';
    var types=["hobbie","voyage","sport","rd","other"];
    var icons =
            {
                hobbie:'/img/type/sortie.png',
                voyage:'/img/type/voyage.png',
                sport:'/img/type/sport.png',
                rd:'/img/type/RDV.png',
                other:'/img/type/autre.png'
            }
    var colors =
            {
                hobbie:'#c60016',
                voyage:'#135fd2',
                sport:'#ef7c00',
                rd:'#918E8E',
                other:'#268a00'
            }
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
        eventColor: 'transparent',
        defaultView: 'month',
        eventSources: [{
            events: function loadFreeTimeSlots(start, end, timezone, callback) {
                var params = ['date_start='+ start.format(dateFormat),'date_end='+ end.format(dateFormat)];
                for (var key in filters) {
                    params.push(key+"="+filters[key]);
                }
                $.get($calendarInfo.data('fetch-url') + '?' + params.join('&'), function (data) {
                    var events = [];

                    for (var index in data.eventsUser) {
                        var event = data.eventsUser[index];
                        events.push({
                            id: event._id,
                            title:  event.title,
                            start: event.date_start,
                            end: event.date_end,
                            type: event.type,
                            description: event.title
                        });
                    }
                    eventsBackup=events;
                    callback(events);
                });
            }
        }],

        eventClick: function eventClicked(event) {
            $('.content-right').animate({scrollTop: $("#"+event._id).offset().top + 100}, 'slow'      );
        },

        dayClick: function(date, allDay, jsEvent, view) {

                alert('Clicked on: ' + date.format());

        },

        eventDrop: function (event, delta, revertFunc) {

            $.ajax({
                method: 'PUT',
                url: $calendarInfo.data('fetch-url') + '/' + event.id,
                data: {
                    date_start: event.start.format(dateFormat),
                    date_end: event.end.format(dateFormat)
                },
                error: function () {
                    revertFunc();
                    alert('Erreur lors du déplacement de créneau')
                },
                success: function(data) {
                    $.each(data.eventsUser, function( index, value ) {
                        if(value._id == $('.eventsClass').data('id')) {
                            //if(value.date_start < $('.eventsClass').data('date_start')) {
                            //    console.log('inférieur');
                            //}
                        }
                       // data('id').val();
                    });
                }
            });
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

            if (event.type) {
                  element.find("div.fc-content").prepend('<div class="event-circle" style="background-color:'+colors[event.type]+'"></div>');
            }
            element.attr("data-id", event.id);
            element.attr("data-type", event.type);
            element.attr("data-event-total", "1");
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

        eventAfterAllRender(view) {
          if(view.type=="month"){
            $(".fc-event-container").each(function(){
              for(i=0;i<types.length;i++){
                while($(this).find('a[data-type="'+types[i]+'"]').length>1){
                    var prevcount=parseInt($(this).find('a[data-type="'+types[i]+'"]').first().attr("data-event-total"));
                    var count=parseInt($(this).find('a[data-type="'+types[i]+'"]').last().attr("data-event-total"));
                    $(this).find('a[data-type="'+types[i]+'"]').first().attr("data-event-total",count+prevcount).find(".event-circle").html(count+prevcount);
                    $(this).find('a[data-type="'+types[i]+'"]').first().append($("<span class='calendar-event-hidden-span' data-id='"+$(this).find('a[data-type="'+types[i]+'"]').last().attr("data-id")+"'></span>"))
                    $(this).find('a[data-type="'+types[i]+'"]').last().remove();
                }
                if($(this).find('a[data-type="'+types[i]+'"]').length){
                    $(this).find('a[data-type="'+types[i]+'"]').first().append($("<span class='calendar-event-hidden-span' data-id='"+$(this).find('a[data-type="'+types[i]+'"]').last().attr("data-id")+"'></span>"))                }
              }
            });
            $(".fc-content-skeleton tbody td").each(function(index){
              $(this).attr("data-date", view.dayGrid.dayDates[index].format("YYYY-MM-DD"));
            })
          }
          eventsByDay={};
          for(i=0;i<eventsBackup.length;i++){
            var curDay=moment(eventsBackup[i].start);
            var curDayFormatted=curDay.format("YYYY-MM-DD");
            if(eventsByDay.hasOwnProperty(curDayFormatted)){
              eventsByDay[curDayFormatted].push(eventsBackup[i]);
            }else{
              eventsByDay[curDayFormatted]=[eventsBackup[i]];
            }
            curDay.add(1,'d');
            curDayFormatted=curDay.format("YYYY-MM-DD");
            while(curDay.isSame(eventsBackup[i].end) || curDay.isBefore(eventsBackup[i].end)){

              if(eventsByDay.hasOwnProperty(curDayFormatted)){
                eventsByDay[curDayFormatted].push(eventsBackup[i]);
              }else{
                eventsByDay[curDayFormatted]=[eventsBackup[i]];
              }
              curDay.add(1,'d');
              curDayFormatted=curDay.format("YYYY-MM-DD");
            }
          }

        },

        eventMouseover: function(calEvent, jsEvent) {
          var eventids=[];

          $(jsEvent.toElement).find(".calendar-event-hidden-span").each(function(){
            eventids.push($(this).attr("data-id"));
          });
          mouseoverEvent(eventids);
          clearTimeout(mouseOutTimeout);
            mouseInTimeout = setTimeout(function() {
              $('.tooltipevent').remove();
              var tooltip = $('<div class="tooltipevent" style="width:100px;height:100px;background:#ccc;position:absolute;z-index:10001;display:none"></div>');
              var dayEvents = eventsByDay[$(jsEvent.toElement).parent("td").attr("data-date")];
              for(i=0; i<dayEvents.length;i++){
                var curEvent=dayEvents[i];
                if(curEvent.type == calEvent.type){
                  tooltip.append(curEvent.title+'<br>');
                }
              }
              tooltip.mouseleave(function(){
                var tempTimeout=setTimeout(function(){
                  if($('.tooltipevent:hover').length){
                    return;
                  }
                  $('.tooltipevent').fadeOut("400", function(){
                    $(this).remove();
                  })
                },mouseOutDelay);
              });
              $("body").append(tooltip);
              tooltip.css('top', jsEvent.pageY-110);
              tooltip.css('left', jsEvent.pageX+10);
              tooltip.fadeIn(400);
            }, mouseInDelay);
            //$("a[data-id='"+id+"']").parent("td").css('background-color', colors[calEvent.type]);
        },

        eventMouseout: function(calEvent, jsEvent) {
          var eventids=[];
          $(jsEvent.toElement).find(".calendar-event-hidden-span").each(function(){
            eventids.push($(this).attr("data-id"));
          });
          mouseoutEvent(eventids);
            clearTimeout(mouseInTimeout);
            mouseOutTimeout = setTimeout(function() {
              if($('.tooltipevent:hover').length){
                return;
              }
              $('.tooltipevent').fadeOut("400", function(){
                $(this).remove();
              });
            },mouseOutDelay);

            $(this).css('z-index', 8);
            var id=$(this).attr("data-id");
            //$("a[data-id='"+id+"']").parent("td").css("background-color", '');
        },
    });
}
