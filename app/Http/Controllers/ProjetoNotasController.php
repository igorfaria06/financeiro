<?php

namespace finLaravel\Http\Controllers;

use Illuminate\Http\Request;
use finLaravel\Http\Controllers\Controller;
use finLaravel\Repositories\ProjetoNotasRepository;
use finLaravel\Services\ProjetoNotasService;

class ProjetoNotasController extends Controller {
    /*
     * @var ClientRepository
     */

    private $repository;

    /*
     * @var ClientService
     */
    private $service;

    public function __construct(ProjetoNotasRepository $repository, ProjetoNotasService $service) {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id) {
        return $this->repository->findWhere(['projeto_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $idNota) {

        return $this->repository->findWhere(['projeto_id'=>$id, 'id'=>$idNota]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $idNota) {
        $this->service->update($request->all(), $idNota);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->repository->delete($id);
    }

}
