<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Http\Resources\NewBranchResource;
use App\Http\Resources\OrganizationResource;
use App\Http\Resources\OrganizationsBranchesResource;
use App\Http\Resources\SubcategoryResource;
use App\Models\Branch;
use App\Models\Organization;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
  public $model;
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
      $searched_word = $request->query('searched_word');
      $latitude = $request->query('latitude');
      $longitude = $request->query('longitude');

      // $data = Organization::search($searched_word,$latitude, $longitude);
      // dd($data);
      // $data = Subcategory::search($searched_word);
      $data = Branch::search($searched_word,$latitude, $longitude);
      $data=$data->paginate(30)->withQueryString();


      return $this->sendResponse(NewBranchResource::collection($data),'success',['page_count' => $data->lastPage()]);
// old api
      // return $this->sendResponse(OrganizationResource::collection($data->with('subcategories')->get()),'success');
      // return $this->sendResponse(OrganizationsBranchesResource::collection($data->with('subcategories')->get()),'success',);


    }

}
