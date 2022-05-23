<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

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
