<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class SaveTaskRequest extends Request
{
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
        ];
    }
}
