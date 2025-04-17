<?php
 
namespace app\Repositories;

interface BusinessRepositoryInterface{

    public function getAll();

    public function getById($id);

    public function editBusiness($id);

    public function updateBusiness($id);

    public function destroyBusiness($id);

}