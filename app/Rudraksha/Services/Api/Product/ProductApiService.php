<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/16/17
 * Time: 2:40 PM
 */

namespace App\Rudraksha\Services\Api\Product;


use App\Rudraksha\Entities\ProductImage;
use App\Rudraksha\Repositories\Api\Category\CategoryApiRepository;
use App\Rudraksha\Repositories\Api\Product\ProductApiRepository;

class ProductApiService
{
    /**
     * @var ProductApiRepository
     */
    private $productApiRepository;
    /**
     * @var CategoryApiRepository
     */
    private $categoryApiRepository;
    /**
     * @var ProductImage
     */
    private $productImage;

    /**
     * ProductApiService constructor.
     * @param ProductApiRepository $productApiRepository
     * @param CategoryApiRepository $categoryApiRepository
     * @param ProductImage $productImage
     */
    public function __construct(ProductApiRepository $productApiRepository,
                                CategoryApiRepository $categoryApiRepository,
                                ProductImage $productImage)
    {
        $this->productApiRepository = $productApiRepository;
        $this->categoryApiRepository = $categoryApiRepository;
        $this->productImage = $productImage;
    }

    /**
     * @param $name
     * @return array
     */
    public function getProducts($name)
    {
        $baseUrl = url('/');

        $categoryData = $this->categoryApiRepository->getCategoryId($name);

        $productDetail = [];

        $i = 0;

        foreach ($categoryData as $category) {

           $productDetail[$i]['category']=$category->name;
           $productDetail[$i]['category_id']=$category->id;

           $products = $this->productApiRepository->getCategoryProduct($category->id);

            foreach ($products as $product) {

                $image = $this->productApiRepository->getProductImage($product->id);

                $productDetail[$i]['products'][]=[
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'discount' => $product->discount,
                    'image' => $baseUrl.'/storage/product/'.$image->name[0]
                ];
            }

            $i++;
        }

        return $productDetail;
    }

    /**
     * @param $id
     * @return array
     */
    public function getAllProductDetails($id)
    {
        $baseUrl = url('/');

        $productInfo = $this->productApiRepository->getProductInfo($id);

        if ($productInfo==null) {

            $query = [
                "status" => "false",
                "message" => "product not found"
            ];

            return $query;
        }

        $productImage = $this->productApiRepository->getProductImage($id);
        $categoryBenefit = $this->productApiRepository->categoryBenefit($productInfo->category_id);
        $productDescription = $this->productApiRepository->getProductDescription($id);

        $benefit = [];

        foreach ($categoryBenefit as $category) {
            $benefit[]= [
                'benefit_heading' => $category->benefit_heading,
                'benefit' => $category->benefit,
            ];
        }

        $allImage = [];

        foreach ($productImage->name as $name) {
            $imageUrl = $baseUrl.'/storage/product/'.$name;
            array_push($allImage, $imageUrl);
        }

        $productDetails = [

            'product_info' => [
                'name' => $productInfo->name,
                'code' => $productInfo->code,
                'price' => $productInfo->price,
                'rank' => $productInfo->rank,
                'tag' => $productInfo->tag,
                'discount' => $productInfo->discount,
                'quantity_available' => $productInfo->quantity_available,
                'mantra' => $productInfo->mantra,
            ],

            'product_description' => [
                'description' => $productDescription->description,
                'information' => $productDescription->information,
            ],

            'category_benefit' => $benefit,

            'products_image' => [
                'image' => $allImage
            ]
        ];

        return $productDetails;
    }
}