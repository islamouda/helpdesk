<?php

namespace App\Http\Controllers;
use App\Part;
use App\Manager;
use App\Replacement;
use App\Status;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ReplacementController extends Controller
{
    public function replacement(){
        $parts = Part::all();
        $Manager = Manager::all();
        return view('replacements.replacement')->with('parts',$parts)->with('managers',$Manager);
    }


    public function show(){
        $replacement = Replacement::all();
        $status = Status::all();
        return view('replacements.show')->with('replacements',$replacement)
                                        ->with('status_',$status);
    }

    // replacement code begins
    public function create(Request $request){
        $user_id = Auth::user();

        if ($request->issue == 0) {
             $ch_issue = true;
        }else{
             $ch_issue = false;

        }
        
        $replacement = new Replacement();
        $replacement->user_id = $user_id->id;
        $replacement->it_user_id = $user_id->id;
        $replacement->sn = $request->sn;
        $replacement->date_of_issue = $request->date;
        $replacement->description_user = $request->description_user;
        $replacement->did_issue = $ch_issue;
        $replacement->manager = $request->manager_id;
        $replacement->save();
        $replacement->parts()->attach($request->part_id);
        return redirect()->back();
    }


    public function update(Request $request,$id){
        $user_it = Auth::user();
        if ($request->reason == 0) {
            $reason = true;
       }else{
            $reason = false;

       }

       $replacement = Replacement::find($id);

        $replacement->cost = $request->cost;
        $replacement->it_user_id = $user_it->id;
        $replacement->status = $request->status;
        $replacement->description_it = $request->description_it;
        $replacement->date_of_req = '2019-11-12';
        $replacement->reason = $reason;
        $replacement->save();

        $datapdf = ['title' => $replacement->cost];
        $pdf = PDF::loadView('demoPDF', $datapdf);


        $data = [
            'user' => $user_it->name,
            'title' =>$request->status,
            'subject' => $request->description_it,
            'ticket' => 'islam'
                ];

        $user_it_email = 'islam.odeh@metconetworks.com';        

        Mail::send('dynamic_email_template',$data,function($m) use($user_it_email ,$pdf) {
            $m->to($user_it_email)->subject('Ticket ID : test pdf' );
            $m->from('iraq.helpdesk@metconetworks.com' , 'New Ticket : islam ');
            $m->attachData($pdf->output(), "invoice.pdf");
     });
        


    }


  

    // part code 
       
   public function update_part(Request $request , $id){
    $part = Part::find($id);
    $part->part = $request->part;
    $part->save();
    return redirect()->back();
   }
   public function part_create(Request $request){


       $part = new Part();
       $part->part = $request->part;
       $part->save();
       return redirect()->back();
   }
   public function remove_part(Request $request, $id){

        $part = Part::find($id);
        $part->destroy($id);
    return redirect()->back();
   }



      // Manager code
      public function update_manager(Request $request , $id){
        $manager = Manager::find($id);
        $manager->manager = $request->manager;
        $manager->save();
        return redirect()->back();
       }
       public function manager_create(Request $request){
    
    
           $manager = new Manager();
           $manager->manager = $request->manager;
           $manager->save();
           return redirect()->back();
       }
       public function remove_manager(Request $request, $id){
    
            $manager = Manager::find($id);
            $manager->destroy($id);
        return redirect()->back();
       }


    
}
