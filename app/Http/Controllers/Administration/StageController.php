<?php

namespace App\Http\Controllers\Administration;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Question;
use App\Stage;
use App\Type;
use Illuminate\Http\Request;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Stage[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $stages = Stage::all();

        return view('Administration.Poll.stages.index', [
           'stages' => $stages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Stage
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create()
    {
        $types = Type::all();

        return view('Administration.Poll.stages.create', [
            'types' => $types
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {

        $rules = [
            'title' => 'required|max:150|string|unique:stages',
            'description' => 'required|max:300|string'
        ];

        $this->validate($request, $rules);

        $stage = new Stage([
            'title' => $request->get('title'),
            'description' => $request->get('description')
        ]);

        $stage->save();
        $question_test = null;
        foreach ($request->get('questions') as $id => $question) {
            foreach ($question as $key => $data) {
                if ($key == 0) {

                    if ($data == '') {
                        return back()->withErrors([
                            'title' => 'empty'
                        ])->withInput();
                    }

                    $question_test = new Question([
                        'title' => $data
                    ]);
                    $type = Type::findOrFail($request->get('types')[$id]);

                    $question_test->stage()->associate($stage);
                    $question_test->type()->associate($type);

                    $question_test->save();
                    continue;
                }

                $question_test->answers()->create([
                    'title' => $data
                ]);

            }
        }

        return redirect(route('stages.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage)
    {
        $stage = Stage::findOrFail($stage);

        return $stage;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function edit(Stage $stage)
    {

        $stage = Stage::findOrFail($stage->id);
        $questions = $stage->load('questions')->questions;
        $types = Type::all();

        return view('Administration.Poll.stages.edit', [
            'stage' => $stage,
            'questions' => $questions,
            'types' => $types
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Stage $stage
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Stage $stage)
    {

        $rules = [
            'title' => 'max:150|string|unique:stages',
            'description' => 'max:250|string'
        ];

        $stage = Stage::findOrFail($stage)->first();
        $questionToKeep = [];
        $answersToKeep = [];

        if ($request->get('title') != $stage->title ||
            $request->get('description') != $stage->description) {

            $this->validate($request, $rules);
            $stage->title = $request->get('title');
            $stage->description = $request->get('description');

            $stage->save();
        }

        /*--------- SE RECORRE TODAS LAS PREGUNTAS  ---------*/
        foreach ($request->get('questions') as $id_q => $title) {

            $type = Type::findOrFail($request->get('types')[$id_q]);


            if ($title == '') {
                return back()->withErrors([
                    'title' => 'empty'
                ])->withInput();
            }

            $question_test = Question::updateOrCreate([
                'id' => $id_q
            ],[
                'title' => $title,
                'stage_id' => $stage->id,
                'type_id' => $type->id
            ]);

            $questionToKeep[] = $question_test->id;

            /*--------- SE ACTUALIZA LOS RESPUESTAS DE LA PREGUNTA ---------*/
            foreach ($request->get('answers') as $question => $answers) {
                if ($id_q == $question) {
                    foreach ($answers as $id_a => $title) {

                        if ($title == '') {
                            return back()->withErrors([
                                'title' => 'empty'
                            ])->withInput();
                        }

                        $answer = Question::find($question)->answers()->updateOrCreate([
                            'id' => $id_a
                        ],[
                            'title' => $title,
                            'question_id' => $question
                        ]);

                        $answersToKeep[] = $answer->id;

                    }

                    $answersToDelete = Question::find($question)
                        ->answers()
                        ->whereNotIn('id', $answersToKeep)
                        ->get();

                    foreach ($answersToDelete as $answerDelete) {
                        $answerDelete->delete();
                    }
                }
            }


        }


        $questionsToDelete = $stage->questions()
            ->whereNotIn('id', $questionToKeep)
            ->get();

        foreach ($questionsToDelete as $question) {
            $question->delete();
        }

        return redirect(route('stages.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stage $stage
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Stage $stage)
    {
        $stage->delete();

        return redirect(route('stages.index'));
    }
}
