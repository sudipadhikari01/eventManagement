
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/jquery.dm-uploader.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

     <!-- Bootstrap CSS -->
	
	<link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/lightbox/simpleLightbox.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/nice-select/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('vendors/animate-css/animate.css')}}">

    
    <title>Event Registration</title>
</head>
<body>
        @include('inc.navbar')
    <div class="container" style="margin-top:120px">
        @include('message')
    <h3>1.Event Details </h3>
    <form action="{{url('registerEvent')}}" method="post" enctype="multipart/form-data" id="eventForm" >
                {{ csrf_field() }}
                    <div class="form-group" >
                            <label for="eventTitle">Event Title*</label>
                    <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Give it a short distinct name" >
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="location">Location*</label>
                             <input type="text" class="form-control" id="inputTitle" name="location" value="" aria-describedby="venueHelp" placeholder="Enter the venue or location name">
                             
                        </div>
                               
                    </div>   

                    <div id="whichEvent">
                        <button id="onlineEvent" class="btn btn-secondary">Online Event</button>
                        <button id="enterAddress" class="btn btn-secondary">Enter Adress</button>
                    </div>
                    <br>
                {{--Start of location field  --}}
                    <div id="location">
                            <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="inputVenue" name="address"  placeholder="Address">
                                    </div>
                                </div>
            
                                

                                <div class="form-row">        
                                        <div class="form-group col-md-8">
                                            <input type="text" class="form-control" id="inputVenue1" name="address2" placeholder="Address 2">
                                        </div>
                                    </div>
                               
            
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-8">
                                            <select class="browser-default custom-select custom-select mb-3" id="country" name="country">
                                                <option selected>Please select a country</option>
                                                
                                                @foreach ($datas as $data)
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach
                                                
                                            </select>
                                       
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <select class="browser-default custom-select custom-select mb-3" id="state" name="state">
                                            <option selected>Please select a state</option>
                                        </select>   
                                   </div>
                                </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" id="city" name="city" placeholder="City">
                               </div>
                            </div>
                                
            
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="zipCode"  name="zipCode" placeholder="Zip/Postal Code">
                                </div>
                            </div>
                            <button  id="resetLocation" class="btn btn-secondary">Reset Location</button>
                    </div>
                    <br>
                    {{--end of loacation field  --}}
                
                {{-- start of schedules section --}}
                
                <div class="jumbotron">
                    
                     <div clas="heading">
                        <h4>Schedule dates</h4>
                    </div>
                    
                    <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="How often does this event occurs?">How often does this event occurs?</label>
                                    <select class="browser-default custom-select custom-select mb-3" id="country" name="eventFrequency">
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="annualy">Annualy</option>
                                        <option value="custom">Custom</option>
                                    </select>
                               
                            </div>
                        </div>
                        <div class="form-row">        
                                <div class="form-group col-md-5">
                                    <label for="select a date"> Select the date</label>
                                    <input type="date" class="form-control" id="theDate" name="date">
                                </div>
                            </div>   
                    
                   <div class="form-row">
                       <div class="form-group col-md-4">
                            <label for="startTime">From*</label>
                            <select class="browser-default custom-select custom-select mb-3" id="from" name="from" >

                                {{-- @for($hours=0; $hours<12; $hours++) // the interval for hours is '1'
                                    @for($mins=0; $mins<60; $mins+=30)  // the interval for mins is '30'
                                      
                                             {!! "<option>".str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT).'AM'."</option>" !!};

                                     @endfor()
                                @endfor()                         --}}


                                <option value="12:00 AM">12:00 AM</option>
                                <option value="12:30 AM">12:30 AM</option>
                                <option value="01:00 AM">01:00 AM</option>
                                <option value="01:30 AM">01:30 AM</option>
                                <option value="02:00 AM">02:00 AM</option>
                                <option value="02:30 AM">02:30 AM</option>
                                <option value="03:00 AM">03:00 AM</option>
                                <option value="03:30 AM">03:30 AM</option>
                                <option value="04:00 AM">04:00 AM</option>
                                <option value="04:30 AM">04:30 AM</option>
                                <option value="05:00 AM">05:00 AM</option>
                                <option value="05:30 AM">05:30 AM</option>
                                <option value="06:00 AM">06:00 AM</option>
                                <option value="06:30 AM">06:30 AM</option>
                                <option value="07:00 AM">07:00 AM</option>
                                <option value="07:30 AM">07:30 AM</option>
                                <option value="08:00 AM">08:00 AM</option>
                                <option value="08:30 AM">08:30 AM</option>
                                <option value="09:00 AM">09:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="10:30 AM">10:30 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="11:30 AM">11:30 AM</option>

                                <option value="12:00 PM">12:00 PM</option>
                                <option value="12:30 PM">12:30 PM</option>
                                <option value="01:00 PM">01:00 PM</option>
                                <option value="01:30 PM">01:30 PM</option>
                                <option value="02:00 PM">02:00 PM</option>
                                <option value="02:30 PM">02:30 PM</option>
                                <option value="03:00 PM">03:00 PM</option>
                                <option value="03:30 PM">03:30 PM</option>
                                <option value="04:00 PM">04:00 PM</option>
                                <option value="04:30 PM">04:30 PM</option>
                                <option value="05:00 PM">05:00 PM</option>
                                <option value="05:30 PM">05:30 PM</option>
                                <option value="06:00 PM">06:00 PM</option>
                                <option value="06:30 PM">06:30 PM</option>
                                <option value="07:00 PM">07:00 PM</option>
                                <option value="07:30 PM">07:30 PM</option>
                                <option value="08:00 PM">08:00 PM</option>
                                <option value="08:30 PM">08:30 PM</option>
                                <option value="09:00 PM">09:00 PM</option>
                                <option value="10:00 PM">10:00 PM</option>
                                <option value="10:30 PM">10:30 PM</option>
                                <option value="11:00 PM">11:00 PM</option>
                                <option value="11:30 PM">11:30 PM</option>
                            </select>    
                        </div> 

                        <div class="form-group col-md-4">   
                            <label for="to">To*</label>
                            <select class="browser-default custom-select custom-select mb-3" id="to" name="to" >

                                    {{-- @for($hours=0; $hours<12; $hours++) // the interval for hours is '1'
                                        @for($mins=0; $mins<60; $mins+=30)  // the interval for mins is '30'
                                          
                                                 {!! "<option>".str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT).'PM'."</option>" !!};
    
                                         @endfor()
                                    @endfor()                         --}}


                                    <option value="12:00 AM">12:00 AM</option>
                                <option value="12:30 AM">12:30 AM</option>
                                <option value="01:00 AM">01:00 AM</option>
                                <option value="01:30 AM">01:30 AM</option>
                                <option value="02:00 AM">02:00 AM</option>
                                <option value="02:30 AM">02:30 AM</option>
                                <option value="03:00 AM">03:00 AM</option>
                                <option value="03:30 AM">03:30 AM</option>
                                <option value="04:00 AM">04:00 AM</option>
                                <option value="04:30 AM">04:30 AM</option>
                                <option value="05:00 AM">05:00 AM</option>
                                <option value="05:30 AM">05:30 AM</option>
                                <option value="06:00 AM">06:00 AM</option>
                                <option value="06:30 AM">06:30 AM</option>
                                <option value="07:00 AM">07:00 AM</option>
                                <option value="07:30 AM">07:30 AM</option>
                                <option value="08:00 AM">08:00 AM</option>
                                <option value="08:30 AM">08:30 AM</option>
                                <option value="09:00 AM">09:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="10:30 AM">10:30 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="11:30 AM">11:30 AM</option>

                                <option value="12:00 PM">12:00 PM</option>
                                <option value="12:30 PM">12:30 PM</option>
                                <option value="01:00 PM">01:00 PM</option>
                                <option value="01:30 PM">01:30 PM</option>
                                <option value="02:00 PM">02:00 PM</option>
                                <option value="02:30 PM">02:30 PM</option>
                                <option value="03:00 PM">03:00 PM</option>
                                <option value="03:30 PM">03:30 PM</option>
                                <option value="04:00 PM">04:00 PM</option>
                                <option value="04:30 PM">04:30 PM</option>
                                <option value="05:00 PM">05:00 PM</option>
                                <option value="05:30 PM">05:30 PM</option>
                                <option value="06:00 PM">06:00 PM</option>
                                <option value="06:30 PM">06:30 PM</option>
                                <option value="07:00 PM">07:00 PM</option>
                                <option value="07:30 PM">07:30 PM</option>
                                <option value="08:00 PM">08:00 PM</option>
                                <option value="08:30 PM">08:30 PM</option>
                                <option value="09:00 PM">09:00 PM</option>
                                <option value="10:00 PM">10:00 PM</option>
                                <option value="10:30 PM">10:30 PM</option>
                                <option value="11:00 PM">11:00 PM</option>
                                <option value="11:30 PM">11:30 PM</option>
                                </select>  
                        </div>  
                        
                        
                </div>  

                <div class="form-row">
                        <main role="main" class="container">

                               
                          
                                <div class="row">
                                    <div class="input-group">
                                        <div class="col-md-6 col-sm-12">
                                            <h4 for="event image">Event Image</h4>
                                        <!-- Our markup, the important part here! -->
                                        <div id="drag-and-drop-zone" class="dm-uploader p-5">

                                          <h3 class="mb-5 mt-5 text-muted">Drag &amp; drop files here</h3>
                                          <div class="btn btn-secondary btn-block mb-5">
                                              <span>Open the file Browser</span>
                                              <input type="file" title='Add Event Image' id="eventImage" name="eventImage" />
                                              {{-- <label for="" class="custom-file-label">Choose file</label> --}}
                                              {{-- <p>choose the image that makes event near to you</p> --}}
                                          </div>
                                        </div><!-- /uploader -->
                              
                                      </div>
                                    </div>
                                 
                               
                                </div><!-- /file list -->
                          
                               
                          
                                
                          
                              </main> <!-- /container -->
                </div>

         </div> 
        {{-- end of jumbotron --}}
         <div class="form-group">
             <h4>Event Description</h4>
             <textarea name="eventDescription" id="eventDescription"></textarea>
         </div>

         <div class="form-row">
            <div class="form-group col-md-8">
                <h4>Organizer Name</h4>  
                <input type="text" class="form-control" name="organizerName" id="organizerName" placeholder="Who is organizing this event?"> 
           </div>
        </div>

        <div class="form-group">
            <h4>Organizer Description</h4>
            <textarea name="organizertDescription" id="organizerDescription"></textarea>
        </div>

        {{-- end of section first event details --}}
        {{-- start of create ticket field --}}

        <h3>2.Create Ticket</h3>

        <div class="row">
                
            <div class="col-md-9 formBtnCenter" style="width:50%;margin: 0 auto;">
               <h4 class="eventTicketType">What type of ticket would you like to choose?</h4>
            <div class="formBtnHolder">
                <button class="btn btn-light" id ="freeTicket" name="freeTicket">Free ticket</button>
                <button class="btn btn-light" id="paidTicket" name="paidTicket">Paid ticket</button>
                <button class="btn btn-light" id="donationTicket" name="donationTicket">Donation</button>
            </div>
            </div>
            
        </div>

        <div id="ticketField">
            <table class="table table-borderless" >
                <thead>
                <tr>
                    <th>Ticket name*</th>
                    <th>Quantity available*</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                </thead>
            
               
                        <tbody>
                        <tr>
                                <td><input type="text" class="form-control" name="ticketName" id="ticketName" placeholder="Give your ticket a name"></td>
                                <td><input type="text" class="form-control" name="ticketQuantity" id="quantity" placeholder="Quantity"></td>
                                <td><input type="text" class="form-control" name="ticketPrice" id="ticketPrice" placeholder="Ticket price"></td>
                                <input type="hidden" name="ticketType" id="ticketType">
                                <td>
                                   <button class="btn btn-secondary" id="settingBtn"> <i class="fas fa-cog"></i></button>
                                   <button class="btn btn-danger" id="trashBtn"><i class="fas fa-trash-alt"></i></button>    
                                  
                                </td>
                        </tr>
                             
                        </tbody>
            
              
            </table>
        </div>

        <div class="setting" id="setting">
            <h3>Settings</h3>
            <hr>
            <div class="form-group col-md-6">
                <h5>Ticket description</h5>
                <textarea name="ticketDescription" id="ticketDescription" class="form-control" placeholder="Tell your ticket buyers more about this ticket type"></textarea>
            </div>
            <div class="form-group col-md-6" >
                <h5>Sales Chanel</h5>
                <select class="browser-default custom-select custom-select mb-3" name="salesChanel" id="salesChanel">
                    <option value="Everywhere">Everywhere</option>
                    <option value="OnlineOnly">Online only</option>
                    <option value="At the door only">At the door only</option>
                </select>
            </div>

            <h5>Ticket sales start</h5>  
            <div class="form-row">
                    <div class="col-md-3">
                        <input type="date" class="form-control" id="theDate" name="salesStartDate">
                    </div>
                    <div class="col-md-3">
                            <select class="browser-default custom-select custom-select mb-3" name="salesStartTime" id="salesStartTime">
                                <option value="12:00 AM">12:00 AM</option>
                                <option value="12:30 AM">12:30 AM</option>
                                <option value="01:00 AM">01:00 AM</option>
                                <option value="01:30 AM">01:30 AM</option>
                                <option value="02:00 AM">02:00 AM</option>
                                <option value="02:30 AM">02:30 AM</option>
                                <option value="03:00 AM">03:00 AM</option>
                                <option value="03:30 AM">03:30 AM</option>
                                <option value="04:00 AM">04:00 AM</option>
                                <option value="04:30 AM">04:30 AM</option>
                                <option value="05:00 AM">05:00 AM</option>
                                <option value="05:30 AM">05:30 AM</option>
                                <option value="06:00 AM">06:00 AM</option>
                                <option value="06:30 AM">06:30 AM</option>
                                <option value="07:00 AM">07:00 AM</option>
                                <option value="07:30 AM">07:30 AM</option>
                                <option value="08:00 AM">08:00 AM</option>
                                <option value="08:30 AM">08:30 AM</option>
                                <option value="09:00 AM">09:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="10:30 AM">10:30 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="11:30 AM">11:30 AM</option>

                                <option value="12:00 PM">12:00 PM</option>
                                <option value="12:30 PM">12:30 PM</option>
                                <option value="01:00 PM">01:00 PM</option>
                                <option value="01:30 PM">01:30 PM</option>
                                <option value="02:00 PM">02:00 PM</option>
                                <option value="02:30 PM">02:30 PM</option>
                                <option value="03:00 PM">03:00 PM</option>
                                <option value="03:30 PM">03:30 PM</option>
                                <option value="04:00 PM">04:00 PM</option>
                                <option value="04:30 PM">04:30 PM</option>
                                <option value="05:00 PM">05:00 PM</option>
                                <option value="05:30 PM">05:30 PM</option>
                                <option value="06:00 PM">06:00 PM</option>
                                <option value="06:30 PM">06:30 PM</option>
                                <option value="07:00 PM">07:00 PM</option>
                                <option value="07:30 PM">07:30 PM</option>
                                <option value="08:00 PM">08:00 PM</option>
                                <option value="08:30 PM">08:30 PM</option>
                                <option value="09:00 PM">09:00 PM</option>
                                <option value="10:00 PM">10:00 PM</option>
                                <option value="10:30 PM">10:30 PM</option>
                                <option value="11:00 PM">11:00 PM</option>
                                <option value="11:30 PM">11:30 PM</option>
                               
                            </select>       
        
                        </div>

            </div> 

            <h5>Ticket sales end</h5>  
            <div class="form-row">
                <div class="col-md-3">
                    <input type="date" class="form-control" id="theDate" name="salesEndDate">
                </div>
              

            <div class="col-md-3">
                    <select class="browser-default custom-select custom-select mb-3" name="salesEndTime" id="salesEndTime">
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="12:30 AM">12:30 AM</option>
                        <option value="01:00 AM">01:00 AM</option>
                        <option value="01:30 AM">01:30 AM</option>
                        <option value="02:00 AM">02:00 AM</option>
                        <option value="02:30 AM">02:30 AM</option>
                        <option value="03:00 AM">03:00 AM</option>
                        <option value="03:30 AM">03:30 AM</option>
                        <option value="04:00 AM">04:00 AM</option>
                        <option value="04:30 AM">04:30 AM</option>
                        <option value="05:00 AM">05:00 AM</option>
                        <option value="05:30 AM">05:30 AM</option>
                        <option value="06:00 AM">06:00 AM</option>
                        <option value="06:30 AM">06:30 AM</option>
                        <option value="07:00 AM">07:00 AM</option>
                        <option value="07:30 AM">07:30 AM</option>
                        <option value="08:00 AM">08:00 AM</option>
                        <option value="08:30 AM">08:30 AM</option>
                        <option value="09:00 AM">09:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="10:30 AM">10:30 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="11:30 AM">11:30 AM</option>

                        <option value="12:00 PM">12:00 PM</option>
                        <option value="12:30 PM">12:30 PM</option>
                        <option value="01:00 PM">01:00 PM</option>
                        <option value="01:30 PM">01:30 PM</option>
                        <option value="02:00 PM">02:00 PM</option>
                        <option value="02:30 PM">02:30 PM</option>
                        <option value="03:00 PM">03:00 PM</option>
                        <option value="03:30 PM">03:30 PM</option>
                        <option value="04:00 PM">04:00 PM</option>
                        <option value="04:30 PM">04:30 PM</option>
                        <option value="05:00 PM">05:00 PM</option>
                        <option value="05:30 PM">05:30 PM</option>
                        <option value="06:00 PM">06:00 PM</option>
                        <option value="06:30 PM">06:30 PM</option>
                        <option value="07:00 PM">07:00 PM</option>
                        <option value="07:30 PM">07:30 PM</option>
                        <option value="08:00 PM">08:00 PM</option>
                        <option value="08:30 PM">08:30 PM</option>
                        <option value="09:00 PM">09:00 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="10:30 PM">10:30 PM</option>
                        <option value="11:00 PM">11:00 PM</option>
                        <option value="11:30 PM">11:30 PM</option>
                        
                    </select>       
        
            </div>
                
            
        </div>
        </div>
          <br>
          <br>
        {{-- End of create ticket field --}}

          {{-- Additional setting  --}}

          <h3>3.Additional Setting</h3>
          <div class="row">
            
              <div class="col-md-8 form-group">
                    <select class="browser-default custom-select custom-select mb-3" id="eventType" name="eventType">
                        <option selected>Select event type</option>
                        @foreach ($event_datas as $event_data)
                             <option value="{{ $event_data->id }}">{{ $event_data->event_type_name }}</option>
                         @endforeach
                    </select>   
              </div>

          </div>
          <div class="row">
              <div class="col-md-5">
                    <select class="browser-default custom-select custom-select mb-3" id="eventtopic" name="eventTopic">
                            <option value="" selected="selected">Select a topic</option>
                            @foreach ($event_topics as $event_topic)
                                <option value="{{ $event_topic->id }}">{{ $event_topic->event_topic_name }}</option>
                        @endforeach 
                        </select> 
              </div>
                <div class="col-md-3">
                        <select class="browser-default custom-select custom-select mb-3" id="eventSubtopic" name="eventSubTopic" >
                            <option value="" selected="selected">Select a sub-topic</option>
                            <option value=""></option>
                                
                        </select>   
                </div>
          </div>
                    
            <input type="submit" value="Submit" name="submit" id="btnSubmit" class="btn btn-success">
        </form>
        
    </div>

       
        <script src="{{asset('js/jquery.dm-uploader.min.js')}}"></script>
        <script src="{{asset('js/demo-config.js')}}"></script>
        <script src="{{asset('js/demo-ui.js')}}"></script>
        
        <noscript>
            JavaScript is off.Please enable to view full site.
        </noscript>
        
        <script>


            $(document).ready(function(){
                // hide the event subtopic input field
                $('#eventSubtopic').hide();

                // hide the location div
                $('#location').hide();

                //hide the ticket field
                $('#ticketField').hide();

                //hide the setting div
                $('#setting').hide();

                  // when free ticket button is clicked
                $('#freeTicket').click(function(event){
                    event.preventDefault();
                    $('#ticketPrice').val("Free");
                    $('#ticketType').val("free");
                    $('#ticketField').show();
                    
                });

                //when paid ticket button  is clicked

                $('#paidTicket').on("click",function(event){
                    event.preventDefault();
                    $('#ticketPrice').val("$");
                    $('#ticketType').val("paid");
                    $('#ticketField').show();

                });

                //when donation button is clicked

                $('#donationTicket').on("click",function(event){
                    event.preventDefault();
                    $('#ticketPrice').val("Donation");
                    $('#ticketType').val("donation");
                    $('#ticketField').show();
                });

                 //when setting button is clicked show the setting div
                 $('#settingBtn').click(function(event){
                     event.preventDefault();
                    $('#setting').toggle("slide");

                   
                });

                //delete the setting and ticket field div when trash button is clicked
                $('#trashBtn').on("click",function(event){
                     event.preventDefault();
                    alert("Are you sure want to delete?");
                    $('#setting').hide();
                    $('#ticketField').hide();
                   
                })


                //change the value of title input field when online button is clicked
                $('#onlineEvent').click(function(event){
                    event.preventDefault();
                    $('#inputTitle').val("This is an online event");
                    //hide the button if the online button is clicked
                        $('#onlineEvent').hide();
                  
                });

                //show the location div when enter address button is clicked
                $('#enterAddress').click(function(event){
                    event.preventDefault();
                   
                    $('#onlineEvent').hide();
                    $('#enterAddress').hide();

                    $('#location').show();
                 
                });

               

              



                //when reset location button is clicked show two buttons
                $('#resetLocation').click(function(event){
                    event.preventDefault();
                    $('#location').hide();
                    $('#onlineEvent').show();
                    $('#enterAddress').show();
                })


                $.ajaxSetup({
                    headers:
                    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                $("#country").on("change", function () {
                    var request;
                    cid=this.value;


                    request = $.ajax({
                        url: "{{url('/states/')}}"+"/"+cid,
                        method: "POST",
                        
                        datatype: "json"
                    });

 
        // after request is done in country div
                request.done(function(msg) {
                  
                    $( "#state" ).empty();
                    var i;
                    $.each( msg, function( i, val ) {
                        $( "#state" ).append( new Option(val.name, val.name) );
                    });
                });

                request.fail(function(jqXHR, textStatus) {
                    console.log(textStatus);
                });
            });


            $('#eventtopic').on('change',function(){
                var request1;
                eid=this.value;


                  request1=$.ajax({
                    url:"{{url('/eventSubtopic/')}}"+"/"+eid,
                    method:"POST",
                    datatype:"json"


                  });
        // after request is done in event topic 
                request1.done(function(data){
                    $('#eventSubtopic').show()
                    $('#eventSubtopic').empty();
                    var j;
                    $.each(data,function(j,value){
                        $('#eventSubtopic').append(new Option(value.event_subtopic_name,value.id));
                    });
                }); 

                request1.fail(function(jqXHR,textStatus){
                    console.log(textStatus);
                });

            });  


            //
            
             

                   

            });

      

    </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>

       {{-- to make date type supported by all browsers --}}
        <script>
            webshims.setOptions('waitReady', false);
            webshims.setOptions('forms-ext', {type: 'date'});
            webshims.setOptions('forms-ext', {type: 'time'});
            webshims.polyfill('forms forms-ext');
        </script>

    
    {{-- for enabaling ck editor --}}
    <script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>

    <script>
        CKEDITOR.replace( 'eventDescription' );
    </script>

    <script>
        CKEDITOR.replace( 'organizerDescription' );
    </script>

    {{-- getting form value --}}
    <script>
        $('#btnSubmit').on("click",function(event){
            event.preventDefault();
            //console.log("form is submitted");
            var a = $('#eventForm').serialize();
            $.ajax({
                type:"POST",
                url: {{url("/registerEvent")}},
                contentType:false,
                cache:false,
                data:a,
                success:function(data){
                    console.log(data);
                }
                
            });
        });

    </script>



		
		<!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
        <script src="{{asset('vendors/flipclock/timer.js')}}"></script>
        
       
		
       

        
        
</body>
</html>

