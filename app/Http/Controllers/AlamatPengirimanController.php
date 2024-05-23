<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlamatPengiriman;

class AlamatPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();
        $itemalamatpengiriman = AlamatPengiriman::where('user_id', $itemuser->id)->paginate(10);
        $data = array('title' => 'Shipping Address',
                    'itemalamatpengiriman' => $itemalamatpengiriman);
        return view('alamatpengiriman.index', $data)->with('no', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the input data
        $this->validate($request, [
            'IDGAME' => 'required',
            'EMAIL' => 'required|email',
        ]);
    
        // Get the logged-in user data
        $itemuser = $request->user();
    
        // Get the input data
        $inputan = $request->only(['IDGAME', 'no_tlp', 'EMAIL']);
    
        // Add additional required data
        $inputan['user_id'] = $itemuser->id;
        $inputan['status'] = 'utama';
    
        // Create a new shipping address record
        $itemalamatpengiriman = AlamatPengiriman::create($inputan);
    
        // Update all other shipping addresses' status to 'tidak'
        AlamatPengiriman::where('id', '!=', $itemalamatpengiriman->id)
                        ->update(['status' => 'tidak']);
    
        // Redirect back with success message
        return back()->with('success', 'Shipping address saved successfully');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $itemalamatpengiriman = AlamatPengiriman::findOrFail($id);
        $itemalamatpengiriman->update(['status' => 'utama']);
        AlamatPengiriman::where('id', '!=', $id)->update(['status' => 'tidak']);
        return back()->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}