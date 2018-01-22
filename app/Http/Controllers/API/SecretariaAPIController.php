<?php

namespace Proprios\Http\Controllers\API;

use Proprios\Http\Requests\API\CreateSecretariaAPIRequest;
use Proprios\Http\Requests\API\UpdateSecretariaAPIRequest;
use Proprios\Models\Secretaria;
use Proprios\Repositories\SecretariaRepository;
use Illuminate\Http\Request;
use Proprios\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SecretariaController
 * @package Proprios\Http\Controllers\API
 */

class SecretariaAPIController extends AppBaseController
{
    /** @var  SecretariaRepository */
    private $secretariaRepository;

    public function __construct(SecretariaRepository $secretariaRepo)
    {
        $this->secretariaRepository = $secretariaRepo;
    }

    /**
     * Display a listing of the Secretaria.
     * GET|HEAD /secretarias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->secretariaRepository->pushCriteria(new RequestCriteria($request));
        $this->secretariaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $secretarias = $this->secretariaRepository->all();

        return $this->sendResponse($secretarias->toArray(), 'Secretarias recuperado com sucesso');
    }

    /**
     * Store a newly created Secretaria in storage.
     * POST /secretarias
     *
     * @param CreateSecretariaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSecretariaAPIRequest $request)
    {
        $input = $request->all();

        $secretarias = $this->secretariaRepository->create($input);

        return $this->sendResponse($secretarias->toArray(), 'Secretaria salvo com sucesso');
    }

    /**
     * Display the specified Secretaria.
     * GET|HEAD /secretarias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Secretaria $secretaria */
        $secretaria = $this->secretariaRepository->findWithoutFail($id);

        if (empty($secretaria)) {
            return $this->sendError('Secretaria não encontrado');
        }

        return $this->sendResponse($secretaria->toArray(), 'Secretaria recuperado com sucesso');
    }

    /**
     * Update the specified Secretaria in storage.
     * PUT/PATCH /secretarias/{id}
     *
     * @param  int $id
     * @param UpdateSecretariaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSecretariaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Secretaria $secretaria */
        $secretaria = $this->secretariaRepository->findWithoutFail($id);

        if (empty($secretaria)) {
            return $this->sendError('Secretaria não encontrado');
        }

        $secretaria = $this->secretariaRepository->update($input, $id);

        return $this->sendResponse($secretaria->toArray(), 'Secretaria atualizado com sucesso');
    }

    /**
     * Remove the specified Secretaria from storage.
     * DELETE /secretarias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Secretaria $secretaria */
        $secretaria = $this->secretariaRepository->findWithoutFail($id);

        if (empty($secretaria)) {
            return $this->sendError('Secretaria não encontrado');
        }

        $secretaria->delete();

        return $this->sendResponse($id, 'Secretaria removido com sucesso');
    }
}
