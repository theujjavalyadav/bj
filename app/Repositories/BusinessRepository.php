<?php

namespace App\Repositories;

use App\Models\Business;


class BusinessRepository implements BusinessRepositoryInterface
{
    public function getAll()
    {
        return Business::with('location')->paginate(5);
    }
    // show perticuler business
    public function getById($id)
    {
        return Business::where('id', $id)->with(['location' => function ($query) {
            $query->select('id', 'business_id', 'city');
        }])->first();
    }
    //edit business
    public function editBusiness($id)
    {
        return Business::where('id', $id)->with('location')->first();
    }
    //update business
    public function updateBusiness($id)
    {

        return Business::find($id);
    }
    //destroy business
    public function destroyBusiness($id)
    {
        return Business::find($id);
    }
}
