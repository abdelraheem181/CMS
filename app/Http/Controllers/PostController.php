<?php

namespace App\Http\Controllers;

use App\Helpers\Slug;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
        $this->middleware('verified')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post::with('user:id,name,profile_photo_path')->approved()->paginate(10);
        $title = 'جميع المنشورات';
        return view('index' , compact('posts' , 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request , [
        'title'  => 'required',
        'body'  => 'required',
     
       ]);

       if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . $file->getClientOriginalName();
        $file->storeAs('public/images/' , $filename);
       }
       $request->user()->posts()->create($request->all() + ['image_path'=>$filename ?? 'default.jpg']);
       return back()->with('success' , 'تم حذف المنشور بنجاح و سوف يتم عرضه عند الموافقة عليه');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = $this->post::where('slug' , $slug)->first();
        $comments = $post->comments->sortByDesc('created_at');
        return view('posts.show' , compact('post' , 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post::find($id);

        abort_unless(auth()->user()->can('update-post', $post), 403);
        
        return view('posts.edit' , compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $data['slug'] = Slug::uniqueSlug($request->title,'posts');
        $data['category_id'] = $request->category_id;

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->storeAs('public/images/', $filename);
        }

        $request->user()->posts()->where('slug', $slug)->update($data + ['image_path'=> $filename ?? 'default.jpg']);

        return redirect(route('post.show', $data['slug']))->with('success', 'تم التعديل ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->post::find($id);
        abort_unless(auth()->user()->can('delete-post', $post), 403);
        $post->delete();
        return back()->with('success' , 'تم الحذف');
    }

    public function search(Request $request)
    {
     $posts = $this->post::where('body' , 'LIKE' , '%'. $request->keyword . '%')->with('user')->approved()->paginate(10);
     $title = 'نتائج البحث عن ' . $request->keyword;
     return view('index' , compact('posts' , 'title'));
    }

    public function getCategory($id)
    {
        $posts  = $this->post::with('user')->whereCategory_id($id)->approved()->paginate(10);
        $title  =  ':  نتائج البحث عن التنصيف ' . Category::find($id)->title;
        return view('index' , compact('posts' , 'title'));
    }
}
