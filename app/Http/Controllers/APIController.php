<?php

namespace App\Http\Controllers;

use App\Classes\CarFeeFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class APIController extends Controller
{
    /**
     * API endpoint to calculate the total cost of a car and associated fees.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function calculate(Request $request): JsonResponse
    {
        // Validate the input parameters
       $request->validate([
            'type' => 'required|string|in:common,luxury',
            'basePrice' => 'required|numeric|min:1',
        ]);

        $carFee = CarFeeFactory::createCarFee($request->query('type'));
        return  response()->json($carFee->calculateTotalCost($request->query('basePrice')));
    }
}
