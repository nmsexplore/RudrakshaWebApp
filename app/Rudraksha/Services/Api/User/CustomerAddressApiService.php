<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/29/17
 * Time: 10:56 AM
 */

namespace App\Rudraksha\Services\Api\User;


use App\Rudraksha\Repositories\Api\User\CustomerAddressApiRepository;

class CustomerAddressApiService
{
    /**
     * @var CustomerAddressApiRepository
     */
    private $customerAddressApiRepository;

    /**
     * CustomerAddressApiService constructor.
     * @param CustomerAddressApiRepository $customerAddressApiRepository
     */
    public function __construct(CustomerAddressApiRepository $customerAddressApiRepository)
    {
        $this->customerAddressApiRepository = $customerAddressApiRepository;
    }

    /**
     * @param $customerAddress
     * @return array
     */
    public function serviceCustomerAddressCreate($customerAddress)
    {
        $x=explode(',',$customerAddress['latitude_long']);
        $t['latitude']=$x[0];
        $t['longitude']=trim($x[1]);
        $customerAddress['latitude_long']= $t;

        $details = [
            "customer_id" => $customerAddress['customer_id'],
            "country" => $customerAddress['country'],
            "city" => $customerAddress['city'],
            "state" => $customerAddress['state'],
            "street" => $customerAddress['street'],
            "contact" => $customerAddress['contact'],
            "latitude_long" => $customerAddress['latitude_long'],
        ];

        if ($this->customerAddressApiRepository->repoCustomerAddressCreate($details)) {
            $respo = [
                "status" => "true",
                "message" => "customer address created successfully !!!"
            ];
            return $respo;
        }

        $respo = [
            "status" => "false",
            "message" => "oops !!! something went wrong"
        ];
        return $respo;
    }

    /**
     * @param $id
     * @return array
     */
    public function serviceCustomerAddressShow($id)
    {
        $address = $this->customerAddressApiRepository->repoCustomerAddressShow($id);

        $data = [
            "customer_id" => $address['customer_id'],
            "country" => $address['country'],
            "city" => $address['city'],
            "state" => $address['state'],
            "street" => $address['street'],
            "contact" => $address['contact'],
            "location" => $address['latitude_long'],
        ];

        return $data;
    }

    /**
     * @param $request
     * @param $id
     * @return array
     */
    public function serviceCustomerAddressEdit($request, $id)
    {
        $x=explode(',',$request['latitude_long']);
        $t['latitude']=$x[0];
        $t['longitude']=trim($x[1]);
        $request['latitude_long']= $t;

        if ($this->customerAddressApiRepository->repoCustomerAddressEdit($request, $id)) {
            $respo = [
                "status" => "true",
                "message" => "customer address updated successfully !!!"
            ];
            return $respo;
        }

        $respo = [
            "status" => "false",
            "message" => "oops !!! something went wrong"
        ];

        return $respo;
    }
}