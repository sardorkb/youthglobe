<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostCategory;
use Illuminate\Support\Str;
class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postCategory=PostCategory::orderBy('id','DESC')->paginate(10);
        return view('admin.postcategory.index')->with('postCategories',$postCategory);
    }

    public function create()
{
    return view('admin.postcategory.create');
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'title'=>'string|required',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $slug=Str::slug($request->title);
        $count=PostCategory::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $status=PostCategory::create($data);
        if($status){
            session()->flash('success','Post Category Successfully added');
        }
        else{
            session()->flash('error','Please try again!!');
        }
        return redirect()->route('post-category.index');
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
        $postCategory=PostCategory::findOrFail($id);
        return view('admin.postcategory.edit')->with('postCategory',$postCategory);
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
        $postCategory = PostCategory::findOrFail($id);

        $this->validate($request, [
            'title' => 'string|required',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        // Check if title is changed and update the slug
        if ($postCategory->title != $request->input('title')) {
            $slug = Str::slug($request->input('title'));
            $count = PostCategory::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
            }
            $data['slug'] = $slug; // Update the slug
        }

        $status = $postCategory->fill($data)->save();

        if ($status) {
            session()->flash('success', 'Post Category Successfully updated');
        } else {
            session()->flash('error', 'Please try again!!');
        }

        return redirect()->route('post-category.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postCategory=PostCategory::findOrFail($id);
       
        $status=$postCategory->delete();
        
        if($status){
            session()->flash('success','Post Category successfully deleted');
        }
        else{
            session()->flash('error','Error while deleting post category');
        }
        return redirect()->route('post-category.index');
    }
}
