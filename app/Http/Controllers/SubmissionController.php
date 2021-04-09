<?php

namespace App\Http\Controllers;
use Auth;
use File;
use Illuminate\Http\Request;
use App\Contribution;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $submission = new contribution();
        $user_id = Auth::user()->id;
        $submission->submitted_by = $user_id;
        $submission->status = 0;

        $file =$request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $submission->file =$filename;

        $file->move('uploads/',$filename);

        $submission->save();

        return redirect()->back();
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
        $submission = Contribution::find($id);
        $submission->status = 1;
        if ($request->hasFile('image')) {

            $filename = $submission->file;
            $fullPath = 'uploads' . $filename;
            if (File::exists($fullPath)) File::delete($fullPath);

            $file =$request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename1=time().'.'.$extension;
            $submission->image =$filename1;

            $file->move('uploads',$filename1);
        }

        $submission->save();

        return redirect()->back();
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
