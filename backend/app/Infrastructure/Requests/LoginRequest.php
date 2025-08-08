<?php

namespace App\Infrastructure\Requests;

use DomainException;

use App\Application\User\DTOs\LoginUserDTO;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function dto(): LoginUserDTO
    {
        return new LoginUserDTO(
            email: $this->string('email')->trim()->toString(),
            password: $this->string('password')->trim()->toString()
        );
    }
}
