<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Option;
use App\Models\Question;

class FormController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return Form::all();
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'eventId' => 'required',
      'name' => 'required',
      // 'image' => 'required',
    ]);

    $form = new Form();
    $form->name = $request['name'];
    $form->event_id = $request['eventId'];
    $form->nature = Form::Form;
    // $form->image = $request['image'];
    $form->save();

    if ($form) {
      return ['status' => 200, 'message ' => 'Data Successfully saved'];
    } else {
      return ['status' => 400, 'error' => 'something went wrong'];
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    return Form::find($id);
  }

  public function findById($id)
  {
    $form = Form::find($id);
    $questionList = Question::where("form_id", $id)->get();
    $questions = [];
    foreach ($questionList as $question) {
      $optionList = Option::where("question_id", $question->id)->get();
      $options = [];
      foreach ($optionList as $option) {
        $option = [
          "id" => $option->id,
          "name" => $option->name,
          "value" => $option->value,
          "text" => $option->text,
          "checked" => $option->checked,
          "optionList" => $option->option_list,
          "answerList" => $option->answer_list,
        ];
        array_push($options, $option);
      }
      $question = [
        "id" => $question->id,
        "name" => $question->name,
        "nature" => $question->nature,
        "mandatory" => $question->mandatory,
        "options" => $options,
      ];
      array_push($questions, $question);
    }

    return [
      "id" => $form->id,
      "name" => $form->name,
      "nature" => $form->nature,
      "createdAt" => $form->created_at,
      "image" => $form->image,
      "questions" => $questions,
    ];
  }

  public function save(Request $request)
  {
    $questions = $request['questions'];
    foreach ($questions as $q) {
      $options = $q['options'];
      $question = array_key_exists('id', $q) ? Question::find($q['id']) : null;
      if (is_null($question)) {
        $question = Question::create(array_merge($q, ['form_id' => $request['id']]));
      } else {
        $question->name = $q['name'];
        $question->mandatory = $q['mandatory'];
        $question->nature = $q['nature'];
        $question->save();
      }
      foreach ($options as $o) {
        $option = array_key_exists('id', $o) ? Option::find($o['id']) : null;
        if (is_null($option)) {
          Option::create(array_merge($o, [
            'option_list' => array_key_exists('optionList', $o) ? $o['optionList'] : '',
            'question_id' => $question->id
          ]));
        } else {
          if (array_key_exists('name', $o)) {
            $option->name = $o['name'];
          }
          if (array_key_exists('optionList', $o)) {
            $option->option_list = $o['optionList'];
          }
          $option->save();
        }
      }
    }
    return $request;
  }

  public function createResponse(Request $request, $id)
  {
    $response = Form::where('form_id', $id)->where('user_id', $request['userId'])->first();
    if (!is_null($response)) {
      return ['status' => 200, 'responseId' => $response->id, 'message' => 'response exist'];
    }
    $form = Form::find($id);
    $response = Form::create([
      'name' => $form->name,
      'event_id' => $form->event_id,
      'form_id' => $form->id,
      'user_id' => $request['userId'],
      'nature' => Form::Response,
      'image' => $form->image,
    ]);
    $questions = Question::where('form_id', $form->id)->get();
    foreach ($questions as $question) {
      $clonedQuestion = Question::create([
        'name' => $question->name,
        'mandatory' => $question->mandatory,
        'nature' => $question->nature,
        'form_id' => $response->id,
      ]);
      $options = Option::where('question_id', $question->id)->get();
      foreach ($options as $option) {
        Option::create([
          'question_id' => $clonedQuestion->id,
          'name' => $option->name,
          'option_list' => $option->option_list,
        ]);
      }
    }
    return ['status' => 201, 'responseId' => $response->id, 'message' => 'response created successfully'];
  }

  public function saveResponse(Request $request)
  {
    $options = $request['options'];
    foreach ($options as $option) {
      $updatedOption = Option::find($option['id']);
      $updatedOption->checked = $option['checked'];
      $updatedOption->text = $option['text'];
      $updatedOption->value = $option['value'];
      $updatedOption->answer_list = $option['answerList'];
      $updatedOption->save();
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
