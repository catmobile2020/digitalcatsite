<?php

namespace App\Http\Controllers\Api;

use App\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PharmacyController extends Controller
{
    /**
     *
     * @SWG\Get(
     *      tags={"pharmacies"},
     *      path="/pharmacies",
     *      summary="Get my orders Product",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Response(response=200, description="objects"),
     * )
     */
    public function index()
    {

        $pharmacies = Pharmacy::all();
        return response()->json(['result'=>$pharmacies],200);
    }


    /**
     *
     * @SWG\Get(
     *      tags={"pharmacies"},
     *      path="/pharmacies/{pharmacy}",
     *      summary="Get single pharmacy",
     *      security={
     *          {"jwt": {}}
     *      },
     *     @SWG\Parameter(
     *         name="pharmacy",
     *         in="path",
     *         required=true,
     *         type="integer",
     *         format="integer",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param Pharmacy $pharmacy
     * @return \Illuminate\Http\JsonResponse
     */
    public function singlePharmacy(Pharmacy $pharmacy)
    {
        return response()->json(['result'=>$pharmacy],200);
    }
}
