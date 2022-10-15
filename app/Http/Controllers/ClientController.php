<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::latest()->paginate(5);
     
        return view('clients.index',compact('clients'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'contact1'=> 'required',
        ]);
        $input = $request->all();

        if ($request->has('photo')) {
            $photo = $request->file('photo');
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
        }
        if ($contract = $request->file('contract')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $contract->getClientOriginalExtension();
            $contract->move($destinationPath, $profileImage);
            $input['contract'] = "$profileImage";
        }
     
        Client::create($input);
      
        return redirect()->route('client.index')
                        ->with(['success' => 'Client created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
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
        //     $profileImage = date('YmdHis') . "." . $photo->getClientOriginalExtension();
        //     $photo->move($destinationPath, $profileImage);
        //     $input['photo'] = "$profileImage";
        // }
        // if ($contract = $request->file('contract')) {
        //     $destinationPath = 'images/';
        //     $profileImage = date('YmdHis') . "." . $contract->getClientOriginalExtension();
        //     $contract->move($destinationPath, $profileImage);
        //     $input['contract'] = "$profileImage";
        // }
     
        Client::create($input);
      
        return redirect()->route('client.index')
                        ->with(['success' => 'Client Updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('client.index')
                        ->with(['success' => 'Client deleted successfully.']);
        
    }
}
