<?php

namespace App\Http\Controllers;

use App\Priority;
use App\Profile;
use App\Ticket;
use App\Type;
use App\User;
use App\Site;
use App\Department;
use App\Position;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function user_page()
    {
        $priority = Priority::all();
        $type = Type::all();
        $user_auth = Auth::user();
        $profile = Profile::where('user_id',$user_auth->id)->get();
        $ticket =Ticket::where('user_id',$user_auth->id)->orderBy('status_id','asc')->orderBy('priority_id','desc')->orderBy('updated_at','desc')->get();
        $ticket_user_count =Ticket::where('user_id',$user_auth->id)->count();
        $users = User::orderBy('updated_at','desc')->get();
        $site = Site::all();
        $position = Position::all();
        $department = Department::all();



        $ticket_count = Ticket::count();
        $ticket_open_count = Ticket::where('status_id' ,'!=',1)->count();
        $ticket_close_count = Ticket::where('status_id' ,1)->count();


        $user_tickets = Ticket::select('user_id')
        ->selectRaw('COUNT(*) AS count')
        ->groupBy('user_id')
        ->orderByDesc('count')
        ->limit(1)
        ->get();


        $recipient_ticket = Ticket::select('recipient_id')->where('status_id' ,1 )
        ->selectRaw('COUNT(*) AS count')
        ->groupBy('recipient_id')
        ->orderByDesc('count')
        ->orderBy('recipient_id', 'asc')
        ->limit(1)
        ->get();



        $today_tickets = Ticket::where('updated_at', '>=', Carbon::now()->subDay())->count();
        $today_open_tickets = Ticket::where('updated_at', '>=', Carbon::now()->subDay())->where('status_id' ,'!=',1)->count();
        $month_tickets = Ticket::where('updated_at', '>=', Carbon::now()->subMonth())->count();
if ($ticket_open_count == 0 || $ticket_close_count == 0  ) {
    # code...
    $ticket_open_percent =  0;
    $ticket_close_percent = 0;
} else {
    # code...
        $ticket_open_percent =  ( $ticket_open_count / $ticket_count)*100;
        $ticket_close_percent =  ( $ticket_close_count / $ticket_count)*100;

}


        $ticket_high_count = Ticket::where('priority_id' ,3)->count();
        $ticket_normal_count = Ticket::where('priority_id' ,2)->count();
        $ticket_low_count = Ticket::where('priority_id' ,1)->count();


        $recipient_test = Ticket::select('recipient_id')->where('status_id' ,1 )
        ->selectRaw('COUNT(*) AS count')
        ->groupBy('recipient_id')
        ->orderByDesc('count')
        ->orderBy('recipient_id', 'asc')
        ->get();

        return view('pages.user')->with('priorities',$priority )
                                 ->with('sites',$site )
                                 ->with('positions',$position )
                                 ->with('departments',$department )
                                 ->with('types',$type )
                                 ->with('user_auth',$user_auth )
                                 ->with('tickets',$ticket )
                                 ->with('profiles',$profile )
                                 ->with('users',$users )
                                 ->with('ticket_count',$ticket_count )
                                 ->with('ticket_open_count',$ticket_open_count )
                                 ->with('ticket_close_count',$ticket_close_count )
                                 ->with('user_tickets',$user_tickets )
                                 ->with('recipient_tickets',$recipient_ticket )
                                 ->with('today_ticket',$today_tickets )
                                 ->with('month_ticket',$month_tickets )
                                 ->with('today_open_ticket',$today_open_tickets )
                                 ->with('ticket_user_count',$ticket_user_count )
                                 ->with('ticket_open_percent',$ticket_open_percent )
                                 ->with('ticket_close_percent',$ticket_close_percent )
                                 ->with('recipient_tests',$recipient_test )
                                 ->with('ticket_high_counts',$ticket_high_count )
                                 ->with('ticket_normal_counts',$ticket_normal_count )
                                 ->with('ticket_low_counts',$ticket_low_count )
                                 ;
    }




    public function profile()
    {


        return view('pages.profile')->with('site',Site::all())
        ->with('department',Department::all())->with('position',Position::all())
        ;
    }


    public function profile_create(Request $request){
        // dd(
        //     $request->ip_phone


        // );
            $this->validate($request,[
                "hr_id"    => "required",
                "site_id"    => "required",
                "department_id"    => "required",
                "position_id"    => "required",
                "ip_phone"    => "required",
                "mobile"    => "required",

            ]);

            $user_id = Auth::user();

                if ($request->avatar == null) {
                $avatar_status = 'img/1.png';
                }else{
                $avatar = $request->avatar;
                $avatar_new_name = $request->hr_id;
                $avatar->move('usersimage/',$avatar_new_name);

                $avatar_status = 'usersimage/'.$avatar_new_name;
                }

                $profile = new Profile();
                $profile->user_id = $user_id->id;
                $profile->hr_id = $request->hr_id;
                $profile->avatar = $avatar_status ;
                $profile->site_id = $request->site_id;
                $profile->department_id = $request->department_id;
                $profile->position_id = $request->position_id;
                $profile->ip_phone = $request->ip_phone;
                $profile->mobile = $request->mobile;
                $profile->save();

                $user_id->privilege = 0;
                $user_id->profile_id = $profile->id;
                $user_id->save();
                return redirect()->route('pages.user');
        }

        public function profile_update(Request $request , $id){




                $this->validate($request,[
                    "name"    => "required",
                    "email"    => "required",
                    "hr_id"    => "required",
                    "site_id"    => "required",
                    "department_id"    => "required",
                    "position_id"    => "required",
                    "ip_phone"    => "required",
                    "mobile"    => "required",

                ]);
                $profile = Profile::find($id);
                $user_id = Auth::user();

                if ( $request->hasFile('avatar')  ) {
                    $avatar = $request->avatar;
                    $avatar_new_name = $request->hr_id;
                    $avatar->move('usersimage/',$avatar_new_name);
                    $profile->avatar = 'usersimage/'.$avatar_new_name;

                    $profile->save();

                }


                    if ($profile->hr_id != $request->hr_id) {
                        $profile->hr_id = $request->hr_id;
                    }


                    $profile->user_id = $user_id->id;

                    $profile->site_id = $request->site_id;
                    $profile->department_id = $request->department_id;
                    $profile->position_id = $request->position_id;
                    $profile->ip_phone = $request->ip_phone;
                    $profile->mobile = $request->mobile;
                    $profile->save();

                    if ($request->password != null) {
                        $user_id->password = Hash::make($request->password);
                    }
                    $user_id->name = $request->name;
                    $user_id->email = $request->email;

                    $user_id->save();
                    return redirect()->route('pages.user')->with('success', 'Updat Profile Successfully ');             }


}
