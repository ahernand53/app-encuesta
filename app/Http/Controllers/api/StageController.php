<?php

namespace App\Http\Controllers\api;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionCollection;
use App\Http\Resources\StageCollection;
use App\Question;
use App\Stage;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {

       return StageCollection::collection( Stage::all() );

    }

    /**
     * @param Request $request
     * @return StageCollection
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {

        $rules = [
            'title' => 'required|max:150|string',
            'description' => 'required|max:300|string'
        ];

        $this->validate($request, $rules);

        $stage = Stage::create([
            'title' => $request->get('title'),
            'description' => $request->get('description')
        ]);


        return new StageCollection( $stage );


//        return redirect(route('stages.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param Stage $stage
     * @return StageCollection
     */
    public function show(Stage $stage)
    {
        return new StageCollection( $stage );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Stage $stage
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Stage $stage)
    {
        $rules = [
            'title' => 'max:150|string|unique:stages',
            'description' => 'max:250|string'
        ];

        $stage = Stage::findOrFail($stage)->first();

        if ($request->get('title') != $stage->title ||
            $request->get('description') != $stage->description) {

            $this->validate($request, $rules);
            $stage->title = $request->get('title');
            $stage->description = $request->get('description');

            $stage->save();
        }

        return StageCollection::collection( $stage );


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Stage $stage
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Stage $stage)
    {
        $stage->delete();

        return redirect(route('stages.index'));
    }

    public function getQuestions(Stage $stage) {}

    public function storeQuestion(Stage $stage, Request $request) {

        $question = $request->get('question');

        $questionToAdd = $stage->questions()->create([
            'title' => $question['title'],
            'type' => $question['type']
        ]);


        foreach ($question['answers'] as $answer) {
            $questionToAdd->answers()->save(
                new Answer(['title' => $answer['title']])
            );
        }

        return new QuestionCollection( $questionToAdd );

    }

    public function updateQuestion(Stage $stage, Question $question, Request $request) {

        $questionToUpdate = $request->get('question');
        $question->title = $questionToUpdate['title'];
        $question->type = $questionToUpdate['type'];

        $question->save();

        $answersToKeep = [];
        foreach ($questionToUpdate['answers'] as $answer) {

            $answerToKeep = new Answer();
            if ($answer['id'] != null) {
                $answerToKeep = Answer::findOrFail($answer['id']);
                $answerToKeep->title = $answer['title'];
                $answerToKeep->save();
            } else {
                $answerToKeep = $question->answers()->save(
                    new Answer(['title' => $answer['title']])
                );
            }

            array_push($answersToKeep, $answerToKeep->id);

        }

        $answersToDelete = $question->answers()
            ->whereNotIn('id', $answersToKeep)->get();


        foreach ($answersToDelete as $answer) {
            $answer->delete();
        }

        return new QuestionCollection( $question );



    }

    public function destroyQuestion(Stage $stage, Question $question) {

        $question->delete();

        return response()->json('Question delete', 200);

    }
}
