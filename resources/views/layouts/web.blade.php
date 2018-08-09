<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield ('title')</title>
        @yield ('metakeys')
        @yield ('script_add')

        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="/images/ico/144.png">
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="/images/ico/144.png">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="/images/ico/114.png">
        <!-- Standard iPad Touch Icon--> 
        <link rel="apple-touch-icon" sizes="72x72" href="/images/ico/72.png">
        <!-- Standard iPhone Touch Icon--> 
        <link rel="apple-touch-icon" sizes="57x57" href="/images/ico/57.png">
        
        <!-- =============== Google fonts =============== -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
        
        
        <!-- Font Awesome CSS -->
        <link href="{{asset ('/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link href="{{asset ('/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Nivo Slider CSS -->
        <link href="{{asset ('/css/nivo-slider.css') }}" rel="stylesheet">
        <!-- Animate CSS -->
        <link href="{{asset ('/css/animate.css') }}" rel="stylesheet">
        <!-- Owl Carousel CSS -->
        <link href="{{asset ('/css/owl.carousel.css') }}" rel="stylesheet">
        <!-- Main Style CSS -->
        <link href="{{asset ('/css/style.css') }}" rel="stylesheet">
        <!-- Responsive CSS -->
        <link href="{{asset ('/css/responsive.css') }}" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
  </head>
  <body>
        @include ('elements.menu');        
        <div class="main">
        	<div class="container">
            	
        @yield ('content')
        @yield ('footer')
        
                <!-- Jquery Js -->
        <script src="{{asset ('/js/jquery-1.11.3.min.js') }}"></script>
        <!-- Bootstrap Js -->
        <script src="{{asset ('/js/bootstrap.min.js') }}"></script>
        <!-- Owl Carousel Js -->
        <script src="{{asset ('/js/owl.carousel.min.js') }}"></script>
        <!-- Jquery ui Js -->
        <script src="{{asset ('/js/jquery-ui.min.js') }}"></script>
        <!-- Custom Js -->
        <script src="{{asset ('/js/custom.js') }}"></script>
        <!-- Nivo Slider Js -->
        <script src="{{asset ('/js/jquery.nivo.slider.pack.js') }}"></script>
        <!-- Owl Carousel Js -->
        <script src="{{asset ('/js/owl.carousel.min.js') }}"></script>
        <!-- Countdown Js -->
        <script src="{{asset ('/js/countdown.js') }}"></script>
        
        <script type="text/javascript">
            /* Main Slideshow */
            jQuery(window).load(function() {
                jQuery(document).off('mouseenter').on('mouseenter', '.pos-slideshow', function(e){
                    $('.ma-banner7-container .timethai').addClass('pos_hover');
                });
                jQuery(document).off('mouseleave').on('mouseleave', '.pos-slideshow', function(e){
                    $('.ma-banner7-container .timethai').removeClass('pos_hover');
                });
            });
            jQuery(window).load(function() {
                $('#ma-inivoslider-banner7').nivoSlider({
                    effect: 'random',
                    slices: 15,
                    boxCols: 8,
                    boxRows: 4,
                    animSpeed: 1000,
                    pauseTime: 6000,
                    startSlide: 0,
                    controlNav: false,
                    controlNavThumbs: false,
                    pauseOnHover: true,
                    manualAdvance: false,
                    prevText: 'Prev',
                    nextText: 'Next',
                    afterLoad: function(){
                        },     
                    beforeChange: function(){ 
                    }, 
                    afterChange: function(){ 
                    }
                });
            });
        </script>
       
        <!-- Hot Deals Timer 1-->
        <script type="text/javascript">
            var dthen1 = new Date("12/25/33 11:59:00 PM");
            start = "08/04/15 03:02:11 AM";
            start_date = Date.parse(start);
            var dnow1 = new Date(start_date);
            if(CountStepper>0)
                ddiff= new Date((dnow1)-(dthen1));
            else
                ddiff = new Date((dthen1)-(dnow1));
            gsecs1 = Math.floor(ddiff.valueOf()/1000);
            
            var iid1 = "countbox_1";
            CountBack_slider(gsecs1,"countbox_1", 1);
        </script>
        <!-- Hot Deals Timer 2-->
        <script type="text/javascript">
            var dthen2 = new Date("05/21/26 11:59:00 PM");
            start = "08/04/15 03:02:11 AM";
            start_date = Date.parse(start);
            var dnow2 = new Date(start_date);
            if(CountStepper>0)
                ddiff= new Date((dnow2)-(dthen2));
            else
                ddiff = new Date((dthen2)-(dnow2));
            gsecs2 = Math.floor(ddiff.valueOf()/1000);
            
            var iid2 = "countbox_2";
            CountBack_slider(gsecs2,"countbox_2", 2);
        </script>
        <!-- Hot Deals Timer 3-->
        <script type="text/javascript">
            var dthen3 = new Date("05/21/33 11:59:00 PM");
            start = "08/04/15 03:02:11 AM";
            start_date = Date.parse(start);
            var dnow3 = new Date(start_date);
            if(CountStepper>0)
                ddiff= new Date((dnow3)-(dthen3));
            else
                ddiff = new Date((dthen3)-(dnow3));
            gsecs3 = Math.floor(ddiff.valueOf()/1000);
            
            var iid3 = "countbox_3";
            CountBack_slider(gsecs3,"countbox_3", 3);
        </script>   

        @yield ('java_down')   
  </body>


