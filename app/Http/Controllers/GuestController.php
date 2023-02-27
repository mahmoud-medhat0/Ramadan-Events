<?php

namespace App\Http\Controllers;

use App\Models\guest;
use Illuminate\Http\Request;
use App\Rules\UniqueLastAnswer;
use App\Http\Requests\StoreAnswer;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question = DB::table('questions')->select('question')->latest('created_at')->get();
        if ($question == '[]') {
            $question = null;
        } else {
            $question = $question[0]->question;
        }
        return view('index')->with('question', $question);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswer $request)
    {
        $latestrecid = DB::table('answer_records')->latest('created_at')->get()[0];
        $qid = DB::table('questions')->latest('created_at')->get()[0]->id;
        if ($latestrecid->date != date('Y-m-d')) {
            DB::table('answer_records')->insert([
                'date' => date('y-m-d'),
                'question_id' => $qid
            ]);
        }
        $validate = [
            'name' => ['required','string'],
            'number'=> ['required','regex:/^01[0-2,5]\d{8}$/',new UniqueLastAnswer],
            'address'=> ['required','string'],
            'answer'=> ['required','string']
        ];
        $request->validate($validate);
        $recid = DB::table('answer_records')->latest('created_at')->get()[0]->id;
        $answers = DB::table('questions')->where('id',$qid)->select('AnswersCount')->get()[0]->AnswersCount;
        DB::table('questions')->where('id',$qid)->update([
            'AnswersCount'=>$answers+1
        ]);
        DB::table('answers')->insert([
            'name' => $request['name'],
            'number' => $request['number'],
            'address' => $request['address'],
            'answer' => $request['answer'],
            'answer_rec_id' => $recid,
            'question_id' => $qid
        ]);
        return view('done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(guest $guest)
    {
        //
    }
}
