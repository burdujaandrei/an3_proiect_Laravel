<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Archive;
use App\Image;

class ArchiveController extends Controller
{
    public function index()
    {
      $archives_updated = DB::table('archive_updated')->get();
      $archives = DB::select('CALL GetArchives()');
    	return view('archive') -> with([
        'archives' => $archives,
        'archives_updated' => $archives_updated
      ]);
    }

    public function insert_archive(Request $request)
    {
    	 return view('insert_archive');

    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
   public function send(Request $request)
   {
       $this->validate($request, [
        'title' => 'required',
        'content' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $target = md5(uniqid(time())).$file->getClientOriginalName();
            $file->move(public_path().'/images/',$target);
            $request->image = $target;
        }

      Session::flash('message','Insert successfully.');
      DB::insert("CALL InsertArchive('".$request->input('title')."','".$request->input('content')."','".$request->image."')");
      return back();
   }

    public function edit($id)
    {
        $archive = DB::select("CALL GetArchive('".$id."')");
        return view('edit_archive',['archive'=>$archive]);
    }

    public function update(Request $request, $id)
    {

       $this->validate($request, [
        'image' => 'image|mimes:jpg,jpeg,png,gif'
        ]);

       if($request->input('image'))
       {
         if($request->hasFile('image'))
          {
              $file = $request->file('image');
              $target = md5(uniqid(time())).$file->getClientOriginalName();
              $file->move(public_path().'/images/',$target);
              $request->image = $target;
          }
        }
        else
        {
            $request->image = $request->input('old_image');
        }
      
        $array = array(
          'title' => $request['title'],
          'content' => $request['content'],
          'image' => $request['old_image']        
        );
          
          Session::flash('message','Update successfully.');

          Archive::where('id',$id)->update($array);

      return back();
    }

    public function delete($id)
    {
        $archive = Archive::findOrFail($id);

        $archive->delete();

        Session::flash('message','Delete successfully.');

      return back();
    }

    public function show($id)
    {
        $archive = DB::select("CALL GetArchive('".$id."')");
        return view('show_archive',['archive'=>$archive]);
    }
}
