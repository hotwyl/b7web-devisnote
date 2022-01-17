<?php

namespace App\Services;

use App\Repositorys\ProjectRepository;

class ProjectService {

    public function __construct(ProjectRepository $repository) {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function create()
    {
        return $this->repository->create();
    }

    public function store($request)
    {
        return $this->repository->store($request);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    public function update($request, $id)
    {
        return $this->repository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

}
