<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    	
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/lightbox/simpleLightbox.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/nice-select/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/animate-css/animate.css')}}">
        <!-- main css -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/demo.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/flex-slider.css')}}">
    <title>Document</title>
    <style>
        
       
        .hero-image {
        /* background-image: url({{asset("storage/eventImage/$singleEvent->event_image") }}); */

        /* background-image: #2d5986; */
        background-color: #2d5986;
        height: 600px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        }

        image{
            max-width: 100%;
            height: auto;
           
            
        }
        .gutterSpace{
            
            padding-right: 0px;
            
             
        }

        .event-description{
            margin-top:16px;
            height: auto;
            background-color: #FFF;
        }

        .event-description .dateMonth{
            color:#000;
            margin-left:15px;

        }

        .event-description .dateDay{
            color:#000;
            margin-left:15px;
        }

        .event-title{
           color:#000;
           margin-left:15px;
           margin-top: 20px;
        }

        .organizerName{
            margin-top:20px;
        }

        .event-title .ticketType{
            color:#000;
            margin-left:5px;
            margin-top: 20px;
            margin-top: 238px;
        }

        .eventDiv{
            background-color:#fff;;
            margin-right: 0px;
            margin-left: -16px;
           
            
            
        }

        /* .header_area .navbar{
            background-color: #000;
        } */

        
</style>
    
</head>
<body>
        @include('inc.navbar')
    {{-- style="margin-top:120px" --}}
   
    <div >
            <div class="hero-image">
                    <div class="container">
                            <div class="hero-text" style="padding-top:70px;padding-bottom:0px;">
                                <div class="event-description">
                                       
                                    <div class="row" style="margin-top: -6px;">
                                        <div class="col-md-8 gutterSpace" style="padding-top:0px">
                                                <img class="img-fluid" src="{{ asset("storage/eventImage/$singleEvent->event_image")}} " alt="eventImage" > 
                                        </div>
                                            <div class="col-md-4 gutterSpace eventDiv">
                                                <h6  class="dateMonth">{{ date('M', strtotime($singleEvent->date)) }}</h6>
                                                <h6 class="dateDay">{{ date('d', strtotime($singleEvent->date)) }}</h6>
                                                <div class="event-title">
                                                    <h4>{{ $singleEvent->event_title }}</h4>
                                                     <span  class="organizerName">by {{ $singleEvent->organizer_name }}</span>
                                                           
                                                        @if($singleEvent->ticket_type=="free")
                                                            <div class="ticketType">
                                                                <span >Free</span>
                                                            </div>
                
                                                        @elseif($singleEvent->ticket_type=="donation")
                                                        <div class="ticketType">
                                                            <span >Donation</span>
                                                        </div>

                                                        @elseif($singleEvent->ticket_type=="paid")
                                                        <div class="ticketType">
                                                            <span >Start at {{ $singleEvent->price }}</span>
                                                        </div>

                                                        @endif
                                                            
                                                           
                                                </div>
                                            </div>
                                </div>

                                {{-- another row --}}
                                <div class="row">
                                    <div class="col-md-8 dateTimeField">
                                         
                                       
                                        <?php
                                       
                                        $mytime = Carbon\Carbon::now();
                                        $mytime = Carbon\Carbon::parse($mytime)->format('Y-m-d');
                                           
                                        $currendDateTime = strtotime($mytime);
                                        $salesEndDateTime = strtotime($singleEvent->sales_end_date);
                                   
                                        ?>

                                        @if($currendDateTime > $salesEndDateTime ) 
                                            <p class="dateTime btn btn-danger" style="float:right;">Sales ticket has ended</p>
                                          
                                           

                                        @else
                                           <?php $diffDateTime = $salesEndDateTime - $currendDateTime;
                                                 $r = round((($diffDateTime/24)/60)/60); 
                                                

                                            ?>
                                           <p class="dateTime btn btn-primary" style="float:right;" > You have {{$r}} <?php echo $r==1 ? 'day' : 'days'; ?> remaining</p>
                                        @endif
                                        
                                        
                                     
                                      
                                    </div>

                                    <div class="col-md-4" style="width:100%">
                                         @if($currendDateTime > $salesEndDateTime )
                                            <a href="#" class="btn btn-success btn-block"  id="registerBtnTrue" style="margin-left:-10px;"  disabled><button type="button" class="btn btn-success btn-block" style="margin-left:-10px;" disabled>Register</button></a>
                                            
                                           
                                            
                                             
                                            @else
                                            <a href="{{url("/register")}}" class="btn btn-success btn-block"  id="registerBtnTrue" style="margin-left:-10px;"><button type="button" class="btn btn-success btn-block" style="margin-left:-10px;">Register</button></a>
                                            
                                        @endif
                                    </div>
                                   
                                </div>
                                <hr>
                                <div class="row" style="background-color: aliceblue;padding: 0px 10px 0px 10px;">
                                    
                                    <div class="col-md-8 eventDescription" style="margin-left:auto">
                                        <h5> Event Description</h5>
                                            <p>{{ $singleEvent->event_description }}</p>
                                        <h5>Organizer Description</h5>
                                            <p>{{ $singleEvent->organizer_description }}</p>
                                            
                                    </div>
                                    
                                    
                                    <div class="col-md-4">
                                        <h5> Date And Time</h5>
                                        <p>{{ date('D,M,d', strtotime($singleEvent->date)) }} </p>
                                        <p>from {{ $singleEvent->from }} to {{ $singleEvent->to }}  {{\App\Http\Controllers\PagesController::get_country_name($singleEvent->country)}} Time</p>
                                        <h5>Location</h5>
                                        <p>{{\App\Http\Controllers\PagesController::get_country_name($singleEvent->country)}},{{$singleEvent->state}},{{$singleEvent->city}},{{$singleEvent->address}}</p>
                                        
                                        <a href="">View Map</a>
                                    
                                    </div>

                                </div>
                                <h4 style="text-align:center;margin-top:40px;;color:darkgrey">See More Events From This Organizer</h4>
                                <div class="row" style="margin-top:50px">

                                    @foreach ($event_organizers as $event_organizer)
                                        <div class="container">
                                            <div class="row" style="background-color: aliceblue;">
                                                <div class="col-md-4">
                                                        <a href="{{ url("/eventDetails/$event_organizer->id") }}" id="eventDetails" name="">
                                                            <img class="img-fluid" src={{asset("storage/eventImage/$event_organizer->event_image")}} alt="" style="height:100px;width:200px;">
                                                            
                                                        </a>
                                                        @if($event_organizer->ticket_type=="free")
                                                            <p>Free</p>
                                                            @elseif($event_organizer->ticket_type=="donation")  
                                                                <p>Donation</p>

                                                                @elseif($event_organizer->ticket_type=="paid")    
                                                                <p >Start at {{ $event_organizer->price }}</p>
                                                            @endif
                                                       
                                                </div>
                                                <div class="col-md-4" style="margin-left: -100px;">
                                                        <h5>{{ $event_organizer->event_title }}</h5>
                                                        <p>{{ date('D,M,d',strtotime($event_organizer->date)) }}   {{$event_organizer->from}} -{{$event_organizer->to}} </p>
                                                        <p>{{\App\Http\Controllers\PagesController::get_country_name($event_organizer->country)}}</p>


                                                </div>
                                            </div>

                                          
                                               
                                        </div>
                                    @endforeach
                                </div>


                                    
                                  
                            </div> 

                        </div>
                     

                      {{-- divison for google map --}}

                     <div class="container">
                            <div class="row">
                                hello this is google map field
                            </div>
                    </div>

                    {{-- end of google map field --}}
                    
                    <h4 style="text-align:center;margin-top:40px;;color:darkgrey">Other Events You May Like </h4>
                    <div class="row">

                    <div class="flexslider carousel" style="width: 1300px;height: auto;padding:85px;">
                            <ul class="slides" style="margin-right: 10px;">
                                 @foreach ($event_category_subcategories as $event_category_subcategory)
                                <li><a href="{{ url("/eventDetails/$event_category_subcategory->id") }}" id="eventDetails" name="" style="color:black">
                                    <img class="img-fluid" src={{asset("storage/eventImage/$event_category_subcategory->event_image")}} alt="" style="height:100px;width:200px;"> 
                                    @if($event_category_subcategory->ticket_type=="free")
                                    <p>Free</p>
                                    @elseif($event_category_subcategory->ticket_type=="donation")  
                                        <p>Donation</p>

                                        @elseif($event_category_subcategory->ticket_type=="paid")    
                                        <p >Start at {{ $event_category_subcategory->price }}</p>
                                       
                                    @endif

                                    <p> {{ date('D,M,d',strtotime($event_category_subcategory->date)) }}   {{$event_category_subcategory->from}} - {{$event_category_subcategory->to}} </p>
                                    <h5>{{ $event_category_subcategory->event_title }}</h5>
                                    <p>{{\App\Http\Controllers\PagesController::get_country_name($event_category_subcategory->country)}}</p>
                                   

                                </li>
                                @endforeach
                                
                            </ul>  
                    </div>   
                    
                </div>
                </div>
                
            </div>
            {{-- <div id="clockbox"></div> --}}



            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" crossorigin="anonymous"></script>
            <script type="text/javascript" src="{{asset('js/jquery.flexslider-min.js')}}"></script>

            {{-- coutdown js --}}
            <script src="//code.jquery.com/jquery.min.js"></script>
            <script src="js/countdown.js"></script>


            
            <script>
            $('.flexslider').flexslider({
                animation: "slide",
                animationLoop: false,
                itemWidth: 210,
                itemMargin: 5,
                minItems: 0,
                maxItems: 4
            });
            </script>
            <script src="{{asset('js/demo.js')}}" ></script>
           <script src="{{asset('js/theme.js')}}"></script> 
            <script src="{{asset('js/popper.js')}}"></script>
            <script src="{{asset('js/bootstrap.min.js')}}"></script>
            <script src="{{asset('js/stellar.js')}}"></script>
            <script src="{{asset('vendors/lightbox/simpleLightbox.min.js')}}"></script>
            <script src="{{asset('vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
            <script src="{{asset('vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
            <script src="{{asset('vendors/isotope/isotope-min.js')}}"></script>
            <script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
            <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
            {{-- <script src="{{asset('vendors/flipclock/timer.js')}}"></script> --}}
            <script src="{{asset('js/gmaps.min.js')}}"></script>
            <script src="{{asset('js/modenizr.js')}}"></script>
    
    

        
        {{-- <script type="text/javascript" src="{{asset('js/slider.js')}}"></script> --}}

        <script>
            $(document).ready(function(){
                console.log("hello");
                $("#registerBtnTrue").prop("disabled", true);
                $("#registerBtnFalse").prop("disabled", false);
                

            })
        </script>

        <script type="text/javascript">

            function GetClock(){
            d = new Date();
            nhour  = d.getHours();
            nmin   = d.getMinutes();
            nsec   = d.getSeconds();
                if(nhour ==  0) {ap = " AM";nhour = 12;} 
            else if(nhour <= 11) {ap = " AM";} 
            else if(nhour == 12) {ap = " PM";} 
            else if(nhour >= 13) {ap = " PM";nhour -= 12;}
            
            if(nmin <= 9) {nmin = "0" +nmin;}
            
            
            document.getElementById('clockbox').innerHTML=" "+nhour+":"+nmin+":"+nsec+" "+ap+" ";
            setTimeout("GetClock()", 1000);
            }
            window.onload=GetClock;
            </script>   

		
</body>
</html>