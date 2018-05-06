<?php

namespace App\Http\Requests\Dashboard;

use App\Http\Requests\BaseRequest;

class SettingRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'logo' => 'image|nullable',
        ];
    }
}
