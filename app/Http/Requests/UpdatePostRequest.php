<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Post;
class UpdatePostRequest extends FormRequest
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
        $id = $this->route('post');//ely ma ben curly bracket
        $post = Post::find($id);
        return [

            'title' => ['required','min:3',Rule::unique('posts')->ignore($post->title, 'title')],
            'description' => 'required|min:10',
            'user_id'=>'exists:users,id'
           
        ];
    }
    public function messages()
{
    return [
        'title.required' => 'A title is required',
        'description.required'  => 'A Description is required',
        'title.min' =>'title must have at least 3 characters',
        'description.min'=>'description must have at least 10 characters ',
        'description.unique'=>'This description has already been taken.',
        'user_id.exists'=>'Someone tried to attack '
    ];
}


}
