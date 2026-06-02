<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class mouvementRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|string|in:entree,sortie',
            'quantite' => 'required|numeric|min:1',
            'produit_id' => 'required|exists:produits,id',
            'user_id' => 'required|exists:users,id',
            'date_mouvement' => now()
        ];
    }
}
