<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'name'        =>  'required', 'string', 'multi_space',
                        'category_id'  => 'required|numeric',
                        'type' => 'required|string',
                        'price' => 'required|numeric',
                        'features' => 'nullable|array',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'name'        => 'required', 'string', 'multi_space',
                        'category_id' => 'required|numeric',
                        'type' => 'required|string',
                        'price' => 'required|numeric',
                        'features' => 'nullable|array',
                    ];
                }
            default:
                break;
        }
    }
}
