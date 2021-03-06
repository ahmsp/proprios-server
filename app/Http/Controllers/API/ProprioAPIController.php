<?php

namespace Proprios\Http\Controllers\API;

use Proprios\Http\Requests\API\CreateProprioAPIRequest;
use Proprios\Http\Requests\API\UpdateProprioAPIRequest;
use Proprios\Models\Proprio;
use Proprios\Repositories\ProprioRepository;
use Illuminate\Http\Request;
use Proprios\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProprioController
 * @package Proprios\Http\Controllers\API
 */

class ProprioAPIController extends AppBaseController
{
    /** @var  ProprioRepository */
    private $proprioRepository;

    public function __construct(ProprioRepository $proprioRepo)
    {
        $this->proprioRepository = $proprioRepo;
    }

    /**
     * Display a listing of the Proprio.
     * GET|HEAD /proprios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->proprioRepository->pushCriteria(new RequestCriteria($request));
        $this->proprioRepository->pushCriteria(new LimitOffsetCriteria($request));
        $proprios = $this->proprioRepository->all();

        return $this->sendResponse($proprios->toArray(), 'Proprios retrieved successfully');
    }

    /**
     * Store a newly created Proprio in storage.
     * POST /proprios
     *
     * @param CreateProprioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProprioAPIRequest $request)
    {
        $input = $request->all();

        $proprios = $this->proprioRepository->create($input);

        return $this->sendResponse($proprios->toArray(), 'Proprio saved successfully');
    }

    /**
     * Display the specified Proprio.
     * GET|HEAD /proprios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Proprio $proprio */
        $proprio = $this->proprioRepository->findWithoutFail($id);

        if (empty($proprio)) {
            return $this->sendError('Proprio not found');
        }

        return $this->sendResponse($proprio->toArray(), 'Proprio retrieved successfully');
    }

    /**
     * Update the specified Proprio in storage.
     * PUT/PATCH /proprios/{id}
     *
     * @param  int $id
     * @param UpdateProprioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProprioAPIRequest $request)
    {
        $input = $request->all();

        /** @var Proprio $proprio */
        $proprio = $this->proprioRepository->findWithoutFail($id);

        if (empty($proprio)) {
            return $this->sendError('Proprio not found');
        }

        $proprio = $this->proprioRepository->update($input, $id);

        return $this->sendResponse($proprio->toArray(), 'Proprio updated successfully');
    }

    /**
     * Remove the specified Proprio from storage.
     * DELETE /proprios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Proprio $proprio */
        $proprio = $this->proprioRepository->findWithoutFail($id);

        if (empty($proprio)) {
            return $this->sendError('Proprio not found');
        }

        $proprio->delete();

        return $this->sendResponse($id, 'Proprio deleted successfully');
    }
}
