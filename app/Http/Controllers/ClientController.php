<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use Core\Acace\Client\Infrastructure\Services\ClientService;
use Ramsey\Uuid\Uuid;

class ClientController extends Controller
{
    private $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function store(CreateClientRequest $request)
    {
        try {
            $data = array_merge(
                $request->validated(),
                ['id' => $request->filled('id') ? $request->id : Uuid::uuid4()->toString()]
            );

            $this->clientService->create($data);

            return response()->json(['success' => true, 'message' => "Cliente creado con éxito"], 201);
        } catch (\Illuminate\Database\QueryException $error) {
            return response()->json(['success' => false, 'message' => 'Ha sucedido un error al intentar grabar el registro en base de datos'], 500);
        } catch (\Exception $error) {
            return response()->json(['success' => false, 'message' => $error->getMessage()], 501);
        }
    }
}
