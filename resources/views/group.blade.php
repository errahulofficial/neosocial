@extends('layouts.master')

@section('content')
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
                    <li class="breadcrumb-item active">Groups</li>
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
            <section class="col-lg-12 connectedSortable business-content">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-uppercase"><i class="nav-icon fas fa-th mr-2"></i> Groups
                            <span class="badge bg-navy ">2</span></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-block orange-button text-uppercase" data-toggle="modal"
                                data-target="#modal-default"><i class="nav-icon fas fa-plus mr-1"></i> Add New
                                Group</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-uppercase">ICON</th>
                                    <th class="text-uppercase">Group</th>
                                    <th class="text-uppercase">Businesses</th>
                                    <th class="text-uppercase">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                <!--row-start-1-->
                                @foreach ($group as $grp)

                                <tr>
                                    <td>
                                        <div class="select-box-icon" style="background:{{$grp->color}}"><i
                                                class="nav-icon {{$grp->icon_link}}"></i></div>
                                    </td>
                                    <td>
                                        <div class="group-name" style="color:{{$grp->color}}">
                                            <span class="dot">.</span>{{$grp->name}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="address">
                                            <ul class="icon-list">
                                                <li class="numbers"><i
                                                        class="nav-icon fas fa-briefcase"></i>{{$grp->no_business}}</li>

                                            </ul>
                                        </div>
                                    </td>


                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn bg-white" data-toggle="modal"
                                                data-target="#modal-{{$grp->id}}"><i
                                                    class="nav-icon fas fa fa-edit"></i></a>
                                            <a href="#" class="btn bg-gray" data-toggle="modal"
                                                data-target="#modal-delete-{{$grp->id}}"><i
                                                    class="nav-icon fas fa-trash-alt"></i></a>
                                        </div>
                                        <!--Modal-Add-New-Group-->
                                        <div class="modal fade" id="modal-{{$grp->id}}">
                                            {!! Form::open(['action' =>
                                            ['GroupController@update',''.$grp->id],'id'=>'form']) !!}
                                            {{ Form::token() }}
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"> UPDATE {{strtoupper($grp->name)}}
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card card-primary card-outline">

                                                            <!-- /.card-header -->
                                                            <div class="card-body">
                                                                <div class="form-group ">
                                                                    <label for="name" class=" ">Group Name</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                            id="groupname" placeholder="Group Name"
                                                                            name="name" value="{{$grp->name}}">
                                                                    </div>
                                                                </div>

                                                                <!-- Color Picker -->
                                                                <div class="form-group">
                                                                    <label>Choose Group Color</label>

                                                                    <div class="input-group my-colorpicker2">
                                                                        <input id='mycolor' type="text"
                                                                            class="form-control" name="color"
                                                                            value="{{$grp->color}}">

                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="fas fa-square"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.input group -->
                                                                </div>
                                                                <!-- /.form group -->

                                                                <div class="form-group ">
                                                                    <label for="name" class=" ">Choose Group
                                                                        Icon</label>
                                                                    <div class="input-group">
                                                                        <button onclick="return false"
                                                                            class="btn btn-default"
                                                                            data-icon="glyphicon-eject"
                                                                            role="iconpicker">Hola</button>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Add Listing To
                                                                        Group</label>{{ Form::select('business[]', $business,explode(',',$grp->business),array('class' => 'select2bs4','data-placeholder' => 'Search & Select Listings','required'=>'true', 'multiple' => 'true','width' => 100)) }}

                                                                </div>

                                                            </div>
                                                            <!-- /.card-body -->

                                                        </div>
                                                        <!-- /.card -->
                                                    </div>
                                                    <div class="modal-footer justify-content-between">

                                                        <button type="submit" class="btn btn-primary"><i
                                                                class=" fa fa-check"></i> Save</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                            {!! Form::close() !!}
                                        </div>
                                        <!-- /.modal -->

                                        <!--Modal-delete-->
                                        <div class="modal fade" id="modal-delete-{{$grp->id}}">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"> Warning</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card card-primary ">

                                                            <!-- /.card-header -->
                                                            <div class="card-body">

                                                                <h6>Are You Sure You Want To <strong
                                                                        id="deleteGroupName">{{$grp->name}} </strong>?
                                                                </h6>

                                                            </div>
                                                            <!-- /.card-body -->

                                                        </div>
                                                        <!-- /.card -->
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <a href="{{url('/group/delete/'.$grp->id)}}">
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fas fa-times mr-1"></i> Delete</button>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </td>
                                </tr>
                                <!--row-end-->

                                @endforeach
                                </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->



            </section>
            <!-- /.Left col -->

        </div>
        <!-- /.row (main row) -->

    </div><!-- /.container-fluid -->
</section>

<!--Modal-Add-New-Group-->
<div class="modal fade" id="modal-default">
    {!! Form::open(['action' =>
    'GroupController@store','id'=>'form']) !!}
    {{ Form::token() }}
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> CREATE A GROUP</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary card-outline">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group ">
                            <label for="name" class=" ">Group Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="groupname" placeholder="Group Name"
                                    name="name">
                            </div>
                        </div>

                        <!-- Color Picker -->
                        <div class="form-group">
                            <label>Choose Group Color</label>

                            <div class="input-group my-colorpicker2">
                                <input type="text" class="form-control" name="color">

                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <div class="form-group ">
                            <label for="name" class=" ">Choose Group Icon</label>
                            <div class="input-group">
                                <button onclick="return false" class="btn btn-default" data-icon="glyphicon-eject"
                                    role="iconpicker">Hola</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Add Listing To
                                Group</label>{{ Form::select('business[]', $business,'',array('class' => 'select2bs4','data-placeholder' => 'Search & Select Listings','required'=>'true', 'multiple' => 'true','width' => 100)) }}

                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
            <div class="modal-footer justify-content-between">

                <button type="submit" class="btn btn-primary"><i class=" fa fa-check"></i> Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    {!! Form::close() !!}
</div>
<!-- /.modal -->



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
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  //Initialize Select2 Elements
  $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  $(document).ready(function () {
      $('.dropdown.tir').click(function () {
          $(this).find('.dropdown-content').toggleClass('show');
      });
  });
  $('#compose-textarea').summernote()
  $(document).mouseup(function (e) {
      var dropdown = $(".dropdown");
      if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
          $('.dropdown-content').removeClass('show');
      }

       //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  });
</script>

<!-- Code injected by live-server -->
<script>
    $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data        = [],
        totalPoints = 100

    function getRandomData() {

      if (data.length > 0) {
        data = data.slice(1)
      }

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive', [
        {
          data: getRandomData(),
        }
      ],
      {
        grid: {
          borderColor: '#f3f3f3',
          borderWidth: 1,
          tickColor: '#f3f3f3'
        },
        series: {
          color: '#3b5998',
          lines: {
            lineWidth: 2,
            show: true,
            fill: true,
          },
        },
        yaxis: {
          min: 0,
          max: 100,
          show: true
        },
        xaxis: {
          show: true
        }
      }
    )

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on') {
        setTimeout(update, updateInterval)
      }
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */



  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }

  
</script>

<script>
    $(function(){

var icons = [
    'fab fa-accessible-icon',
    'fab fa-accusoft',
    'fas fa-american-sign-language-interpreting',
    'fab fa-android',
    'fab fa-algolia',
    'fab fa-angellist',
    'fab fa-apple-pay',
    'fab fa-artstation',
    'fas fa-baseball-ball',
    'fas fa-beer',
    'fas fa-blender-phone',
    'fas fa-bong',
    'fab fa-apple-pay',
    'fab fa-artstation',
    'fas fa-baseball-ball',
    'fas fa-beer',
    'fas fa-blender-phone',
    'fas fa-bong',
     
];

var length = icons.length;
var rows = 3;
var cols = 4;

var target = $('button[role="iconpicker"]').html('');

var input = $('<input type="hidden" class="icon-input" name="icon_link"></input>')

var span = $('<span class="icon-xfactor"></span>');

target.append(span).append(input).append('<span class="caret fas fa-angle-down"></span>');

target.data('page', 1);

var updateNav = function(page){
    
    var total_pages = Math.ceil( length / (cols * rows) );
    
    table.find('.page-count').html(page + ' / ' + total_pages);
    
    if(page == 1){
        table.find('.btn-previous').addClass('disabled');    
    }
    else{
        table.find('.btn-previous').removeClass('disabled');
    }
    
    if(page == total_pages){
        table.find('.btn-next').addClass('disabled');    
    }
    else{
        table.find('.btn-next').removeClass('disabled');
    }  
};


var table = $('<table class="table-icons"><thead></thead><tbody></tbody></table>');    

var tr = $('<tr></tr>');
for(var i=0; i<cols; i++){
    var btn = $('<button class="btn btn-primary"><span class="fas"></span></button>');        
    var td = $('<td class="text-center"></td>');
    if(i == 0 || i == cols - 1){            
        btn.val((i==0) ? -1: 1);
        btn.addClass((i==0) ? 'btn-previous': 'btn-next');
        btn.find('span').addClass((i==0) ? 'fa-angle-left': 'fa-angle-right');            
        td.append(btn);
        tr.append(td);
    }
    else if(tr.find('.page-count').length == 0){
        td.attr('colspan', cols-2).append('<span class="page-count"></span>');
        tr.append(td);            
    }            
}
table.find('thead').append(tr);

var bindEvents = function(){        
    table.find('.btn-previous, .btn-next').off('click').on('click', function(){
        var page = parseInt(target.data('page'));
        var inc = parseInt($(this).val());
        changeList(page+inc);
    });
    table.find('.btn-icon').off('click').on('click', function(){

            select($(this).val());
    });
}




updateNav(1);
    
var selected = -1;
var con;
$('button[role="iconpicker"]').click(function(){
    con = $(this).parents('.modal');
  
});
var select = function(icon){
    selected = $.inArray(icon, icons);    
    if(icon != '' && selected >= 0){
        
       con.find(target).data('icon', icon);
      con.find('.icon-input').val(icon);
      con.find('.icon-xfactor').attr('class', '').addClass('icon-xfactor').addClass('fab').addClass(icon);
        table.find('button.btn-warning').removeClass('btn-warning');
        
        target.popover('hide');
    }    
}

var switchPage = function(icon){
    
    
    
    selected = $.inArray(icon, icons);    
    if(icon != '' && selected >= 0){
        var page = (selected != 0) ? Math.ceil( selected / (cols * rows) ) : 1;
        
        changeList(page);
    }    
    
    table.find('.'+icon).parent().addClass('btn-warning');
}

var changeList = function(page){
    page = parseInt(page);
    updateNav(page);
                    
    var tbody = table.find('tbody').empty();
    var offset = (page - 1) * rows * cols;
    for(var i=0; i<rows; i++){
        var tr = $('<tr></tr>');            
        for(var j=0; j<cols; j++){
            var pos = offset+(i*cols)+j;
            var btn = $('<button class="btn btn-default btn-icon"></button>').hide();
            if(pos < length){
                btn = $('<button class="btn btn-default btn-icon" value="' + icons[pos] + '"><span class="fab ' + icons[pos] + '"></span></button>');                            
            }                
            var td = $('<td></td>').append(btn);
            tr.append(td);
        }
        tbody.append(tr);
    }
    
    target.data('page', page);
    
    bindEvents();
}

changeList(1);

target.popover({
    html: true,
    content: table,
}).on('shown.bs.popover', function () {
    switchPage(target.data('icon'));
    bindEvents();
})

select(target.data('icon'));        

});

// $('#mycolor').on('change',
//     function()
//     {
//         console.log($(this).parent().parent().siblings('.form-group').find('.input-group').find('.btn-default').css("background-color", $(this).val()));
       
//     }
// );
</script>

@endsection