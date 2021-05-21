<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Ticket;
use App\Status;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function create(Request $request){

        // dd($request->type_id);

        $this->validate($request,[
            'title' => 'required',
            'priority_id' => 'required',
            'type_id' => 'required',

        ]);

        

        // $ticket->types()->sync($request->type_id);


        $connected = @fsockopen("www.google.com", 80); 
        //website, port  (try 80 or 443)
        if ($connected){

            $user_id = Auth::user();
        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->subject = $request->subject;
        $ticket->priority_id = $request->priority_id;
        // $ticket->type_id = $request->type_id;
        $ticket->user_id = $user_id->id;
        $ticket->send_email = 0;
        $ticket->save();
        $ticket->types()->attach($request->type_id);
         // start email code >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
         $user_it = User::where('privilege',2)->select('email')->get();

         // $emails = User::where('privilege','==',2)->map(function($user) {
             //     return $user->only(['email']);
             // });
             $emails_it = $user_it->toArray();
         //    $test= list [ $emails_it ];
             // dd($test);
         $filename = "Report ALL ".date('m-d-Y').".xlsx";
         $DateReport = date('m-d-Y');
         // $emails = $emails_it['email'];
         $data = [
             'user' => $user_id->name,
             'title' => $request->title,
             'subject' => $request->subject,
             'ticket' => $ticket
                 ];
         foreach ($user_it as $user) {
             # code...
             Mail::send('dynamic_email_template',$data,function($m) use($user ,$ticket,$user_id) {
                 $m->to($user->email)->subject('Ticket ID : ' . $ticket->id);
                 $m->from('asset@metcoapp.com' , 'New Ticket : '. $user_id->name);
          });
         }
     // end email code >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
     $is_conn = 'with email';
        fclose($connected);
        }else{

            $user_id = Auth::user();
            $ticket = new Ticket();
            $ticket->title = $request->title;
            $ticket->subject = $request->subject;
            $ticket->priority_id = $request->priority_id;
            // $ticket->type_id = $request->type_id;
            $ticket->user_id = $user_id->id;
            $ticket->send_email = 1;
            $ticket->save();
            $ticket->types()->attach($request->type_id);
        $is_conn = 'with out email'; //action in connection failure
        }

   



        return redirect()->route('pages.user')->with('success', 'Create New Ticket Successfully '. $is_conn);




    }



    public function update(Request $request,$id){


        $user_id = Auth::user();
        $ticket = Ticket::find($id);

        $ticket->title = $request->title;
        $ticket->subject = $request->subject;
        $ticket->priority_id = $request->priority_id;
        $ticket->types()->attach($request->type_id);


        // $ticket->type_id = $request->type_id;
        // $ticket->types()->attach($request->type_id);
        // if ($request->status_id == 1) {
        //     $ticket->ticket_time = $ticket->updated_at;
        // }

        // $ticket->status_id = $request->status_id;
        // $ticket->replay = $request->replay;
        // $ticket->recipient_id = $user_id->id;
        $ticket->save();

 $ticket->types()->sync($request->type_id);

        return redirect()->back();


    }


    public function update_it_user(Request $request,$id){


        $user_id = Auth::user();
        $ticket = Ticket::find($id);






        if ($request->status_id == 1) {
            $ticket->ticket_time = $ticket->updated_at;
        }

        $ticket->status_id = $request->status_id;
        $ticket->replay = $request->replay;
        $ticket->recipient_id = $user_id->id;
        $ticket->save();

        $data = [
            'user_id' => $user_id->name,
            'title' => $ticket->title,
            'subject' => $request->status_id,
            'ticket' => $ticket,
            'user' => $ticket->user->name
                ];

        $email = $ticket->user->email;

            # code...
            Mail::send('close_email_template',$data,function($m) use($email ,$ticket,$user_id) {
                $m->to($email)->subject('Close Ticket' . $ticket->id);
                $m->from('asset@metcoapp.com' , 'IT Department');
          

            });



        return redirect()->back();


    }

    


    // Ticket::orderBy('priority_id', 'desc' "asc")
    public function allticket(){
        $types = Type::all();
        return view('pages.allticket')
        ->with('tickets',Ticket::orderBy('status_id', 'asc')
        ->orderBy('priority_id', 'desc')
        ->orderBy('updated_at', 'desc')
        ->paginate(10))
        ->with('profiles',Profile::all())->with('status',Status::all())->with('types',$types);
    }



    public function show($id){
        $ticket = Ticket::find($id);

       return view('pages.show')->with('ticket',$ticket);
    }

    public function test(){

    }
}
