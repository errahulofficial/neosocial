@extends('layouts.master')

@section('content')
<style>
    .socials li {
    display: inline;
    justify-content: center;
    align-items: center;
    height: 0px;
    padding: 2px;
    }
    ul{
      margin-block-start: 0em;
    margin-block-end: 0em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 0px;
    }
    .blue{
      color: #007bff!important;
    }
    .lightblue{
    color: #3c8dbc!important;
    }
    .orange {
    color: #fd7e14!important;
}
.success {
    color: #28a745!important;
}
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Calender</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">


        <!-- Main row -->
        <div class="row first-row">
            <!-- Left col -->
            <section class="col-lg-12 ">


                <div class="col-lg-12">
                    <ul class="nav nav-pills mb-2" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-calendar-tab" data-toggle="pill"
                                href="#custom-tabs-three-calendar" role="tab" aria-controls="custom-tabs-three-calendar"
                                aria-selected="true"><i class="fas fa-calendar-alt mr-1"></i> Calender</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-agenda-tab" data-toggle="pill"
                                href="#custom-tabs-three-agenda" role="tab" aria-controls="custom-tabs-three-agenda"
                                aria-selected="false"><i class=" fas fa-bars mr-1"></i> Agenda</a>
                        </li>


                    </ul>
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-three-calendar" role="tabpanel"
                            aria-labelledby="custom-tabs-three-calendar-tab">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <!-- the events -->
                                    <div id="external-events">

                                    </div>
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--custom-tabs-three-research-->
                        <div class="tab-pane fade show " id="custom-tabs-three-agenda" role="tabpanel"
                            aria-labelledby="custom-tabs-three-agenda-tab">
                            <div class="card">




                            </div>
                            <!-- /.card -->
                        </div>
                        <!--custom-tabs-three-content-->




                    </div>
                    <!--custom-tabs-three-tabContent-->
                </div>
                <!--column-12-->




            </section>
            <!-- /.Left col -->

        </div>
        <!-- /.row (main row) -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->



<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- FLOT CHARTS -->
<script src="{{asset('plugins/flot/jquery.flot.js')}}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{asset('plugins/flot-old/jquery.flot.resize.min.js')}}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{asset('plugins/flot-old/jquery.flot.pie.min.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar/main.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar-daygrid/main.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar-timegrid/main.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar-interaction/main.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar-bootstrap/main.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function () {

/* initialize the external events
 -----------------------------------------------------------------*/
function ini_events(ele) {
  ele.each(function () {

    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
    // it doesn't need to have a start or end
    var eventObject = {
      title: $.trim($(this).text()) // use the element's text as the event title
    }

    // store the Event Object in the DOM element so we can get to it later
    $(this).data('eventObject', eventObject)

    // make the event draggable using jQuery UI
    $(this).draggable({
      zIndex        : 1070,
      revert        : true, // will cause the event to go back to its
      revertDuration: 0  //  original position after the drag
    })

  })
}

ini_events($('#external-events div.external-event'))

/* initialize the calendar
 -----------------------------------------------------------------*/
//Date for the calendar events (dummy data)
var date = new Date()
var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()

var Calendar = FullCalendar.Calendar;
var Draggable = FullCalendarInteraction.Draggable;

var containerEl = document.getElementById('external-events');
var checkbox = document.getElementById('drop-remove');
var calendarEl = document.getElementById('calendar');

// initialize the external events
// -----------------------------------------------------------------

new Draggable(containerEl, {
  itemSelector: '.external-event',
  eventData: function(eventEl) {
    console.log(eventEl);
    return {
      title: eventEl.innerText,
      backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
      borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
      textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
    };
  }
});

var calendar = new Calendar(calendarEl, {
  plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
  header    : {
    left  : 'prev,next today',
    center: 'title',
    right : 'dayGridMonth,dayGridWeek,dayGridDay'
  },
  'themeSystem': 'bootstrap',
  //Random default events
  fixedWeekCount: false,
  editable  : true,
  droppable : true, // this allows things to be dropped onto the calendar !!!
  drop      : function(info) {
    // is the "remove after drop" checkbox checked?
    if (checkbox.checked) {
      // if so, remove the element from the "Draggable Events" list
      info.draggedEl.parentNode.removeChild(info.draggedEl);
    }
  }    
});

calendar.render();

// $('#calendar').fullCalendar()

/* ADDING EVENTS */
var currColor = '#3c8dbc' //Red by default
//Color chooser button
var colorChooser = $('#color-chooser-btn')
$('#color-chooser > li > a').click(function (e) {
  e.preventDefault()
  //Save color
  currColor = $(this).css('color')
  //Add color effect to button
  $('#add-new-event').css({
    'background-color': currColor,
    'border-color'    : currColor
  })
})
$('#add-new-event').click(function (e) {
  e.preventDefault()
  //Get value and make sure it is not null
  var val = $('#new-event').val()
  if (val.length == 0) {
    return
  }

  //Create events
  var event = $('<div />')
  event.css({
    'background-color': currColor,
    'border-color'    : currColor,
    'color'           : '#fff'
  }).addClass('external-event')
  event.html(val)
  $('#external-events').prepend(event)

  //Add draggable funtionality
  ini_events(event)

  //Remove event from text input
  $('#new-event').val('')
});

$('.fc-dayGridMonth-button').attr('onclick','dayGridMonth()');
$('.fc-dayGridWeek-button').attr('onclick','dayGridWeek()');
$('.fc-dayGridDay-button').attr('onclick','dayGridDay()');
$('.fc-prev-button').attr('onclick','dayGridDay()');
$('.fc-next-button').attr('onclick','dayGridDay()');

});


     
$.ajax({url: "/ajax/post-business/", success: function(posts){
  console.log(posts);
  
    var fb;
    var insta;
    var tw;
    var gb;
    var body;
    var date;
    var tab1;
    var tab = $('.fc-bg > table > tbody > tr td');  
       // console.log(tab1.length);
        tab.each(function(){
            let x = $(this);
          
            
    $.each(posts[0], function( index, val ) {
      //   
        date = val['posting_time'].substring(0,10);   
        tab1 = x.parents('.fc-bg').siblings('.fc-content-skeleton').find('table > tbody tr td'); 
        if(x.data("date") === date){    
          $.each(posts[1], function( i, valu ) { 
            if(valu['business_id'] == val['business']){
            if(valu['name'] == 'Facebook'){
                fb = '<li class="blue"><i class="blue nav-icon fab fa-facebook-f"></i></li>';
                  }if(valu['name'] == 'Twitter'){
                tw = '<li class="lightblue"><i class="lightblue nav-icon fab fa-twitter"></i></li>';
                  }if(valu['name'] == 'Instagram'){
                insta = '<li class="orange"><i class="orange nav-icon fab fa-instagram"></i></li>';
                  }if(valu['name'] == 'Google Business'){
                gb = '<li class="success"><i class="success nav-icon fab fa-google"></i></li>';
              }
              }
              });
                 body = '<div style="background:aliceblue;flex-flow: row;box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.10);margin: 5px;position: relative;border-left: aqua 2px solid;"> <div class="row"style="flex-flow: row;" >'+
                 '<div class="col-2">'+
                '<img class="img-fluid" style="max-height:20px" src='+val['img_dir']+'/'+val['image']+'>'+
                 '</div>'+
                 '<div class="col-10">'+
                '<span>'+val['b_name']+
                '</span>'+
                 '</div>'+
                '</div>'+
                '<div class="row" style="flex-flow: row;">'+
                 '<div class="col-5">'+
                '<i class="fas fa-clock" style="color:grey"></i>'+val['posting_time'].slice(-8)+
                 '</div>'+
                 '<div class="col-7">'+
                '<div class="socials">'+
                    '<ul>'+ 
                    fb+tw+insta+gb
                  + ' </ul>'+
                '</div>'+
                 '</div>'+
                '</div></div>';
        }
        else{
             body = '';
        }
        tab1.eq(x.index()).append(body);
        fb = tw = insta = gb = '';
      
});
        });
}});

</script>
<script>
  

function dayGridMonth(){
  $('.fc-dayGridMonth-button').attr('onclick','dayGridMonth()');
$('.fc-dayGridWeek-button').attr('onclick','dayGridWeek()');
$('.fc-dayGridDay-button').attr('onclick','dayGridDay()');
$('.fc-prev-button').attr('onclick','dayGridDay()');
$('.fc-next-button').attr('onclick','dayGridDay()');
  
$.ajax({url: "/ajax/post-business/", success: function(posts){
  console.log(posts);
  
    var fb;
    var insta;
    var tw;
    var gb;
    var body;
    var date;
    var tab1;
    var tab = $('.fc-bg > table > tbody > tr td');  
       // console.log(tab1.length);
        tab.each(function(){
            let x = $(this);
          
            
    $.each(posts[0], function( index, val ) {
      //   
        date = val['posting_time'].substring(0,10);   
        tab1 = x.parents('.fc-bg').siblings('.fc-content-skeleton').find('table > tbody tr td'); 
        if(x.data("date") === date){    
          $.each(posts[1], function( i, valu ) { 
            if(valu['business_id'] == val['business']){
            if(valu['name'] == 'Facebook'){
                fb = '<li class="blue"><i class="blue nav-icon fab fa-facebook-f"></i></li>';
                  }if(valu['name'] == 'Twitter'){
                tw = '<li class="lightblue"><i class="lightblue nav-icon fab fa-twitter"></i></li>';
                  }if(valu['name'] == 'Instagram'){
                insta = '<li class="orange"><i class="orange nav-icon fab fa-instagram"></i></li>';
                  }if(valu['name'] == 'Google Business'){
                gb = '<li class="success"><i class="success nav-icon fab fa-google"></i></li>';
              }
              }
              });
                 body = '<div style="background:aliceblue;flex-flow: row;box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.10);margin: 5px;position: relative;border-left: aqua 2px solid;"> <div class="row"style="flex-flow: row;" >'+
                 '<div class="col-2">'+
                '<img class="img-fluid" style="max-height:20px" src='+val['img_dir']+'/'+val['image']+'>'+
                 '</div>'+
                 '<div class="col-10">'+
                '<span>'+val['b_name']+
                '</span>'+
                 '</div>'+
                '</div>'+
                '<div class="row" style="flex-flow: row;">'+
                 '<div class="col-5">'+
                '<i class="fas fa-clock" style="color:grey"></i>'+val['posting_time'].slice(-8)+
                 '</div>'+
                 '<div class="col-7">'+
                '<div class="socials">'+
                    '<ul>'+ 
                    fb+tw+insta+gb
                  + ' </ul>'+
                '</div>'+
                 '</div>'+
                '</div></div>';
        }
        else{
             body = '';
        }
        tab1.eq(x.index()).append(body);
        fb = tw = insta = gb = '';
      
});
        });
}});
  
}

function dayGridWeek(){
  $('.fc-dayGridMonth-button').attr('onclick','dayGridMonth()');
$('.fc-dayGridWeek-button').attr('onclick','dayGridWeek()');
$('.fc-dayGridDay-button').attr('onclick','dayGridDay()');
$('.fc-prev-button').attr('onclick','dayGridDay()');
$('.fc-next-button').attr('onclick','dayGridDay()');
$.ajax({url: "/ajax/post-business/", success: function(posts){
  console.log(posts);
  
    var fb;
    var insta;
    var tw;
    var gb;
    var body;
    var date;
    var tab1;
    var tab = $('.fc-bg > table > tbody > tr td');  
       // console.log(tab1.length);
        tab.each(function(){
            let x = $(this);
          
            
    $.each(posts[0], function( index, val ) {
      //   
        date = val['posting_time'].substring(0,10);   
        tab1 = x.parents('.fc-bg').siblings('.fc-content-skeleton').find('table > tbody tr td'); 
        if(x.data("date") === date){    
          $.each(posts[1], function( i, valu ) { 
            if(valu['business_id'] == val['business']){
            if(valu['name'] == 'Facebook'){
                fb = '<li class="blue"><i class="blue nav-icon fab fa-facebook-f"></i></li>';
                  }if(valu['name'] == 'Twitter'){
                tw = '<li class="lightblue"><i class="lightblue nav-icon fab fa-twitter"></i></li>';
                  }if(valu['name'] == 'Instagram'){
                insta = '<li class="orange"><i class="orange nav-icon fab fa-instagram"></i></li>';
                  }if(valu['name'] == 'Google Business'){
                gb = '<li class="success"><i class="success nav-icon fab fa-google"></i></li>';
              }
              }
              });
                 body = '<div style="background:aliceblue;flex-flow: row;box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.10);margin: 5px;position: relative;border-left: aqua 2px solid;"> <div class="row"style="flex-flow: row;" >'+
                 '<div class="col-2">'+
                '<img class="img-fluid" style="max-height:20px" src='+val['img_dir']+'/'+val['image']+'>'+
                 '</div>'+
                 '<div class="col-10">'+
                '<span>'+val['b_name']+
                '</span>'+
                 '</div>'+
                '</div>'+
                '<div class="row" style="flex-flow: row;">'+
                 '<div class="col-5">'+
                '<i class="fas fa-clock" style="color:grey"></i>'+val['posting_time'].slice(-8)+
                 '</div>'+
                 '<div class="col-7">'+
                '<div class="socials">'+
                    '<ul>'+ 
                    fb+tw+insta+gb
                  + ' </ul>'+
                '</div>'+
                 '</div>'+
                '</div></div>';
        }
        else{
             body = '';
        }
        tab1.eq(x.index()).append(body);
        fb = tw = insta = gb = '';
      
});
        });
}});
  
}
function dayGridDay(){
  $('.fc-dayGridMonth-button').attr('onclick','dayGridMonth()');
$('.fc-dayGridWeek-button').attr('onclick','dayGridWeek()');
$('.fc-dayGridDay-button').attr('onclick','dayGridDay()');
$('.fc-prev-button').attr('onclick','dayGridDay()');
$('.fc-next-button').attr('onclick','dayGridDay()');
$.ajax({url: "/ajax/post-business/", success: function(posts){
  console.log(posts);
  
    var fb;
    var insta;
    var tw;
    var gb;
    var body;
    var date;
    var tab1;
    var tab = $('.fc-bg > table > tbody > tr td');  
       // console.log(tab1.length);
        tab.each(function(){
            let x = $(this);
          
            
    $.each(posts[0], function( index, val ) {
      //   
        date = val['posting_time'].substring(0,10);   
        tab1 = x.parents('.fc-bg').siblings('.fc-content-skeleton').find('table > tbody tr td'); 
        if(x.data("date") === date){    
          $.each(posts[1], function( i, valu ) { 
            if(valu['business_id'] == val['business']){
            if(valu['name'] == 'Facebook'){
                fb = '<li class="blue"><i class="blue nav-icon fab fa-facebook-f"></i></li>';
                  }if(valu['name'] == 'Twitter'){
                tw = '<li class="lightblue"><i class="lightblue nav-icon fab fa-twitter"></i></li>';
                  }if(valu['name'] == 'Instagram'){
                insta = '<li class="orange"><i class="orange nav-icon fab fa-instagram"></i></li>';
                  }if(valu['name'] == 'Google Business'){
                gb = '<li class="success"><i class="success nav-icon fab fa-google"></i></li>';
              }
              }
              });
                 body = '<div style="background:aliceblue;flex-flow: row;box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.10);margin: 5px;position: relative;border-left: aqua 2px solid;"> <div class="row"style="flex-flow: row;" >'+
                 '<div class="col-2">'+
                '<img class="img-fluid" style="max-height:20px" src='+val['img_dir']+'/'+val['image']+'>'+
                 '</div>'+
                 '<div class="col-10">'+
                '<span>'+val['b_name']+
                '</span>'+
                 '</div>'+
                '</div>'+
                '<div class="row" style="flex-flow: row;">'+
                 '<div class="col-5">'+
                '<i class="fas fa-clock" style="color:grey"></i>'+val['posting_time'].slice(-8)+
                 '</div>'+
                 '<div class="col-7">'+
                '<div class="socials">'+
                    '<ul>'+ 
                    fb+tw+insta+gb
                  + ' </ul>'+
                '</div>'+
                 '</div>'+
                '</div></div>';
        }
        else{
             body = '';
        }
        tab1.eq(x.index()).append(body);
        fb = tw = insta = gb = '';
      
});
        });
}});
  
}


  </script>

@endsection