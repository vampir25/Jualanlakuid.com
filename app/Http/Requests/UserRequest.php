<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('id'); // Sesuaikan dengan nama parameter rute jika berbeda
        $isUpdate = $this->method() == 'PUT' || $this->method() == 'PATCH';
    
        return [
            // 'name'      => 'required|string|max:255',
            // 'email'     => [
        //         'required',
        //         'email',
        //         'unique:users,email,' . $userId, // Ignore email user yang sedang diedit
        //     ],
        //     'password'  => $isUpdate ? 'nullable|string|min:8' : 'required|string|min:8',
        //     'alamat'    => 'required|string|max:255',
        //     'tlp'       => 'required|string|max:15',
        //     'role'      => 'required|integer',
        //     'foto'      => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ];
    }
}
