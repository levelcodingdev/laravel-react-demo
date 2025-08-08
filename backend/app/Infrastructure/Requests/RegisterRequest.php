<?php

namespace App\Infrastructure\Requests;

use App\Application\User\DTOs\RegisterUserDTO;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function dto(): RegisterUserDTO
    {
        return new RegisterUserDTO(
            first_name: $this->string('first_name')->trim()->toString(),
            last_name: $this->string('last_name')->trim()->toString(),
            email: $this->string('email')->trim()->toString(),
            password: $this->string('password')->trim()->toString(),
        );
    }
}
