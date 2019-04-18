<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\client;
use App\EventRegistration;
use Carbon\Carbon;

class PagesController extends Controller
{



    // welcome to the landing page
    public function home(){
        
        // $eventRegistrations=\App\EventRegistration::where('status',1)->paginate(6);
        $eventRegistrations=\App\EventRegistration::paginate(6);
        return view("welcome")->with("eventRegistrations",$eventRegistrations);
    }

    public function ip(){
        // $client = new Client();
        // $pip = $client->get('https://api.ipify.org'); // gets client public ip
        // $res = $client->get('http://ip-api.com/json/'.$pip->getBody().'?fields=country'); // gets client public ip geolocation
        // // return $res->getStatusCode(); // 200
        // $a= $res->getBody(true);
        // return $a;
        return view('ip');
    }

    // get the single id for the image click in welcome view 
    public static function single($id){
       
       

        $singleEvent = \App\EventRegistration::find($id);
        $event_organizer =  \App\EventRegistration::where('organizer_name','=',$singleEvent->organizer_name)->get();
        // return $singleEvent->event_type;

         
        $event_category_subcategory =  \App\EventRegistration::where(function($query) use ($singleEvent){
        $query->where('event_type','=',$singleEvent->event_type)
                    ->orWhere('event_topic', '=',$singleEvent->event_topic)
                    ->orWhere('event_sub_topic','=',$singleEvent->event_sub_topic)
                    ->orWhere('country', '=',$singleEvent->event_sub_topic);
        })->get();
        

        return  view('eventDetails')->with(['singleEvent' => $singleEvent,'event_organizers'=>$event_organizer, 'event_category_subcategories' => $event_category_subcategory]);
    }





    public static function get_country_name($id){
        return \App\Country::find($id)->name;
    }

    public static function get_state_name($id){
        return \App\State::find($id)->name;
    }


    public function eventList(){
        $eventList=\App\EventRegistration::paginate(10);
        return view('admin.eventList')->with('eventList',$eventList);
    }

    public static function get_event_type($id){
        return \App\EventType::find($id)->event_type_name;
    }

    public static function get_event_topic($id){
        return \App\EventTopic::find($id)->event_topic_name;
    }

    
    public static function get_event_sub_topic($id){
        return \App\EventSubTopic::find($id)->event_subtopic_name;
    }


    

    public static function get_min_date(){
        $lists = \App\EventRegistration::orderBy('date','ASC')->get();
       
        
            $current= Carbon::now();
            $currentDate =Carbon::parse($current)->format('Y-m-d');
            $currentDate =strtotime($currentDate);
       
            $mindate;
            for($i=0;$i<count($lists);$i++){

            $dDate = $lists[$i]->date;
            $id = $lists[$i]->id;
            $time = $lists[$i]->date." ". $lists[$i]->from;
            $utime = strtotime($time);
            $uctime=strtotime(Carbon::parse($current)->format('Y-m-d g:i A'));

           // $time =strtotime($time);
            //return $utime;


            $minDate =strtotime($dDate);

            if($currentDate < $minDate){
              
                $r =  $minDate - $currentDate;
                $r = round((($r/24)/60)/60);

                
                $now = Carbon::now();
                $now = $now->format('g:i A');
                $now =strtotime( $now);

                     if( $utime >  $uctime){
                        $rtime = $utime - $uctime;
                        $rhrmin = Carbon::parse($rtime)->format('g');
                        $rmin = Carbon::parse($rtime)->format('i');
                        $rarray =array($r,$rhrmin,$rmin,$id,$dDate);
                        return  $rarray;
                        
                        $dDate=null;
                        $mindate =null;
                    }
                
                    
                    else{
                        $rtime = $uctime - $utime;
                        $rhrmin = Carbon::parse($rtime)->format('g');
                        $rmin = Carbon::parse($rtime)->format('i');
                        $rarray =array($r,$rhrmin,$rmin,$id,$dDate);
                        return  $rarray;

                        
                        $dDate=null;
                        $mindate =null;
                    }
                   
                     break;
                   
               
                
                
            }

            else{
                
            $dDate=null;
            $mindate =null;
            }


           
            
        }

    

    }


    public static function singleEventTitle($id){
        $singleEvent = \App\EventRegistration::find($id);
        return $singleEvent->event_title;
    }

    
   
   
}
