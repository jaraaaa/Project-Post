<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index', 'show','byCategory', 'byWriter');
    }
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
         'title' => 'required|unique:articles|min:5|max:15',
         'subtitle' => 'required|unique:articles|min:5|max:20',
         'body' => 'required|min:10',
         'image' => 'image|required',
         'category' => 'required',
         'tags' => 'required',
        ]);

    $article = Article::create([
         'title' => $request->title,
         'subtitle' => $request->subtitle,
         'body' => $request->body,
         'image' => $request->file('image')->store('public/image'),
         'category_id' => $request->category,
         'user_id' => Auth::user()->id,
        ]);

        $tags = explode(',' , $request->tags);

        foreach($tags as $tag){
        $newTag = Tag::updateOrCreate([
                'name' => $tag,
        ]);
        $article->tags()->attach($newTag);
        }

        return redirect(route('homepage'))->with('message', 'Articolo pubblicato');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article) {
        return view('article.show', compact('article'));
    }

    // Filtro Category
    public function byCategory(Category $category) {
        $articles = $category->articles->sortByDesc('created_at')->filter(function($article){
            return $article->is_accepted == true;
        });
        return view('article.by-category', compact('category', 'articles'));
    }



    // Filtro byUsers
    public function byWriter(User $user) {
        $articles = $user->articles->sortByDesc('created_at')->filter(function($article){
            return $article->is_accepted == true;
        });
        return view('article.by-Writer', compact('user', 'articles'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view ('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|min:5',
            'subtitle' => 'required|min:5',
            'body' => 'required|min:10',
            'image' => 'image',
            'category' => 'required',
            'tags' => 'required',
        ]);

        if($request->file('image')){
            $image = $request->file('image')->store('public/image');
        }else{
            $image = $article->image;
        }

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category,
            'image' => $image,
        ]);

        if($request->image)
        {
            Storage::delete($article->image);
            $article->update([
                'image' => $request->file('image')->store('public/images')
            ]);
        }

        $tags = explode(', ', $request->tags);

        $newTags = [];

        foreach ($tags as $tag)
        {
            $newTag = Tag::updateOrCreate([
                'name'=> $tag,
            ]);

            $newTags[] = $newTag->id;
        }

        $article->tags()->sync($newTags);

        return redirect(route('writer.dashboard'))->with('message', 'Hai correttamente aggiornato l\'articolo scelto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        foreach($article->tags as $tag)
        {
            $article->tags()->detach($tag);
        }

        $article->delete();

        return redirect(route('writer.dashboard'))->with('message', 'Hai correttamente cancellato l\'articolo scelto');
    }

    //Diciamo al database di recuperarci quegli articoli che hanno nel loro contenuto la parole cercata dall'utente($query)
    public function articleSearch(Request $request){
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.search-index', compact('articles', 'query'));
    }


}
