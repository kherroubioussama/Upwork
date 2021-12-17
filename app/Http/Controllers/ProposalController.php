<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\CoverLettre;
use App\Models\Job;
use App\Models\Message;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    //
    public function store(Request $request,Job $job){
        $proposal=Proposal::create([
            'job_id' => $job->id,
            'validated' => false,

        ]);
        CoverLettre::create([
            'proposal_id'=>$proposal->id,
            'content'=>$request->input('content'),
        ]);
        return redirect()->route('jobs.index');
    }
    public function confirm(Request $request){
        $proposal=Proposal::findOrFail($request->proposal);
        $proposal->fill(['validated'=>true]);
        if($proposal->isDirty()){
            $proposal->save();
            $conversation=Conversation::create([
                'from'=>auth()->user()->id,
                'to'=>$proposal->user->id,
                'job_id'=>$proposal->job_id,
            ]);
            Message::create([
                'user_id'=>auth()->user()->id,
                'conversation_id'=>$conversation->id,
                'content'=>"Bonjour,j'ai validé votre offre."
            ]);
            return redirect()->route('jobs.index');
        }
        
    }
}
