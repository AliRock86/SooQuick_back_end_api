<?php

namespace App\Http\Controllers;

use App\Action;
use App\Http\Resources\ActionResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActionRequest;
use App\Http\Resources\Collections\ActionCollection;

class ActionControllerAPI extends Controller
{

    public function index()
    {
        $action = Action::all();

        return new ActionCollection($action);

    }

}
