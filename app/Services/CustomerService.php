<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function getAllCustomers(): array
    {
        return Customer::all()->toArray();
    }

    public function getCustomerById(int $id): Customer|null
    {
        return Customer::findOrFail($id);
    }

    public function createCustomer(array $data): Customer
    {
        return Customer::create($data);
    }

    public function updateCustomer(int $id, array $data)
    {
        $customer = Customer::findOrFail($id);
        dd($customer);
        $customer->update($data);

        
    }
}