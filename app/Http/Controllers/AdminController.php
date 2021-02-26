<?php

namespace App\Http\Controllers;

use App\Department;
use App\Position;
use App\Priority;
use App\Privilege;
use App\Profile;
use App\Site;
use App\Status;
use App\Ticket;
use App\Type;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;

class AdminController extends Controller
{

    public function test(){

        $connected = @fsockopen("www.google.com", 80); 
        //website, port  (try 80 or 443)
        if ($connected){
        $is_conn = 'connected'; //action when connected
        fclose($connected);
        }else{
        $is_conn = 'connection failure'; //action in connection failure
        }
        
        return $is_conn;
        // $priority = Priority::all();
        // $type = Type::all();
        // $user_auth = Auth::user();
        // $profile = Profile::where('user_id',$user_auth->id)->get();
        // $ticket =Ticket::where('user_id',$user_auth->id)->orderBy('status_id','desc')->get();
        // $users = User::all();
        // $site = Site::all();
        // $position = Position::all();
        // $department = Department::all();



        // $ticket_count = Ticket::count();
        // $ticket_open_count = Ticket::where('status_id' ,'!=',1)->count();
        // $ticket_close_count = Ticket::where('status_id' ,1)->count();
        // $ticket_high_count = Ticket::where('priority_id' ,3)->count();
        // $ticket_normal_count = Ticket::where('priority_id' ,2)->count();
        // $ticket_low_count = Ticket::where('priority_id' ,1)->count();

        // $user_tickets = Ticket::select('user_id')
        // ->selectRaw('COUNT(*) AS count')
        // ->groupBy('user_id')
        // ->orderByDesc('count')
        // ->limit(1)
        // ->get();


        // $recipient_ticket = Ticket::select('recipient_id')->where('status_id' ,1 )
        // ->selectRaw('COUNT(*) AS count')
        // ->groupBy('recipient_id')
        // ->orderByDesc('count')
        // ->orderBy('recipient_id', 'asc')
        // ->limit(1)
        // ->get();

        // $recipient_test = Ticket::select('recipient_id')->where('status_id' ,1 )
        // ->selectRaw('COUNT(*) AS count')
        // ->groupBy('recipient_id')
        // ->orderByDesc('count')
        // ->orderBy('recipient_id', 'asc')
        // ->get();

        // $today_tickets = Ticket::where('updated_at', '>=', Carbon::now()->subDay())->count();
        // $today_open_tickets = Ticket::where('updated_at', '>=', Carbon::now()->subDay())->where('status_id' ,'!=',1)->count();
        // $month_tickets = Ticket::where('updated_at', '>=', Carbon::now()->subMonth())->count();

        // $ticket_open_percent =  ( $ticket_open_count / $ticket_count)*100;
        // $ticket_close_percent =  ( $ticket_close_count / $ticket_count)*100;



        // return view('pages.test')->with('priorities',$priority )
        // ->with('sites',$site )
        // ->with('positions',$position )
        // ->with('departments',$department )
        // ->with('types',$type )
        // ->with('user_auth',$user_auth )
        // ->with('tickets',$ticket )
        // ->with('profiles',$profile )
        // ->with('users',$users )
        // ->with('ticket_count',$ticket_count )
        // ->with('ticket_open_count',$ticket_open_count )
        // ->with('ticket_close_count',$ticket_close_count )
        // ->with('user_tickets',$user_tickets )
        // ->with('recipient_tickets',$recipient_ticket )
        // ->with('today_ticket',$today_tickets )
        // ->with('month_ticket',$month_tickets )
        // ->with('today_open_ticket',$today_open_tickets )
        // ->with('ticket_open_percent',$ticket_open_percent )
        // ->with('ticket_close_percent',$ticket_close_percent )
        // ->with('recipient_tests',$recipient_test )
        // ->with('ticket_high_counts',$ticket_high_count )
        // ->with('ticket_normal_counts',$ticket_normal_count )
        // ->with('ticket_low_counts',$ticket_low_count )
        // ;
    }
   public function main(){
        return view('admin.admin');
    }

   public function ticket(){
       $ticket = Ticket::orderBy('updated_at','desc')->get();

       return view('admin.ticket')->with('tickets',$ticket);
   }

   public function user(){
    $user = User::orderBy('updated_at','desc')->get();
    $privilege = Privilege::all();
    $site = Site::all();
    $position = Position::all();
    $department = Department::all();
    $site = Site::all();
    $profile = Profile::all();

       return view('admin.user')
       ->with('sites',$site )
       ->with('positions',$position )
       ->with('departments',$department )
       ->with('profiles',$profile )
       ->with('users',$user)->with('privileges',$privilege);
   }


   public function update_user(Request $request , $id){

    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->admin = $request->admin;
    $user->privilege = $request->privilege;
    $user->save();

    $profile = Profile::where('user_id', '=', $user->id)->firstOrFail();

    $profile->hr_id = $request->hr_id;
    $profile->site_id = $request->site_id;
    $profile->department_id = $request->department_id;
    $profile->position_id = $request->position_id;
    $profile->ip_phone = $request->ip_phone;
    $profile->mobile = $request->mobile;
    $profile->save();

    return redirect()->back();
   }


   public function item(){
       $site = Site::all();
       $department = Department::all();
       $position = Position::all();
       $priority = Priority::all();
       $privilege = Privilege::all();
       $status = Status::all();
       $type = Type::all();
     return view('admin.item')
     ->with('sites',$site)
     ->with('departments',$department)
     ->with('positions',$position)
     ->with('prioritys',$priority)
     ->with('privileges',$privilege)
     ->with('statuss',$status)
     ->with('types',$type);
   }

// Site code
   public function update_site(Request $request , $id){
    $site = Site::find($id);
    $site->site = $request->site;
    $site->save();
    return redirect()->back();
   }
   public function site_create(Request $request){


       $site = new Site();
       $site->site = $request->site;
       $site->save();
       return redirect()->back();
   }
   public function remove_site(Request $request, $id){

        $site = Site::find($id);
        $site->destroy($id);
    return redirect()->back();
   }



   // department code
   public function update_department(Request $request , $id){
    $department = Department::find($id);
    $department->department = $request->department;
    $department->save();
    return redirect()->back();
   }
   public function department_create(Request $request){


       $department = new Department();
       $department->department = $request->department;
       $department->save();
       return redirect()->back();
   }
   public function remove_department(Request $request, $id){

        $department = Department::find($id);
        $department->destroy($id);
    return redirect()->back();
   }




   // Position code
   public function update_position(Request $request , $id){
    $position = Position::find($id);
    $position->position = $request->position;
    $position->save();
    return redirect()->back();
   }
   public function position_create(Request $request){


       $position = new Position();
       $position->position = $request->position;
       $position->save();
       return redirect()->back();
   }
   public function remove_position(Request $request, $id){

        $position = Position::find($id);
        $position->destroy($id);
    return redirect()->back();
   }




   // Priority code
   public function update_priority(Request $request , $id){
    $priority = Priority::find($id);
    $priority->priority = $request->priority;
    $priority->save();
    return redirect()->back();
   }
   public function priority_create(Request $request){


       $priority = new Priority();
       $priority->priority = $request->priority;
       $priority->save();
       return redirect()->back();
   }
   public function remove_priority(Request $request, $id){

        $priority = Priority::find($id);
        $priority->destroy($id);
    return redirect()->back();
   }



   // Privilege code
   public function update_privilege(Request $request , $id){
    $privilege = Privilege::find($id);
    $privilege->privilege = $request->privilege;
    $privilege->save();
    return redirect()->back();
   }
   public function privilege_create(Request $request){


       $privilege = new Privilege();
       $privilege->privilege = $request->privilege;
       $privilege->save();
       return redirect()->back();
   }
   public function remove_privilege(Request $request, $id){

        $privilege = Privilege::find($id);
        $privilege->destroy($id);
    return redirect()->back();
   }



   // Status code
   public function update_status(Request $request , $id){
    $status = Status::find($id);
    $status->status = $request->status;
    $status->save();
    return redirect()->back();
   }
   public function status_create(Request $request){


       $status = new Status();
       $status->status = $request->status;
       $status->save();
       return redirect()->back();
   }
   public function remove_status(Request $request, $id){

        $status = Status::find($id);
        $status->destroy($id);
    return redirect()->back();
   }



   // type code
   public function update_type(Request $request , $id){
    $type = Type::find($id);
    $type->type = $request->type;
    $type->save();
    return redirect()->back();
   }
   public function type_create(Request $request){


       $type = new Type();
       $type->type = $request->type;
       $type->save();
       return redirect()->back();
   }
   public function remove_type(Request $request, $id){

        $type = Type::find($id);
        $type->destroy($id);
    return redirect()->back();
   }



}
