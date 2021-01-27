<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use Core\Acace\Client\Domain\Contracts\ClientRepositoryContract;
use Core\Acace\Client\Infrastructure\Controllers\CreateClientController;

class ClientController extends Controller
{
    private $clientRepository;

    public function __construct(ClientRepositoryContract $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function create(CreateClientRequest $request)
    {
        try {
            $createClientController = new CreateClientController($this->clientRepository);
            $createClientController($request->validated());

            return response()->json(['success' => true, 'message' => "Cliente creado con éxito"], 201);
        } catch (\Illuminate\Database\QueryException $error) {
            return response()->json(['success' => false, 'message' => 'Ha sucedido un error al intentar grabar el registro en base de datos'], 500);
        } catch (\Exception $error) {
            return response()->json(['success' => false, 'message' => $error->getMessage()], 501);
        }
    }
}
