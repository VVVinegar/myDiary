<?php

namespace App\Http\Controllers;

use App\Diary;
use App\Repositories\DiaryRepository;
use Illuminate\Http\Request;
use FacadeHello;

use App\Http\Requests;

class DiaryController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var DiaryRepository
     */
    protected $diaries;

    /**
     * Create a new controller instance.
     *
     * @param  DiaryRepository  $diaries
     * @return void
     */
    public function __construct(DiaryRepository $diaries){
        $this->middleware('auth');
        $this->diaries=$diaries;
    }

    /**
     * Display a list of all of the user's diaries.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request){
        return view('diaries.index',[
           'diaries'=>$this->diaries->forUser($request->user()),
        'hello'=>FacadeHello::hello(),
        ]);
    }

    /**
     * Create a new diary.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request){
        $request->flash();
        $this->validate($request,[
           'title'=>'required|max:255',
        ]);
        $request->user()->diaries()->create([
           'title'=>$request->input('title'),
            'content'=>$request->input('Content')
        ]);

        return redirect('/diaries');
    }

    /**
     * Destroy the given diary.
     *
     * @param  Request  $request
     * @param  Diary  $diary
     * @return Response
     */
    public function destroy(Request $request,Diary $diary){
        $this->authorize('destroy', $diary);
        $diary->delete();
        return redirect('/diaries');
    }
}
