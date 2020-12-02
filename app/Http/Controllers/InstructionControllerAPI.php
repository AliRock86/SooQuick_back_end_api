<?php

namespace App\Http\Controllers;

use App\Instruction;
use App\Http\Resources\InstructionResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstructionRequest;
use App\Http\Resources\Collections\InstructionCollection;

class InstructionControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\Collections\InstructionCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Instruction::class);

        $instruction = Instruction::all();

        return new InstructionCollection($instruction);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\InstructionRequest  $request
     * @return \App\Http\Resources\InstructionResource
     */
    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $instruction= new DeliveryCompany;
        $instruction->user_id = $user->id;
        $instruction->delivery_comp_barnd_name = $request->delivery_comp_barnd_name;
        $instruction->delivery_comp_email = ($request->delivery_comp_email) ? $request->delivery_comp_email : 'null';
        $instruction->delivery_comp_phone = $request->delivery_comp_phone;
        $instruction->delivery_comp_description =($request->delivery_comp_description) ? $request->delivery_comp_description : 'null';
        $instruction->status_id = 1;
        $instruction->save();
        return response()->json([
            'success' => true,
            'data' => 'done',
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instruction  $instruction
     * @return \App\Http\Resources\InstructionResource
     */
    public function show(Instruction $instruction)
    {
        $this->authorize('view', $instruction);

        return new InstructionResource($instruction);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\InstructionRequest  $request
     * @param  \App\Instruction  $instruction
     * @return \App\Http\Resources\InstructionResource
     */
    public function update(InstructionRequest $request, Instruction $instruction)
    {
        $this->authorize('update', $instruction);

        $instruction->update($request->validated());

        return new InstructionResource($instruction);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instruction  $instruction
     * @return \App\Http\Resources\InstructionResource
     */
    public function destroy(Instruction $instruction)
    {
        $this->authorize('delete', $instruction);

        $instruction->delete();

        return new InstructionResource($instruction);

    }
}
