<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
        return [
            "product" => "required|string|max:20",
            "price" => "required|numeric",
            "brand" => "required|string|max:20",
            "description" =>"required|string|max:100",
            
        ];
    }

    public function messages()
    {
        return [
            "product.required"=>"Inserire nome prodotto",
            "price.required"=>"Inserire prezzo",
            "brand.required"=>"Inserire brand",
            "description.required"=>"Inserire descrizione",
            "product.max"=>"Inserire nome prodotto di massimo 20 caretteri",
            "price.numeric"=>"Inserire prezzo con solo numeri",
            "brand.max"=>"Inserire brand massimo 20 caretteri",
            "description.max"=>"La descrizione puo' contenere al massimo 100 caratteri",

        ];
    }
}
