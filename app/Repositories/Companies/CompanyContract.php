<?php

namespace App\Repositories\Companies;

interface CompanyContract
{
    public function create($request);
    public function edit($id, $request);
    public function findAll();
    public function remove($id);
    public function findById($id);
}