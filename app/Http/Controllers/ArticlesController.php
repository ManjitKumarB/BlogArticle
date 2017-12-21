<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;

use Illuminate\Foundation\Validation;
use Illuminate\Http\Request;

//use Carbon\Carbon;

class ArticlesController extends Controller
{
    /**
     * Create a new article controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Show all published articles.
     * 
     * @return Response
     */
    public function index(){

        //return \Auth::user()->name; This is to get currently logged in user

        $articles = Article::latest('published_at')->published()->get();

       //$latest = Article::latest()->first();

        return view('articles.index' , compact('articles')); // OR return view('articles.index')->with('articles', $articles);

        }


    /**
     * Show article details
     * 
     * @param Article $article
     * 
     * @return Response
     */
    public function show(Article $article){
                
                //$article = Article::findOrFail($id);
        
                return view('articles.show' , compact('article')); // OR return view('articles.show')->with('article', $article);
        }


    //Add Article        
    public function create(){
                
                $tags = Tag::all('name', 'id');
                return view('articles.create', compact('tags'));
        }


    /*
    //Store new article + validations validate via a validation class ArticleRequest
    public function store(ArticleRequest $request){
        
                $input = $request->all();

                // $input['published_at'] = Carbon::now(); -- taking input from user instead of setting current date

                Article::create($input);
                return redirect('articles');
        }
    */

    //Store new article + validations validate via a validation within the function 
    /**
     * Save a new article
     * 
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request){
        
                //Validation inputs
                //$this->validate($request, ['title'=>'required|min:3', 'body'=>'required', 'published_at'=>'required|date']);
        
                //Access request data and save to database via user's referenced article function
                //$article = new Article($request->all());
                
                $this->createArticle($request);

                flash()->overlay('Your article has been created!', 'good job');

                // \Session::flash('flash_message', 'Your article has been created!');
                // \Session::flash('flash_message_important', true);
        
                return redirect('articles');
        }


    /**
     * Edit an existing article.
     * 
     * @param Article $article
     * @return Response
     * 
     */
    public function edit(Article $article){

        //verify owner
        if (\Auth::user()->id == $article->user_id) {
            
            $tags = Tag::all('name', 'id');
            $tagList = array_column($article->tagList,'id');
    
            //$article = Article::findOrFail($id);
            return view('articles.edit', compact('article', 'tags', 'tagList'));
        } else {
            flash()->error( "You have no rights to access this link", "unauthorized access!");
            return redirect("articles");
        }


    }

    /**
     * Update an article.
     * 
     * @param ArticleRequest $request
     * @param Article $article
     * @return Response
     * 
     */
    public function update(Article $article, ArticleRequest $request){

        $article->update($request->all());
        $this->syncTags($article, $request->input('tags'));

        return redirect('articles');
    }

    /**
     * A user can have many articles
     *
     * @return \illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return hasMany('App\Article');

    }

    //Show all articles own by loggedin user
    public function userArticles()
    {
        $user_id = \Auth::user()->id;
        $articles = Article::latest('published_at')->where('user_id', '=', $user_id)->get();

        //Verify articles from User
        if (isset($articles[0])) {
            return view('articles.index' , compact('articles'));

        } else {
            return "no articles to show";
        }
        
    }

    /**
     * Sync up the list of tags in the database.
     * 
     * @param ArticleRequest $request
     * @param Article $article
     * 
     */
    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }


    /**
     * Save a new Article
     * 
     * @param ArticleRequest $request
     * 
     * @return mixed
     */
    private function createArticle(ArticleRequest $request )
    {
        $article = \Auth::user()->articles()->create($request->all());
        $this->syncTags($article, $request->input('tags'));
    }


    
    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)
    
        {
            Article::find($id)->delete();
            flash()->overlay('Article deleted successfully!', 'success');
            return redirect('articles');
        
        }


    /* 
    public function search($serachVal)
    {

        $articles = Article::latest('published_at')->where('user_id', '=', $user_id)->get();

        //Verify articles from User
        if (isset($articles[0])) {
            return view('articles.index' , compact('articles'));

        } else {
            return "no articles to show";
        }
        
    } */


}