<?php

namespace App\Http\Controllers\Poll;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Stage;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function show($key)
    {

        return view('Poll.index');

    }

    /**
     * @return Factory|View
     */
    public function register()
    {

        return view('Poll.register');

    }

    /**
     * @param Request $request
     * @return Factory|View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendRegister(Request $request)
    {

        $rules = [
            'name' => 'string|required',
            'lastname' => 'string|required',
            'email' => 'email|required|unique:users'
        ];

        $this->validate($request, $rules);

        $user = new User();
        $user->name = $request->get('name');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->survey_token = str_random(42);
        $user->remember_token = str_random(10);

        $user->save();

        return view('Poll.completeRegister');

    }

    /**
     * @param $key
     * @return Factory|View
     */
    public function makeSurvey($key)
    {

        $user = User::where('survey_token', $key)->get()->first();

        if (!isset($user)) {
            return redirect(route('welcome'));
        }

        Auth::login($user);

        if ($user->survey_made) {
            return view('Poll.index');
        }

        $stages = Stage::all()->load('questions');

        return view('Poll.index', ['stages' => $stages]);

    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function madeSurvey(Request $request) {

        $userAnswered = User::findOrFail($request->get('user'))->first();
        foreach ($request->get('questions') as $questionId => $chosenAnswerId) {

            $answer = Answer::find($chosenAnswerId)->first();
            $userAnswered->answers()->attach($chosenAnswerId, [
                'answer' => $answer->title
            ]);

        }

        $userAnswered->survey_made = true;
        $userAnswered->save();

        return view('Poll.completeSurvey');

    }
}
