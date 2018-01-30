<?php

namespace Proprios\Http\Controllers\API;

use Proprios\Http\Requests\API\CreateSubprefeituraAPIRequest;
use Proprios\Http\Requests\API\UpdateSubprefeituraAPIRequest;
use Proprios\Models\Subprefeitura;
use Proprios\Repositories\SubprefeituraRepository;
use Illuminate\Http\Request;
use Proprios\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SubprefeituraController
 * @package Proprios\Http\Controllers\API
 */

class SubprefeituraAPIController extends AppBaseController
{
    /** @var  SubprefeituraRepository */
    private $subprefeituraRepository;

    public function __construct(SubprefeituraRepository $subprefeituraRepo)
    {
        $this->subprefeituraRepository = $subprefeituraRepo;
    }

    /**
     * Display a listing of the Subprefeitura.
     * GET|HEAD /subprefeituras
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subprefeituraRepository->pushCriteria(new RequestCriteria($request));
        $this->subprefeituraRepository->pushCriteria(new LimitOffsetCriteria($request));
        $subprefeituras = $this->subprefeituraRepository->all();

        return $this->sendResponse($subprefeituras->toArray(), 'Subprefeituras retrieved successfully');
    }

    /**
     * Store a newly created Subprefeitura in storage.
     * POST /subprefeituras
     *
     * @param CreateSubprefeituraAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSubprefeituraAPIRequest $request)
    {
        $input = $request->all();

        $subprefeituras = $this->subprefeituraRepository->create($input);

        return $this->sendResponse($subprefeituras->toArray(), 'Subprefeitura saved successfully');
    }

    /**
     * Display the specified Subprefeitura.
     * GET|HEAD /subprefeituras/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Subprefeitura $subprefeitura */
        $subprefeitura = $this->subprefeituraRepository->findWithoutFail($id);

        if (empty($subprefeitura)) {
            return $this->sendError('Subprefeitura not found');
        }

        return $this->sendResponse($subprefeitura->toArray(), 'Subprefeitura retrieved successfully');
    }

    /**
     * Update the specified Subprefeitura in storage.
     * PUT/PATCH /subprefeituras/{id}
     *
     * @param  int $id
     * @param UpdateSubprefeituraAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubprefeituraAPIRequest $request)
    {
        $input = $request->all();

        /** @var Subprefeitura $subprefeitura */
        $subprefeitura = $this->subprefeituraRepository->findWithoutFail($id);

        if (empty($subprefeitura)) {
            return $this->sendError('Subprefeitura not found');
        }

        $subprefeitura = $this->subprefeituraRepository->update($input, $id);

        return $this->sendResponse($subprefeitura->toArray(), 'Subprefeitura updated successfully');
    }

    /**
     * Remove the specified Subprefeitura from storage.
     * DELETE /subprefeituras/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Subprefeitura $subprefeitura */
        $subprefeitura = $this->subprefeituraRepository->findWithoutFail($id);

        if (empty($subprefeitura)) {
            return $this->sendError('Subprefeitura not found');
        }

        $subprefeitura->delete();

        return $this->sendResponse($id, 'Subprefeitura deleted successfully');
    }
}
