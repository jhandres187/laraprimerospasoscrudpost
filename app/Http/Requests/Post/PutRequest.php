<?php

namespace App\Http\Requests\Post;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PutRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    //error en la api
    function failedValidation(Validator $validator)
    {
        if($this->expectsJson()){//puede haber ocnflictos con la web por eso debemos 
            // colocar accept aplication/json en el header para que al esperar un json actue y solo espera json la api
            $response = new Response($validator->errors(),422);
            throw new ValidationException($validator, $response);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->route("post")->id); //recuperar la data del post
        // return $this->myRules();
        return [
            'title' => 'required|min:5|max:500',
            'slug' => 'required|min:5|max:500|unique:posts,slug,'.$this->route("post")->id,
            'content' => 'required|min:10|max:500',
            'category_id' => 'required|integer',
            'description' => 'required|min:10|max:500',
            'posted' => 'required',
            'image' => 'mimes:jpg,jpeg,png|max:10240'
        ];
    }
}
