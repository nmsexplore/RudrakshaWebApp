<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 11/30/16
 * Time: 1:49 AM
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
{
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
        switch ($this->method()) {
            case 'POST': {

                return [
                    'code' => 'required|unique:currencies|max:20|min:2',
                    'representation' => 'required|unique:currencies|max:10',
                    'currency' => 'required|unique:currencies|max:20',
                ];


            }

            case 'PUT': {

                return [
                    'code' => 'required|max:20|min:2|unique:currencies,code,'. $this->get('id'),
                    'representation' => 'required|max:10|unique:currencies,representation,'. $this->get('id'),
                    'currency' => 'required|max:20|unique:currencies,currency,'. $this->get('id'),
                ];
            }

            default:
                break;
        }













    }

}