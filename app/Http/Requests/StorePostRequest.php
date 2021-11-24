<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'required|unique:posts,title,'.$this->post.'',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' => 'required',
            'category_id'=>'required',

        ];
    }
    public function messages()
    {
        return[
            'title.required' => 'inno v fill  kr ',
            'title.unique' => 'ida name badal',
            'body.required' =>'Required',
            'slug.required' => 'Required',
            'slug.unique' => 'Need TO Update',
            
        ];
    }

}
