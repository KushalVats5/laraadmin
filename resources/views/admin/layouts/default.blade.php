<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>
    {{ config('app.name', 'Laravel') }}
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="{!! asset('theme/assets/js/dataTables/css/dataTables.bootstrap.min.css') !!}">


    <!-- Bootstrap Core CSS -->


    <link href="{!! asset('theme/assets/css/material-dashboard.css?v=2.1.1') !!}" rel="stylesheet">

    <link href="{!! asset('theme/assets/demo/demo.css') !!}" rel="stylesheet">

    <!-- MetisMenu CSS -->

    <link href="{!! asset('theme/vendor/metisMenu/metisMenu.min.css') !!}" rel="stylesheet">



    <!-- Custom CSS -->

    <link href="{!! asset('theme/dist/css/sb-admin-2.css') !!}" rel="stylesheet">



    <!-- Morris Charts CSS -->

    <link href="{!! asset('theme/vendor/morrisjs/morris.css') !!}" rel="stylesheet">



    <!-- Custom Fonts -->

    <link href="{!! asset('theme/vendor/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

    <script src="{!! asset('plugins/ckeditor/ckeditor.js') !!}"></script>


</head>

<body>



    <div id="wrapper">



        <!-- Navigation -->
        @include('admin/layouts.sidebar')
        <div class="main-panel">
            @include('admin/layouts.top-nav-bar')
            @yield('content')
            @include('admin/layouts.footer')
        </div>
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

        </nav>


        <!-- /#page-wrapper -->



    </div>

    <!-- /#wrapper -->



  <!--   Core JS Files   -->
  <script src="{!! asset('theme/assets/js/core/jquery.min.js') !!}"></script>

  <script src="{!! asset('theme/assets/js/core/popper.min.js') !!}"></script>
  <script src="{!! asset('theme/assets/js/core/bootstrap-material-design.min.js') !!}"></script>
  <script src="{!! asset('theme/assets/js/plugins/perfect-scrollbar.jquery.min.js') !!}"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{!! asset('theme/assets/js/plugins/moment.min.js') !!}"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{!! asset('theme/assets/js/plugins/sweetalert2.js') !!}"></script>
  <!-- Forms Validations Plugin -->
  <script src="{!! asset('theme/assets/js/plugins/jquery.validate.min.js') !!}"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{!! asset('theme/assets/js/plugins/jquery.bootstrap-wizard.js') !!}"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{!! asset('theme/assets/js/plugins/bootstrap-selectpicker.js') !!}"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{!! asset('theme/assets/js/plugins/bootstrap-datetimepicker.min.js') !!}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <!-- <script src="{!! asset('theme/assets/js/plugins/jquery.dataTables.min.js') !!}"></script> -->
  <script src="{!! asset('theme/assets/js/dataTables/js/jquery.dataTables.min.js') !!}"></script>
  <!-- <script src="{!! asset('theme/assets/js/dataTables/js/dataTables.bootstrap.min.js') !!}"></script> -->
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{!! asset('theme/assets/js/plugins/bootstrap-tagsinput.js') !!}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{!! asset('theme/assets/js/plugins/jasny-bootstrap.min.js') !!}"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{!! asset('theme/assets/js/plugins/fullcalendar.min.js') !!}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{!! asset('theme/assets/js/plugins/jquery-jvectormap.js') !!}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{!! asset('theme/assets/js/plugins/nouislider.min.js') !!}"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js') !!}"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{!! asset('theme/assets/js/plugins/arrive.min.js') !!}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE') !!}"></script>
  <!-- Chartist JS -->
  <script src="{!! asset('theme/assets/js/plugins/chartist.min.js') !!}"></script>
  <!--  Notifications Plugin    -->
  <script src="{!! asset('theme/assets/js/plugins/bootstrap-notify.js') !!}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{!! asset('theme/assets/js/material-dashboard.js?v=2.1.1" type="text/javascript') !!}"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{!! asset('theme/assets/demo/demo.js') !!}"></script>
    <!-- ckeditor -->
  <!-- <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script> -->
  <script src="{!! asset('theme/assets/js/admin-script.js') !!}"></script>
  <script>
    function changeProfile() {
        $('#file').click();
    }
    $('#file').change(function () {
        if ($(this).val() != '') {
            upload(this);

        }
    });
    function upload(img) {
        var form_data = new FormData();
        form_data.append('file', img.files[0]);
        form_data.append('_token', '{{csrf_token()}}');
        $('#loading').css('display', 'block');
        $.ajax({
            url: "{{route('profile-upload')}}",
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.fail) {
                    $('#preview_image').attr('src', '{{asset('theme/assets/img/faces/marc.jpg')}}');
                    alert(data.errors['file']);
                }
                else {
                    $('#file_name').val(data);
                    $('#preview_image').attr('src', '{{asset('uploads/profiles/thumb/')}}/' + data);
                }
                $('#loading').css('display', 'none');
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
                $('#preview_image').attr('src', '{{asset('theme/assets/img/faces/marc.jpg')}}');
            }
        });
    }
    function removeFile() {
        if ($('#file_name').val() != '')
            if (confirm('Are you sure want to remove profile picture?')) {
                $('#loading').css('display', 'block');
                var form_data = new FormData();
                form_data.append('_method', 'DELETE');
                form_data.append('_token', '{{csrf_token()}}');
                // + $('#file_name').val()
                let img =  $('#file_name').val();
                $.ajax({
                    url: "{{url('/ajax-remove-profile')}}/"+img ,
                    data: form_data,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#preview_image').attr('src', '{{asset('theme/assets/img/faces/marc.jpg')}}');
                        $('#file_name').val('');
                        $('#loading').css('display', 'none');
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            }
    }
// Remove all tags
function removeTags(route) {
    if (confirm('Are you sure want to remove all tags?')) {
        $('#loading').css('display', 'block');

        $.ajax({
            url: route ,
            success: function (data) {
               alert("Tags remove");
                $('.tag-itmes').html('');
                $('#loading').css('display', 'none');
                $('.remove-tags').remove();
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }
}
</script>

  <script>
//   md.showNotification('top','right');
  $('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#'+tog).prop('value', sel);

        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    });
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
  <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

    <!-- jQuery -->

    <script src="{!! asset('theme/vendor/jquery/jquery.min.js') !!}"></script>



    <!-- Bootstrap Core JavaScript -->

    <script src="{!! asset('theme/vendor/bootstrap/js/bootstrap.min.js') !!}"></script>



    <!-- Metis Menu Plugin JavaScript -->

    <script src="{!! asset('theme/vendor/metisMenu/metisMenu.min.js') !!}"></script>
    <!-- Morris Charts JavaScript -->
    <script src="{!! asset('theme/vendor/raphael/raphael.min.js') !!}"></script>
    <script src="{!! asset('theme/vendor/morrisjs/morris.min.js') !!}"></script>
    <script src="{!! asset('theme/data/morris-data.js') !!}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('theme/dist/js/sb-admin-2.js') !!}"></script>

</body>
</html>
