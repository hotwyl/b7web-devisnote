<?php

namespace App\Repositorys;

use App\Models\Project;
use App\Models\Assignment;
use App\Models\Note;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ProjectRepository
{

    public function index()
    {
        $projects = Project::with('notes')->with('assignment')->get();

        if ($projects->count() > 0) {
            $this->array['data'] = $projects;
        } else {
            $this->array['data'] = 'error';
            $this->array['message'] = 'Nenhum Projeto encontrado';
        }

        return $this->array;
    }

    public function create()
    {
        dd('create');
    }

    public function store($request)
    {

        if (isset($request)) {

            $project = new Project();
            $project->fill($request);
            $project->save();

            $this->array['data'] = $project;
            $this->array['message'] = 'Projeto Cadastrado com sucesso';
        } else {
            $this->array['data'] = 'error';
            $this->array['message'] = 'Os Dados enviados são Inválidos';
        }

        return $this->array;
    }

    public function show($id)
    {
        $project = Project::with('notes')->with('assignment')->find($id);

        if ($project) {
            $this->array['data'] = $project;
        } else {
            $this->array['data'] = 'error';
            $this->array['message'] = 'Projeto não encontrado';
        }
        return $this->array;
    }

    public function edit($id)
    {
        dd('edit');
    }

    public function update($request, $id)
    {
        if (isset($request) && isset($id)) {

            $project = Project::find($id);

            if ($project) {
                $project->fill($request);
                $project->save();

                $this->array['data'] = $project;
                $this->array['message'] = 'Projeto Atualizado com sucesso';
            } else {
                $this->array['data'] = 'error';
                $this->array['message'] = 'Os Dados enviados não são válidos';
            }
        } else {
            $this->array['data'] = 'error';
            $this->array['message'] = 'Cadastro não efetuada';
        }

        return $this->array;
    }

    public function destroy($id)
    {
        $project = Project::find($id);

        if ($project) {
            $project->delete();
            $this->array['data'] = $project;
            $this->array['message'] = 'Projeto Deletado com sucesso';
        } else {
            $this->array['data'] = 'error';
            $this->array['message'] = 'Projeto não encontrado';
        }

        return $this->array;
    }
}
