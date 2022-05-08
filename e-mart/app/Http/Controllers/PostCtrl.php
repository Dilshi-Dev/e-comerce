<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
class PostCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $records = Post::latest()->paginate(5);
        return view('post.index',compact('records'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

            // $search = $request['search'] ?? "";
            // if ($search !=""){
            //     $posts=Post::where('type','LIKE',"%$search%")->get();

            // }else{
            //     $posts=Post::get();

            // }
            // $data=compact('posts','search');
            // return view('post.index')->with($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|min:3|max:255',
            'name' => 'required|min:3|max:255',
            'amount' => 'required|min:3|max:255',
            'rcvq' => 'required',
            'remq' => 'required',
            'date' => 'required',
            'supid' => 'required|min:3|max:255',
            'sorderid' => 'required|min:3|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage";
        }
        Post::create($input);
        return redirect()->route('posts.index')->with('success','Stock created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'type' => 'required|min:3|max:255',
            'name' => 'required|min:3|max:255',
            'amount' => 'required|min:3|max:255',
            'rcvq' => 'required',
            'remq' => 'required',
            'date' => 'required',
            'supid' => 'required|min:3|max:255',
            'sorderid' => 'required|min:3|max:255',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage";
        }else{
            unset($input['image']);
        }
        $post->update($input);
        return redirect()->route('posts.index')->with('success','Stock updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
        ->with('success','Stock deleted successfully');
    }
}
