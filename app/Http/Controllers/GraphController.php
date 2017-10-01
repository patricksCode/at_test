<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserQuestion;

class GraphController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $chartData = [];
        $userQuestions = UserQuestion::all();

        # generate chart array data
        foreach( $userQuestions as $userQuestion){
            $date = new \DateTime($userQuestion->created_at);
            $dateString = $date->format('m-d-y');
            $question = $userQuestion->question()->first();

            if(!isset($chartData[$question->id]['counts'][$dateString])){
                $chartData[$question->id]['title'] = $question->text . "?";
                $chartData[$question->id]['counts'][$dateString][0] = "".$dateString;
                //$chartData[$question->id]['counts'][$dateString][0] = (string)$dateString;
                $chartData[$question->id]['labels'][0] = 'Date';
                foreach($question->answers()->get() as $answer) {
                    $chartData[$question->id]['labels'][$answer->id] = $answer->text;

                    $chartData[$question->id]['counts'][$dateString][$answer->id] = 0;

                }
            }
            $chartData[$question->id]['counts'][$dateString][$userQuestion->selected_answer]++;
        }

        #reformat chart data

        foreach($chartData as &$data){
            $data['counts'] = array_values($data['counts']);
            #$data['labels'] = array_values($data['labels']);
            #print_r(array_values($data['counts']));

        }


        return view('graph-results',
            [
                'chartData' => $chartData,
            ]
        );
    }
}
