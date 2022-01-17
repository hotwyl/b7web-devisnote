<?php

namespace App\Http\Controllers;

use App\Services\NoteService;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __construct(NoteService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function create()
    {
        return $this->service->create();
    }

    public function store(Request $request)
    {
        return $this->service->store($request->all());
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function edit($id)
    {
        return $this->service->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(),$id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
