<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Classes\Filter;


class DictionaryController extends Controller
{
    public function __construct()
    {
        $baseController = new BaseController;
        $this->filter = new Filter($baseController);
    }

    public function index()
    {
        return $this->filter->index();
    }

    public function filter(Request $request)
    {
        return $this->filter->filter($request);
    }
}
