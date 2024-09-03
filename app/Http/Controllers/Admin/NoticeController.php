<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = Notice::all();
        return view('notice.index',compact('notices'));
    }

    public function details($id)
    {
        $notice = Notice::find($id);
        return view('notice.details',compact('notice'));
    }

    public function adminNoticeIndex(){
        $notices = Notice::all();
        return view('admin.notice.index',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $notice = $request->all();
        if($request->file('image')){
            $file =$request->file('image');
            $fileName=$file->getClientOriginalName();
            $imagepath=time().'_'.$fileName;
            $file->move(public_path('images/notice/'),$imagepath);
            $notice['image']=$imagepath;
        }
        
        
        Notice::create($notice);

        return redirect()->back();
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $update_notice = Notice::find($id);
        $all_notices= Notice::all();
        return view('admin.notice.edit',compact('update_notice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $id)
    {
        $notice= $request->validate([
            'title'=>'required',
            'content'=>'required',
            'image'=>'nullable'
        ]);
        $notice['image'] =$id->image;
        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $image=time().'_'.$filename;
            $file->move(public_path('/images/book/'),$image);
            File::delete(public_path('/images/book/'.$id->image));
            $notice['image']=$image;
        }

        $id->update($notice);

        return redirect(route('admin.notice.index'))->with('success','Image Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $notice = Notice::find($request->id);
        $notice->delete();
        return redirect(route('admin.notice.index'));

    }
}
