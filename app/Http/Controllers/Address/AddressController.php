<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Http\Resources\Address\AddressResource;
use App\Models\Address\Address;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Address::class);

        return AddressResource::collection(Address::all());
    }

    public function store(Request $request)
    {
        $this->authorize('create', Address::class);

        $data = $request->validate([
            'street' => ['required'],
            'city_id' => ['required', 'integer'],
            'state_id' => ['required', 'integer'],
            'country_id' => ['required', 'integer'],
            'addressable_id' => ['required'],
            'addressable_type' => ['required'],
        ]);

        return new AddressResource(Address::create($data));
    }

    public function show(Address $address)
    {
        $this->authorize('view', $address);

        return new AddressResource($address);
    }

    public function update(Request $request, Address $address)
    {
        $this->authorize('update', $address);

        $data = $request->validate([
            'street' => ['required'],
            'city_id' => ['required', 'integer'],
            'state_id' => ['required', 'integer'],
            'country_id' => ['required', 'integer'],
            'addressable_id' => ['required'],
            'addressable_type' => ['required'],
        ]);

        $address->update($data);

        return new AddressResource($address);
    }

    public function destroy(Address $address)
    {
        $this->authorize('delete', $address);

        $address->delete();

        return response()->json();
    }
}
