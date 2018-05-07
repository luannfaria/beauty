var Script = function () {


    /* initialize the external events
     -----------------------------------------------------------------*/




    /* initialize the calendar
     -----------------------------------------------------------------*/

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $(function() { // document ready

      $('#calendar').fullCalendar({
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
            allDaySlot: false,
            eventOverlap: false,
            defaultView: 'agendaDay',

            minTime: '08:00:00',
            maxTime: '19:00:00',
            slotLabelFormat:'HH:mm',
            slotDuration: '00:15:00',
            slotLabelInterval:'00:15:00',
          //  defaultTimedEventDuration: '00:30:00',
            editable: true,

            eventLimit: true,

            customButtons: {
       trava: {
           text: 'TRAVAR HORÁRIOS',
           click: function() {
             $('#travar').modal('show');
           }
       }
   },

            header: {
                left: 'prev,next today,trava',
                center: 'title',
                right: 'agendaDay,agendaTwoDay,agendaWeek'
            },


        views: {
          agendaTwoDay: {
            type: 'agenda',

            duration: { days: 2 },

            // views that are more than a day will NOT do this behavior by default
            // so, we need to explicitly enable it
            groupByResource: true

            //// uncomment this line to group by day FIRST with resources underneath
            //groupByDateAndResource: true
          }
        },

        //// uncomment this line to hide the all-day slot
        //allDaySlot: false,

        resources: {


                url: 'http://localhost/beauty/calendar/listausuarios',
                type: 'POST',
                data: {

                },
                success: function(data) {
                    console.log(data);
                },
                error: function() {
                    alert('CADASTRE ATENDENTES PARA USAR O MODULO AGENDA!');
                },
            },
        events: {


                url: 'http://localhost/beauty/calendar/listaeventos',
                type: 'POST',
                data: {

                },
                success: function(data) {
                    console.log(data);
                },
                error: function() {
                    alert('Erro ao carregar Calendario!');
                },
            },

        selectable: true,
                   selectHelper: true,

        select: function(start, end, jsEvent, view, resource) {
          console.log(
            'select',
            start.format(),
            end.format(),
            resource ? resource.id : '(no resource)'
          );
        },

        select: function(start, end, jsEvent, view, resource) {



              $('#cadastrar #dataInicial').val(moment(start).format('YYYY-MM-DD'));
                $('#cadastrar #start').val(moment(start).format('DD/MM/YYYY'));

                 $('#cadastrar #hora').val(moment(start).format('HH:mm'));

          //     $('#cadastrar #hora').val(moment(start).format('HH:mm'));

               $('#cadastrar #end').val(moment(start).add(40, 'minutes').format('HH:mm'));
                $('#cadastrar #resource').val(resource.id);
                $('#cadastrar #nomeatendente').val(resource.title);

//var resourceTitle = $("#calendar").fullCalendar("getResourceById",event.resourceId);

//$('#cadastrar #idatend').text(event.resourceId);
          //  $('#cadastrar #idatend').val(moment(start).resource.id);
                  //  $('#cadastrar #idatend').html(event.resourceId);
               $('#cadastrar').modal('show');



           },

           eventRender: function (event, element) {
        element.attr('href', 'javascript:void(0);');
      element.click(function() {
           $('#modal #start').html(moment(event.start).format('DD/MM/YYYY'));
           $('#modal #hora').html(moment(event.start).format('HH:mm'));
           $('#modal #end').html(moment(event.end).format('HH:mm'));
           $('#modal #id').val(event.description);
           $('#modal #numero').val(event.description);
           $('#modal #eventInfo').html(event.title);
           $('#modal #descricao').val(event.title);
           $('#modal #eventLink').attr('href', event.url);
            $('#modal').modal('show');
       });
    },




        dayClick: function(date, jsEvent, view) {

        $('#modalTitle').text(date.format());

    }
      });

    });


}();
