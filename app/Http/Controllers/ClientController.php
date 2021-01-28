<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use Core\Acace\Client\Infrastructure\Services\CreateClientService;
use Core\Shared\Infrastructure\Bus\Command\LaravelCommandBus;
use Ramsey\Uuid\Uuid;

class ClientController extends Controller
{
    protected $bus;

    public function __construct(LaravelCommandBus $bus)
    {
        $this->bus = $bus;
    }

    public function create(CreateClientRequest $request)
    {
        try {
            $data = array_merge(
                $request->validated(),
                ['id' => $request->filled('id') ? $request->id : Uuid::uuid4()->toString()]
            );

            $createClientService = new CreateClientService($this->bus);
            $createClientService($data);

            return response()->json(['success' => true, 'message' => "Cliente creado con éxito"], 201);
        } catch (\Illuminate\Database\QueryException $error) {
            return response()->json(['success' => false, 'message' => 'Ha sucedido un error al intentar grabar el registro en base de datos'], 500);
        } catch (\Exception $error) {
            return response()->json(['success' => false, 'message' => $error->getMessage()], 501);
        }
    }
}
