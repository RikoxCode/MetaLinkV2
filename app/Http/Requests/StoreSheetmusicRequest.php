<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSheetmusicRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['string'],
            'composer' => ['required', 'string'],
            'arranger' => ['required', 'string'],
            'publisher' => ['required', 'string'],
            'style' => ['required', 'string', 'max:255', 'in:Classical,Jazz,Pop,Rock,Marching,Movie Theme,TV Theme,Video Game,Anime,Hip Hop,Rap,Reggae,Blues,World,Traditional,Religious,Other'],
            'grad' => ['integer'],
            'flex' => ['integer'],
            'duration' => ['date_format:H:i:s'],
            'is_digital' => ['boolean'],
            'demo_url' => ['url'],
            'price' => ['required', 'numeric', 'min:0', 'max:9999.99'],
        ];
    }
}
