<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\EventType;
use App\EventTopic;
use App\EventSubTopic;
use App\EventRegistration;


class RegisterEventController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    
    public function index(){
       
            $datas = Country::all();
            $event_datas = EventType::all(); 
            $event_topics = EventTopic::all();
            $eventRegistrations = EventRegistration::all();
            return view('register.eventRegister')->with(['datas'=>$datas,'event_datas'=>$event_datas,"event_topics"=>$event_topics]);
        
       
       
    }

    public function storeEvent(Request $request){

        // $this->validate($request,[
        //     'inputEventTitle' => 'required|max:50',
              //  'eventImage' => 'image|max:1999'
        // ]);
        // return $_POST;


          // handle file upload
          if($request->hasFile('eventImage')){
             
             //get the file name with the extension
            $filenameWithExt = $request->file('eventImage')->getClientOriginalName();

            //get just file name
             $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

             //get just extension
             $extension = $request->file('eventImage')->getClientOriginalExtension();

            //file name to store
             $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //upload image
            $path = $request->file('eventImage')->storeAs('public/eventImage',$fileNameToStore);

          
         }else{
          
             $fileNameToStore ="noimage.jpg";
         }


        // create event registration
                $eventRegister= new EventRegistration();
                $eventRegister->event_title = $request->input("eventTitle");
                $eventRegister->location_name = $request->input("location");
                $eventRegister->address = $request->input("address");
                $eventRegister->address2 = $request->input("address2");
                $eventRegister->country = $request->input("country");
                $eventRegister->state = $request->input("state");
                $eventRegister->city = $request->input("city");
                $eventRegister->zip_code =$request->input("zipCode");
                $eventRegister->event_frequency =$request->input("eventFrequency");
                $eventRegister->date =$request->input("date");
                $eventRegister->from = $request->input("from");
                $eventRegister->to = $request->input("to");
                $eventRegister->event_image = $fileNameToStore;
                $text = $request->input('eventDescription');
                $eventRegister->event_description = strip_tags($text);
                $eventRegister->organizer_name = $request->input('organizerName');
                $text2 = $request->input('organizertDescription');
                $eventRegister->organizer_description =strip_tags($text2);
                $eventRegister->ticket_type = $request->input('ticketType');
                $eventRegister->ticket_name = $request->input('ticketName');
                $eventRegister->ticket_quantity = $request->input('ticketQuantity');
                $eventRegister->price = $request->input('ticketPrice');
                $eventRegister->ticket_description = $request->input('ticketDescription');
                $eventRegister->sales_chanel = $request->input('salesChanel');
                $eventRegister->sales_start_date = $request->input('salesStartDate');
                $eventRegister->sales_start_time = $request->input('salesStartTime');
                $eventRegister->sales_end_date = $request->input('salesEndDate');
                $eventRegister->sales_end_time = $request->input('salesEndTime');
                $eventRegister->event_type =$request->input('eventType');
                $eventRegister->event_topic =$request->input('eventTopic');
                $eventRegister->event_sub_topic =$request->input('eventSubTopic');

                $eventRegister->user_id = auth()->user()->id;


        


            // dd($eventRegister->event_title, $eventRegister->location_name,$eventRegister->address,$eventRegister->address2,  $eventRegister->country
            //     , $eventRegister->state, $eventRegister->city, $eventRegister->zip_code,$eventRegister->event_frequency 
            //     ,$eventRegister->date,$eventRegister->from,$eventRegister->to , 
            //     $eventRegister->event_image, $eventRegister->event_description,$eventRegister->organizer_name,
            //     $eventRegister->organizer_description,$eventRegister->ticket_name
            //     ,$eventRegister->ticket_quantity,$eventRegister->price, $eventRegister->event_type
            //     , $eventRegister->event_topic,  $eventRegister->event_sub_topic);


            if($eventRegister->save()){
                $eventRegister=EventRegistration::all();
                return redirect()->route('homePage');
            }else{
                return "error occured";
            }

        
    }
}
