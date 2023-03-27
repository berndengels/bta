<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;

class StorePermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
//        return auth()->user()->can('write Permission');
    }

    public function validationData()
    {
        return $this->merge(
            ['name' => $this->name ?? $this->action . ' ' . $this->model]
        )->toArray();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:permissions,name',
            'custom_name'   => 'nullable|unique:permissions,name',
//            'guard_name'    => 'required',
            'model'         => '',
            'action'        => 'required',
        ];
    }
}
