<?php

namespace Proprios\Http\Controllers\API;

use Proprios\Http\Requests\API\CreateDistritoAPIRequest;
use Proprios\Http\Requests\API\UpdateDistritoAPIRequest;
use Proprios\Models\Distrito;
use Proprios\Repositories\DistritoRepository;
use Illuminate\Http\Request;
use Proprios\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DistritoController
 * @package Proprios\Http\Controllers\API
 */

class DistritoAPIController extends AppBaseController
{
    /** @var  DistritoRepository */
    private $distritoRepository;

    public function __construct(DistritoRepository $distritoRepo)
    {
        $this->distritoRepository = $distritoRepo;
    }

    /**
     * Display a listing of the Distrito.
     * GET|HEAD /distritos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->distritoRepository->pushCriteria(new RequestCriteria($request));
        $this->distritoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $distritos = $this->distritoRepository->all();

        return $this->sendResponse($distritos->toArray(), 'Distritos retrieved successfully');
    }

    /**
     * Store a newly created Distrito in storage.
     * POST /distritos
     *
     * @param CreateDistritoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDistritoAPIRequest $request)
    {
        $input = $request->all();

        $distritos = $this->distritoRepository->create($input);

        return $this->sendResponse($distritos->toArray(), 'Distrito saved successfully');
    }

    /**
     * Display the specified Distrito.
     * GET|HEAD /distritos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Distrito $distrito */
        $distrito = $this->distritoRepository->findWithoutFail($id);

        if (empty($distrito)) {
            return $this->sendError('Distrito not found');
        }

        return $this->sendResponse($distrito->toArray(), 'Distrito retrieved successfully');
    }

    /**
     * Update the specified Distrito in storage.
     * PUT/PATCH /distritos/{id}
     *
     * @param  int $id
     * @param UpdateDistritoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDistritoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Distrito $distrito */
        $distrito = $this->distritoRepository->findWithoutFail($id);

        if (empty($distrito)) {
            return $this->sendError('Distrito not found');
        }

        $distrito = $this->distritoRepository->update($input, $id);

        return $this->sendResponse($distrito->toArray(), 'Distrito updated successfully');
    }

    /**
     * Remove the specified Distrito from storage.
     * DELETE /distritos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Distrito $distrito */
        $distrito = $this->distritoRepository->findWithoutFail($id);

        if (empty($distrito)) {
            return $this->sendError('Distrito not found');
        }

        $distrito->delete();

        return $this->sendResponse($id, 'Distrito deleted successfully');
    }
}
