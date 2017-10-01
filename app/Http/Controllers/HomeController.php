<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\UserQuestion;
use App\Models\Question;

class HomeController extends Controller
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
     * This is the secured Homepage.  End users are directed here after sucessfully logging in.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userQuestions = UserQuestion::where('user_id','=', Auth::id())
            ->whereDate('created_at', date("Y-m-d"))
            ->get();

        if(!$userQuestions->count()){

            $questions = Question::all();
            $userQuestions = $questions->map(function ($question) {

                $userQuestion = new UserQuestion();
                $userQuestion->user_id = Auth::id();
                $userQuestion->question()->associate($question);
                $userQuestion->save();

                return $userQuestion;
            });
        }

        return view('home',
            [
                'userQuestions' =>  $userQuestions,
            ]);
    }


    /**
     *
     * This method handles the ajax post requests to update the answers.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitAnswer(Request $request)
    {
        $responseArray = [
            'saved' => false,
        ];

        if (!$request->isMethod('post')) {
            return response()->json($responseArray);
        }

        if(!$request->input('answer')){
            return response()->json($responseArray);
        }

        $answerArray = explode('::', $request->input('answer'));

        $userQuestion = UserQuestion::find($answerArray[0]);
        $userQuestion->selected_answer = $answerArray[1];
        $responseArray['saved'] = $userQuestion->save();

        return response()->json($responseArray);


    }
}
