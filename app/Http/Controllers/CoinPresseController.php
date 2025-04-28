<?php

namespace App\Http\Controllers;

use App\Models\Friendships;
use App\Models\Comments;
use App\Models\FileUploader;
use App\Models\Press;
use App\Models\Presscategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Image, Session, Share;

class CoinPresseController extends Controller
{
    protected function processTags($tagInput)
    {
        $tags = json_decode($tagInput, true) ?? [];
        $tagArray = array_map(fn($tag) => $tag['value'], $tags);
        return json_encode($tagArray);
    }

    public function presses()
    {
        $page_data['categories'] = Presscategory::all();
        $page_data['presses'] = Press::orderBy('id', 'DESC')->limit('10')->get();
        $page_data['view_path'] = 'frontend.presses.presses';
        return view('frontend.index', $page_data);
    }

    public function mypresse()
    {
        $page_data['presses'] = Press::where('user_id', Auth::id())->with('category')->orderBy('id', 'DESC')->get();;
        $page_data['view_path'] = 'frontend.presses.user_presse';
        return view('frontend.index', $page_data);
    }

    public function create()
    {
        if(!Auth::check() || Auth::user()->user_role !== 'admin')
            abort(403, get_phrase('Non autorisé à créer des articles dans Coin Presse'));

        $page_data['press_category'] = Presscategory::all();
        $page_data['view_path'] = 'frontend.presses.create_presse';
        return view('frontend.index', $page_data);
    }

    public function store(Request $request)
    {
        if(!Auth::check() || Auth::user()->user_role !== 'admin')
            abort(403, get_phrase('Non autorisé à créer des articles dans Coin Presse'));

        $request->validate([
            'title'         => 'required|string|max:255',
            'category'      => 'required|exists:presscategories,id',
            'description'   => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tag'           => 'nullable|string',
        ]);

        $file_name = null;
        if($request->hasFile('image')) {
            $file_name = FileUploader::upload($request->file('image'), 'public/storage/presse/thumbnail', 370);
            FileUploader::upload($request->image, 'public/storage/presse/coverphoto/' . $file_name, 900);
        }

        $presse = new Press();
        $presse->user_id = Auth::user()->id;
        $presse->title = $request->title;
        $presse->category_id = $request->category;
        $presse->description = $request->description;
        $presse->thumbnail = $file_name;
        $presse->tag = $this->processTags($request->tag);
        $presse->view = json_encode([]);
        $presse->save();

        Session::flash('success_message', get_phrase('Article Coin presse créer avec succès'));
        return redirect()->route('presses');
    }

    public function edit($id)
    {
        $presse = Press::findOrFail($id);
        if($presse->user_id !== Auth::id() && !Auth::user()->hasPermissionTo('edit press')) {
            abort(403, get_phrase('Non autorisé à modifier cet article.'));
        }
        $page_data['presse_category'] = Presscategory::all();
        $page_data['presse'] =  $presse;
        $page_data['view_path'] = 'frontend.presses.edit_presse';
        return view('frontend.index', $page_data);
    }

    public function update(Request $request, $id)
    {
        $presse = Press::findOrFail($id);
        if ($presse->user_id !== Auth::id() && !Auth::user()->hasPermissionTo('edit press')) {
            abort(403, get_phrase('Non autorisé à modifier cet article.'));
        }

        $request->validate([
            'title'         => 'required|string|max:255',
            'category'      => 'required|exists:presscategories,id',
            'description'   => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tag'           => 'nullable|string',
        ]);

        $file_name = $presse->thumbnail;
        if ($request->hasFile('image')) {
            $file_name = FileUploader::upload($request->file('image'), 'public/storage/press/thumbnail', 370);
            FileUploader::upload($request->file('image'), 'public/storage/press/coverphoto/' . $file_name, 900);
            if ($presse->thumbnail) {
                removeFile('press/thumbnail', $presse->thumbnail);
                removeFile('press/coverphoto', $presse->thumbnail);
            }
        }

        $presse->title = $request->title;
        $presse->category_id = $request->category;
        $presse->description = $request->description;
        $presse->thumbnail = $file_name;
        $presse->tag = $this->processTags($request->tag);
        $presse->save();
        
        Session::flash('success_message', get_phrase('Article Coin presse mis à jour'));
        return redirect()->route('mypresse');
    }

    public function delete(Request $request, $id)
    {
        $presse = Press::findOrFail($id);
        if ($presse->user_id !== Auth::id() && !Auth::user()->hasPermissionTo('delete press')) {
            abort(403, get_phrase('Non autorisé à supprimer cet article.'));
        }

        $thumbnail = $presse->thumbnail;
        $done = $presse->delete();

        if ($done && $thumbnail) {
            removeFile('press/thumbnail', $thumbnail);
            removeFile('press/coverphoto', $thumbnail);
        }

        return response()->json([
            'alertMessage' => get_phrase('Article Coin presse supprimé'),
            'fadeOutElem' => "#press-{$id}"
        ]);
    }

    public function load_press_by_scrolling(Request $request)
    {
        $presses =  Press::orderBy('id', 'DESC')->skip($request->offset)->take(6)->get();
        $page_data['blogs'] = $presses;
        return view('frontend.presses.presse-single', $page_data);
    }

    public function single_press($id)
    {
        $presse = Press::with('category')->findOrFail($id);
        $presse_view_data = json_decode($presse->view, true) ?? [];
        if(Auth::check() && !in_array(Auth::id(), $presse_view_data)) {
            $presse_view_data[] = Auth::id();
            $presse->view = json_encode($presse_view_data);
            $presse->save();
        }

        $page_data['comments'] = Comments::where('is_type', 'presse')->where('id_of_type', $id)->get();
        $page_data['socailshare'] = Share::currentPage()
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()->getRawLinks();
        $page_data['friendships'] = Friendships::where(function ($query) {
            $query->where('accepter', Auth::id())->orWhere('requester', Auth::id());
        })
            ->where('is_accepted', 1)
            ->orderBy('friendships.importance', 'desc')
            ->take(15)->get();

        $page_data['presse'] = $presse;
        $page_data['categories'] = Presscategory::all();
        $page_data['recent_posts'] = Press::orderBy('id', 'DESC')->limit('5')->get();
        $page_data['view_path'] = 'frontend.presses.single_presse';
        return view('frontend.index', $page_data);
    }

    public function category_presse($category)
    {
        $page_data['categories'] = Presscategory::all();
        $page_data['category_id'] = $category;
        $page_data['presses'] = Press::where('category_id', $category)->get();
        $page_data['view_path'] = 'frontend.presses.category_presse';
        return view('frontend.index', $page_data);
    }

    public function search(Request $request)
    {
        $search = $request->query('search');
        $posts = Press::where('title', 'LIKE', "%{$search}%")->with('category')->get();
        $output = "";

        foreach ($posts as $post) {
            $output .= '<div class="post-entry d-flex">' .
                '<div class="post-thumb"><img class="img-fluid rounded" src=" ' . get_presse_image($post->thumbnail, "thumbnail") . ' " alt="Recent Post"> </div>' .
                '<div class="post-txt ms-2">' .
                '<h3><a href="' . route("single.presse", $post->id) . '"> ' . $post->title . '</a></h3>' .
                '<div class="post-meta">' .
                '<span class="date-meta"><a href="#">' . $post->created_at->format("d-M-Y") . '</a></span>' .
                '</div></div></div>';
        }
        return Response($output);
    }
}
