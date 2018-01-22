<?php

namespace Proprios\Http\Controllers\API;

use Proprios\Http\Requests\API\CreateTipoAPIRequest;
use Proprios\Http\Requests\API\UpdateTipoAPIRequest;
use Proprios\Models\Tipo;
use Proprios\Repositories\TipoRepository;
use Illuminate\Http\Request;
use Proprios\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TipoController
 * @package Proprios\Http\Controllers\API
 */

class TipoAPIController extends AppBaseController
{
    /** @var  TipoRepository */
    private $tipoRepository;

    public function __construct(TipoRepository $tipoRepo)
    {
        $this->tipoRepository = $tipoRepo;
    }

    /**
     * Display a listing of the Tipo.
     * GET|HEAD /tipos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoRepository->pushCriteria(new RequestCriteria($request));
        $this->tipoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tipos = $this->tipoRepository->all();

        return $this->sendResponse($tipos->toArray(), 'Tipos recuperado com sucesso');
    }

    /**
     * Store a newly created Tipo in storage.
     * POST /tipos
     *
     * @param CreateTipoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoAPIRequest $request)
    {
        $input = $request->all();

        $tipos = $this->tipoRepository->create($input);

        return $this->sendResponse($tipos->toArray(), 'Tipo salvo com sucesso');
    }

    /**
     * Display the specified Tipo.
     * GET|HEAD /tipos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tipo $tipo */
        $tipo = $this->tipoRepository->findWithoutFail($id);

        if (empty($tipo)) {
            return $this->sendError('Tipo não encontrado');
        }

        return $this->sendResponse($tipo->toArray(), 'Tipo recuperado com sucesso');
    }

    /**
     * Update the specified Tipo in storage.
     * PUT/PATCH /tipos/{id}
     *
     * @param  int $id
     * @param UpdateTipoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tipo $tipo */
        $tipo = $this->tipoRepository->findWithoutFail($id);

        if (empty($tipo)) {
            return $this->sendError('Tipo não encontrado');
        }

        $tipo = $this->tipoRepository->update($input, $id);

        return $this->sendResponse($tipo->toArray(), 'Tipo atualizado com sucesso');
    }

    /**
     * Remove the specified Tipo from storage.
     * DELETE /tipos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tipo $tipo */
        $tipo = $this->tipoRepository->findWithoutFail($id);

        if (empty($tipo)) {
            return $this->sendError('Tipo não encontrado');
        }

        $tipo->delete();

        return $this->sendResponse($id, 'Tipo removido com sucesso');
    }
}
