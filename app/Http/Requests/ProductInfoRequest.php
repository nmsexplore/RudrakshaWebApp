<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 11/30/16
 * Time: 1:49 AM
 */

namespace App\Http\Requests;


use App\Rudraksha\Entities\ProductInfo;
use Illuminate\Foundation\Http\FormRequest;

class ProductInfoRequest extends FormRequest
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
                    'category_id' => 'required',
                    'code' => 'required|unique:product_infos',
                    'name' => 'required|unique:product_infos|max:255|min:3',
                    'status' => 'required|boolean',
                    'rank' => 'required|numeric|unique:product_infos',
                    'tag' => 'required|string',
                    'discount' => 'numeric|max:100|min:0',
                    'quantity_available' => 'required|numeric',

                ];
            }

            case 'PUT': {
                return [

                    'category_id' => 'required',
                    'name' => 'required|max:255|min:3|unique:product_infos,name,' . $this->get('id'),
                    'code' => 'required|unique:product_infos,code,' . $this->get('id'),
                    'status' => 'required|boolean',
                    'rank' => 'required|numeric|unique:product_infos,rank,'.$this->get('id'),
                    'tag' => 'required|string',
                    'discount' => 'numeric|max:100|min:0',
                    'quantity_available' => 'required|numeric',

                ];
            }

            default:
                break;
        }
    }
    }









