<?php

namespace Proprios\Http\Controllers\API;

use Proprios\Http\Requests\API\CreateLegislacaoTipoAPIRequest;
use Proprios\Http\Requests\API\UpdateLegislacaoTipoAPIRequest;
use Proprios\Models\LegislacaoTipo;
use Proprios\Repositories\LegislacaoTipoRepository;
use Illuminate\Http\Request;
use Proprios\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LegislacaoTipoController
 * @package Proprios\Http\Controllers\API
 */

class LegislacaoTipoAPIController extends AppBaseController
{
    /** @var  LegislacaoTipoRepository */
    private $legislacaoTipoRepository;

    public function __construct(LegislacaoTipoRepository $legislacaoTipoRepo)
    {
        $this->legislacaoTipoRepository = $legislacaoTipoRepo;
    }

    /**
     * Display a listing of the LegislacaoTipo.
     * GET|HEAD /legislacaoTipos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->legislacaoTipoRepository->pushCriteria(new RequestCriteria($request));
        $this->legislacaoTipoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $legislacaoTipos = $this->legislacaoTipoRepository->all();

        return $this->sendResponse($legislacaoTipos->toArray(), 'Legislacao Tipos retrieved successfully');
    }

    /**
     * Store a newly created LegislacaoTipo in storage.
     * POST /legislacaoTipos
     *
     * @param CreateLegislacaoTipoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLegislacaoTipoAPIRequest $request)
    {
        $input = $request->all();

        $legislacaoTipos = $this->legislacaoTipoRepository->create($input);

        return $this->sendResponse($legislacaoTipos->toArray(), 'Legislacao Tipo saved successfully');
    }

    /**
     * Display the specified LegislacaoTipo.
     * GET|HEAD /legislacaoTipos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LegislacaoTipo $legislacaoTipo */
        $legislacaoTipo = $this->legislacaoTipoRepository->findWithoutFail($id);

        if (empty($legislacaoTipo)) {
            return $this->sendError('Legislacao Tipo not found');
        }

        return $this->sendResponse($legislacaoTipo->toArray(), 'Legislacao Tipo retrieved successfully');
    }

    /**
     * Update the specified LegislacaoTipo in storage.
     * PUT/PATCH /legislacaoTipos/{id}
     *
     * @param  int $id
     * @param UpdateLegislacaoTipoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLegislacaoTipoAPIRequest $request)
    {
        $input = $request->all();

        /** @var LegislacaoTipo $legislacaoTipo */
        $legislacaoTipo = $this->legislacaoTipoRepository->findWithoutFail($id);

        if (empty($legislacaoTipo)) {
            return $this->sendError('Legislacao Tipo not found');
        }

        $legislacaoTipo = $this->legislacaoTipoRepository->update($input, $id);

        return $this->sendResponse($legislacaoTipo->toArray(), 'LegislacaoTipo updated successfully');
    }

    /**
     * Remove the specified LegislacaoTipo from storage.
     * DELETE /legislacaoTipos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LegislacaoTipo $legislacaoTipo */
        $legislacaoTipo = $this->legislacaoTipoRepository->findWithoutFail($id);

        if (empty($legislacaoTipo)) {
            return $this->sendError('Legislacao Tipo not found');
        }

        $legislacaoTipo->delete();

        return $this->sendResponse($id, 'Legislacao Tipo deleted successfully');
    }
}
