<?php

namespace App\Http\Controllers;

use App\Traits\Requests\ResponseTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ResponseTrait;

    

    /**
     * Returns the view based on the stated view path attribute
     * 
     * @author Ian C. Cabrera
     * @param String $path
     * @param Array|null $data
     * @return view
     */
    protected function view(String $path, ?Array $data = null) {
        $path = $this->resolvePath($path);

        return $data ? view($path)->with($data) : view($path);
    }

    /**
     * Resovles the given path based on the stated view path attribute
     * 
     * @author Ian C. Cabrera
     * @param String $path
     * @return String
     */
    protected function resolvePath(String $path) {
        $viewPath = property_exists($this, 'viewPath')
            ? $this->viewPath . '.' : "";

        return $viewPath . $path;
    }

    /**
     * Resovles the given resource to maintain pagination data
     * 
     * @author Ian C. Cabrera
     * @param  mixed $collection
     * @return mixed
     */
    protected function resolveResource($collection, $resource = null) {
        if (method_exists($collection, "withQueryString")) {
            $collection->withQueryString();
        }

        if ($resource) {
            $collection = $resource::collection($collection);
        }

        return $collection->response()->getData();
    }
}
