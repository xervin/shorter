<?php

namespace App\Http\Requests;

use App\Helpers\Url;
use App\Models\Link;
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
            'link' => 'required|url|active_url|max:2048',
            'custom-name' => 'nullable|unique:' . Link::class . ',token|max:16'
        ];
    }

    /**
     * @param $key
     * @param $default
     * @return mixed
     */
    public function validated($key = null, $default = null)
    {
        if ($this->has('link')) {
            $this['link'] = rtrim($this['link'], '/');
        }

        $validated = parent::validated($key, $default);
        $validated['link'] = Url::trimSlashes($validated['link']);
        $validated['custom-name'] = $validated['custom-name'] ?? null;

        return $validated;
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'link.required' => 'Пустая ссылка',
            'link.url' => 'Ссылка должна быть в формате https://example.com',
            'link.active_url' => 'Невалидный URL',
            'link.max' => 'Длина ссылки не должна превышать 2048 символов',
            'custom-name.unique' => 'Такое короткое имя уже существует. Придумайте другое.',
            'custom-name.max' => 'Длина короткого имени не должна превышать 16 символов',
        ];
    }
}
