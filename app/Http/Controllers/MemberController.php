<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\MinistryTypes;
use App\Models\MemberMinistry;
use App\Models\MemberPosition;
use App\Models\ChurchPositions;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = Member::latest()->paginate(5);
     
        return view('members.index',compact('members'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ministries = MinistryTypes::all();
        $positions = ChurchPositions::all();
        return view('members.create',compact('ministries','positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'full_name'=>'required',	
        ]);

        
	
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $profileImage = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move(public_path('upload/user'), $profileImage);
            $input_url = 'upload/user/'.$profileImage;
        }
       
     
       $member = Member::create([
            'full_name' => $request->full_name,
            'date_of_birth'=> $request->date_of_birth,
            'place_of_residence'=>$request->place_of_residence,
            'job'=>$request->job,
            'contact1'=>$request->contact1,	
            'contact2'=>$request->contact2,	
            'spouse_name'=>$request->spouse_name,
            'spouse_contact'=>$request->spouse_contact,
            'fathers_name'=>$request->fathers_name,
            'Fathers_contact'=>$request->fathers_contact,	
            'mothers_name'=>$request->mothers_name,
            'mothers_contact'=>$request->mothers_contact,	
            'photo'=>$input_url,	
        ]);

        if ($member) {
            if(count($request->ministries) > 0){
                foreach($request->ministries as $ministry){
                    MemberMinistry::create([
                        'member_id' => $member->id,
                        'ministry_id' => $ministry
                    ]);
                }
            }

            if(count($request->positions) > 0){
                foreach($request->positions as $position){
                    MemberPosition::create([
                        'member_id' => $member->id,
                        'position_id' => $position
                    ]);
                }
            }

        }
      
        return redirect()->route('member.index')
                        ->with(['success' => 'member created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        $ministries = MemberMinistry::where('member_id',$id)->get();
        $member_ministries = [];
        foreach($ministries as $ministry){
            $member_ministries[] = MinistryTypes::find($ministry->ministry_id);
        }
        $member->ministries = $member_ministries;

        $positions = MemberPosition::where('member_id',$id)->get();
        $member_positions = [];
        foreach($ministries as $ministry){
            $member_positions[] = ChurchPositions::find($ministry->ministry_id);
        }
        $member->positions = $member_positions;
        return view('members.show',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(member $member)
    {
        return view('members.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, member $member)
    {
        //
        $request->validate([
            'full_name'=>'required',	
            'contact1'=> 'required',
            // 'photo' => 'max:2048|nullable|mimes:jpg,png,jpeg',
            // 'contract' => 'max:2048|nullable|mimes:jpg,png,jpeg,pdf'
        ]);
        $input = $request->all();

        // if ($request->has('photo')) {
        //     $photo = $request->file('photo');
        //     $destinationPath = 'images/';
        //     $profileImage = date('YmdHis') . "." . $photo->getmemberOriginalExtension();
        //     $photo->move($destinationPath, $profileImage);
        //     $input['photo'] = "$profileImage";
        // }
        // if ($contract = $request->file('contract')) {
        //     $destinationPath = 'images/';
        //     $profileImage = date('YmdHis') . "." . $contract->getmemberOriginalExtension();
        //     $contract->move($destinationPath, $profileImage);
        //     $input['contract'] = "$profileImage";
        // }
     
        Member::create($input);
      
        return redirect()->route('member.index')
                        ->with(['success' => 'member Updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect()->route('member.index')
                        ->with(['success' => 'member deleted successfully.']);
        
    }
}
