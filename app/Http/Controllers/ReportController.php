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

use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(){
        $priority = Priority::all();
        $type = Type::all();
        $user_auth = Auth::user();
        $profile = Profile::where('user_id',$user_auth->id)->get();
        $ticket =Ticket::where('user_id',$user_auth->id)->orderBy('status_id','desc')->get();
        $users = User::all();
        $site = Site::all();
        $position = Position::all();
        $department = Department::all();



        $ticket_count = Ticket::count();
        $ticket_open_count = Ticket::where('status_id' ,'!=',1)->count();
        $ticket_close_count = Ticket::where('status_id' ,1)->count();
        $ticket_high_count = Ticket::where('priority_id' ,3)->count();
        $ticket_normal_count = Ticket::where('priority_id' ,2)->count();
        $ticket_low_count = Ticket::where('priority_id' ,1)->count();

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

        $recipient_test = Ticket::select('recipient_id')->where('status_id' ,1 )
        ->selectRaw('COUNT(*) AS count')
        ->groupBy('recipient_id')
        ->orderByDesc('count')
        ->orderBy('recipient_id', 'asc')
        ->get();

        $today_tickets = Ticket::where('updated_at', '>=', Carbon::now()->subDay())->count();
        $today_open_tickets = Ticket::where('updated_at', '>=', Carbon::now()->subDay())->where('status_id' ,'!=',1)->count();
        $today_close_tickets = Ticket::where('updated_at', '>=', Carbon::now()->subDay())->where('status_id',1)->count();
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



        return view('pages.report')->with('priorities',$priority )
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
        ->with('today_close_ticket',$today_close_tickets )
        ->with('ticket_open_percent',$ticket_open_percent )
        ->with('ticket_close_percent',$ticket_close_percent )
        ->with('recipient_tests',$recipient_test )
        ->with('ticket_high_counts',$ticket_high_count )
        ->with('ticket_normal_counts',$ticket_normal_count )
        ->with('ticket_low_counts',$ticket_low_count )
        ;
    }
}
