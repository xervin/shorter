<?php

namespace App\Http\Requests;

use App\Helpers\Url;
use Illuminate\Foundation\Http\FormRequest;

class LinkSetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'link' => 'required|url|max:2048',
        ];
    }

    public function validated($key = null, $default = null)
    {
        if ($this->has('link')) {
            $this['link'] = rtrim($this['link'], '/');
        }

        $validated = parent::validated($key, $default);
        $validated['link'] = Url::trimSlashes($validated['link']);

        return $validated;
    }
}
