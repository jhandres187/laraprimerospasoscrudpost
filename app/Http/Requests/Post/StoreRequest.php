<?php

namespace App\Http\Requests\Post;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title)
            // 'slug' => Str::of($this->title)->slug()->append('-adicional')
            // 'slug' => str($this->title)->slug()//laravel9
        ]);
    }

    static public function myRules()
    {
        return [
            'title' => 'required|min:5|max:500',
            'slug' => 'required|min:5|max:500|unique:posts',
            'content' => 'required|min:10|max:500',
            'category_id' => 'required|integer',
            'description' => 'required|min:10|max:500',
            'posted' => 'required',
        ];
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
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->myRules();
        // return [
        //     'title' => 'required|min:5|max:500',
        //     'slug' => 'required|min:5|max:500',
        //     'content' => 'required|min:10|max:500',
        //     'category_id' => 'required|integer',
        //     'description' => 'required|min:10|max:500',
        //     'posted' => 'required',
        // ];
    }
}
