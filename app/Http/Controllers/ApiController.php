<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiRequest;
use App\Service\TextApiService;
use Illuminate\Http\JsonResponse;


class ApiController extends Controller
{
    function searchSecondSymbol(ApiRequest $request): JsonResponse
    {
        $request->validated();

        return response()->json(['result' => TextApiService::searchSymbolForPosition($request->get('text'))]);
    }

    function palindrome(ApiRequest $request): JsonResponse
    {
        $request->validated();

        return response()->json(['result' => TextApiService::isPalindrome($request->get('text'))]);
    }
}
