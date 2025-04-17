<?php

namespace App\Repositories;

 interface LocationRepositoryInterface{

    public function getLocations();
    public function create(array $data);
    function destroyLocation($id);
    function editLocation($id);
    function updateLocation($id);
 }