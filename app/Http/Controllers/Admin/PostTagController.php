<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostTag;
use Illuminate\Support\Str;

class PostTagController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postTag=PostTag::orderBy('id','DESC')->paginate(10);
        return view('admin.posttag.index')->with('postTags',$postTag);
    }

    
    public function create()
    {
        return view('admin.posttag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'string|required',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $slug=Str::slug($request->title);
        $count=PostTag::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $status=PostTag::create($data);
        if($status){
            session()->flash('success','Post Tag Successfully added');
        }
        else{
            session()->flash('error','Please try again!!');
        }
        return redirect()->route('post-tag.index');
    }

    
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
        $postTag=PostTag::findOrFail($id);
        return view('admin.posttag.edit')->with('postTag',$postTag);
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
    $postTag = PostTag::findOrFail($id);

    $this->validate($request, [
        'title' => 'string|required',
        'status' => 'required|in:active,inactive'
    ]);

    $data = $request->all();

    // Check if the title has changed, then update the slug
    if ($postTag->title !== $request->title) {
        $slug = Str::slug($request->title);
        $count = PostTag::where('slug', $slug)->where('id', '!=', $id)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;
    }

    $status = $postTag->update($data);

    if ($status) {
        session()->flash('success', 'Post Tag Successfully updated');
    } else {
        session()->flash('error', 'Please try again!!');
    }

    return redirect()->route('post-tag.index');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postTag=PostTag::findOrFail($id);
       
        $status=$postTag->delete();
        
        if($status){
            session()->flash('success','Post Tag successfully deleted');
        }
        else{
            session()->flash('error','Error while deleting post tag');
        }
        return redirect()->route('post-tag.index');
    }
}
