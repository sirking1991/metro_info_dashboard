<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Builder;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = \App\News::latest('posting_date')
            ->where('subject', 'like', "%{$request->search}%")
            ->where('lgu_id', auth()->user()->lgu_id)
            ->paginate(10);

        return view('news-list', ['news' => $news, 'search' => $request->search]);        
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null) 
    {
        $news = \App\News::find($id);

        if(null != $id && (!$news || $news->lgu_id != auth()->user()->lgu_id)) {
            abort(404);
        }

        return view('news-show', ['news' => $news]);
    }

    /**
     * UpSave record
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $request->validate([
            'posting_date' => ['required', 'date'],
            'subject' => ['required'],
            'content' => ['required'],
        ]);

        $news = News::find($request->id);
        if (!$news || $news->lgu_id != auth()->user()->lgu_id) {
            $news = new News();
            $news->lgu_id = auth()->user()->lgu_id;
            $news->posted_by = auth()->user()->id;
        }

        $news->posting_date = $request->posting_date;
        $news->subject = $request->subject;
        $news->content = $request->content;
        $news->broadcast = $request->broadcast;
        $news->save();

        $request->session()->flash('status', 'News saved');

        return redirect('/news/' . $news->id);
    }
    
    public function publish($id)
    {
        $news = News::find($id);

        if (!$news || $news->lgu_id != auth()->user()->lgu_id) {
            return response('', 404);
        }

        \App\Jobs\PublishNews::dispatchNow($news);

        return response()->json(['result'=>'success']);
    }

    public function unpublish($id)
    {
        $news = News::find($id);

        if (!$news || $news->lgu_id != auth()->user()->lgu_id) {
            return response('', 404);
        }

        $news->status = 'unpublish';
        $news->save();

        return response()->json(['result'=>'success']);
    }    

    public function delete($id)
    {
        $news = News::find($id);

        if (!$news || $news->lgu_id != auth()->user()->lgu_id) {
            return response('', 404);
        }
        
        $news->delete();

        return response()->json();
    }
}
