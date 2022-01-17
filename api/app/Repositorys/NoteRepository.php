<?php

namespace App\Repositorys;

use App\Models\Project;
use App\Models\Note;
use App\Models\Assignment;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class NoteRepository
{

    public function index()
    {
        $note = Note::all();

        if ($note->count() > 0) {
            $this->array['data'] = $note;
        } else {
            $this->array['data'] = 'error';
            $this->array['message'] = 'Nenhum Nota encontrada';
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

            $id = $request['id_project'];
            $Project = Project::where('id', $id)->get();

            if ($Project->count() > 0) {
                $note = new Note();
                $note->fill($request);
                $note->save();
                $this->array['data'] = $note;
                $this->array['message'] = 'Nota Cadastrada com sucesso';
            } else {
                $this->array['data'] = 'error';
                $this->array['message'] = 'Não Localizado projeto correspondente';
            }
        } else {
            $this->array['data'] = 'error';
            $this->array['message'] = 'Os Dados enviados são Inválidos';
        }

        return $this->array;
    }

    public function show($id)
    {
        $note = Note::find($id);
        if ($note) {
            $this->array['data'] = $note;
        } else {
            $this->array['data'] = 'error';
            $this->array['message'] = 'Nota não encontrada';
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

            $idproject = $request['id_project'];
            $Project = Project::where('id', $idproject)->get();
            $note = Note::find($id);

            if ($note && $Project->count() > 0) {
                $note->fill($request);
                $note->save();

                $this->array['data'] = $note;
                $this->array['message'] = 'Nota Atualizada com sucesso';
            } else {
                $this->array['data'] = 'error';
                $this->array['message'] = 'Os Dados enviados não são válidos';
            }
        } else {
            $this->array['data'] = 'error';
            $this->array['message'] =  'Cadastro da Nota não efetuado';
        }

        return $this->array;
    }

    public function destroy($id)
    {
        $note = Note::find($id);

        if ($note) {
            $note->delete();
            $this->array['data'] = $note;
            $this->array['message'] = 'Nota Deletada com sucesso';
        } else {
            $this->array['data'] = 'error';
            $this->array['message'] = 'Nota não encontrada';
        }

        return $this->array;
    }
}
