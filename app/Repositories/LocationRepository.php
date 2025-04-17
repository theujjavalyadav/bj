<?php

namespace App\Repositories;

use App\Models\Location;
use Illuminate\Database\QueryException;

class LocationRepository implements LocationRepositoryInterface
{

    public function __construct() {}

    public function getLocations()
    {
        return Location::all();
    }

    public function create(array $data)
    {
        try {
            return Location::create($data);
        } catch (QueryException $e) {
            // Check if the error is due to a foreign key constraint failure
            if ($e->getCode() == '23000') {
                return ['error' => 'Foreign key constraint violation. Please check business ID.'];
            }
            return ['error' => 'An error occurred while adding the location.'];
        }
    }

    function destroyLocation($id)
    {
        return Location::find($id);
    }

    function editLocation($id)
    {
        return Location::find($id);
    }

    function updateLocation($id){
        return Location::find($id);
    }
}
