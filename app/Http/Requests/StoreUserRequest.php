<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (($this->user() && $this->user()->id === $this->getId()) || (auth()->user() && auth()->user()->can('write User')));
    }

    protected function prepareForValidation()
    {
//        $this->fon = preg_replace('/[ \t]+/i','', $this->fon);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'              => 'required|min:3|unique:users,name',
            'email'             => 'required|email|unique:users,email',
//            'fon'               => $this->getId() ? '' : 'sometimes|unique:App\Models\AdminUser,fon',
            'password'          => 'required',
            'password_repeat'   => 'required_if:passord,null',
            'roles'             => [],
        ];
    }
}
