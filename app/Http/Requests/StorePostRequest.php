<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Post;

class StorePostRequest extends FormRequest
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
        return [

            'title' => 'required|min:3|unique:posts,title',
            'description' => 'required|min:10'
           
        ];
    }
    public function messages()
{
    return [
        'title.required' => 'A title is required',
        'description.required'  => 'A Description is required',
        'title.min' =>'title must have at least 3 characters',
        'description.min'=>'description must have at least 10 characters ',
        'description.unique'=>'This description has already been taken.'
    ];
}


}
