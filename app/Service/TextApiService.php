<?php


namespace App\Service;


use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class TextApiService
{
    private const COUNT_START = 1;
    private const DEFAULT_POSITION = 1;

    public static function isPalindrome(string $line): bool
    {
        return (Str::reverse($line) === $line);
    }

    public static function searchSymbolForPosition(string $line, int $position = self::DEFAULT_POSITION): int|string
    {
        $result = [];
        foreach (str_split($line) as $symbol) {
            $result[$symbol] = isset($result[$symbol]) ? ++$result[$symbol] : self::COUNT_START;
        }

        arsort($result);
        $result = array_keys($result);

        if (!isset($result[$position])) {
            throw new HttpResponseException(
                response()->json([
                    'errors' => sprintf('The number of unique characters is less than %s', $position + 1)
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            );
        }

        return $result[$position];
    }
}
