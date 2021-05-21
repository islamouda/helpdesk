<?php

namespace App\Http\Controllers;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendTicketController extends Controller
{
    public function index(){

        $ticket = Ticket::all();
        return view('pages.testsendemail')->with('tickets',$ticket);
    }

    public function re_send(Request $request, $id){
        // start email code >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

        $ticket=Ticket::find($request->id);
        $user=User::find($ticket->user_id);
        // dd($user->name);


// start email code >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
                //   this code for get Email IT user
                 $user_its = User::where('privilege',2)->select('email')->get();
                 $emails_it = $user_its->toArray();
                // this data go via email 
                $data = [
                    'user' => $user->name,
                    'title' => $ticket->title,
                    'subject' => $ticket->subject,
                    'ticket' => $ticket->id,
                        ];

          foreach ($user_its as $user_it) {
              # code...
              Mail::send('dynamic_email_template',$data,function($m) use($user_it ,$ticket,$user) {
                  $m->to($user_it->email)->subject('Ticket ID : ' . $ticket->id);
                  $m->from('asset@metcoapp.com' , 'New Ticket : '. $user->name);
           });
          }

          $ticket=Ticket::find($request->id);
          $ticket->send_email = 0;
          $ticket->save();
// end email code >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    
    }



    public function re_send_auto(){
        // start email code >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        $all_ticket_re_send = Ticket::where('send_email',1)->get();


        foreach ($all_ticket_re_send as $one_ticket){
            

            $ticket=Ticket::find($one_ticket->id);
            $user=User::find($ticket->user_id);


            // start email code >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
                //   this code for get Email IT user
                 $user_its = User::where('privilege',2)->select('email')->get();
                 $emails_it = $user_its->toArray();
                // this data go via email 
                $data = [
                    'user' => $user->name,
                    'title' => $ticket->title,
                    'subject' => $ticket->subject,
                    'ticket' => $ticket->id,
                        ];

          foreach ($user_its as $user_it) {
              # code...
              Mail::send('dynamic_email_template',$data,function($m) use($user_it ,$ticket,$user) {
                  $m->to($user_it->email)->subject('Ticket ID : ' . $ticket->id);
                  $m->from('iraq.helpdesk@metconetworks.com' , 'New Ticket : '. $user->name);
           });
          }

          $ticket=Ticket::find($one_ticket->id);
          $ticket->send_email = 0;
          $ticket->save();
// end email code >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

        };
//         $ticket=Ticket::find($request->id);
//         $user=User::find($ticket->user_id);



    
    }



}
