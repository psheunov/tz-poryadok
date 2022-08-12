<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchSecondSymbolTest extends TestCase
{
    public function testSearchSecondSymbol()
    {
        $params = ['text' => 'tttaaaassss'];
        $response = $this->get(route('search-symbol', $params));
        $response->assertOk()
            ->assertJson(['result' => 's']);
    }

    public function testSearchSecondSymbolEmptyParams()
    {
        $params = [];
        $response = $this->get(route('search-symbol', $params));
        $response->assertStatus(422)
            ->assertJson(["errors" => ["text" => ["The text field is required."]]]);
    }

    public function testSearchSecondSymbolError()
    {
        $params = ['text' => 'ttt'];
        $response = $this->get(route('search-symbol', $params));
        $response->assertStatus(422)
            ->assertJson(["errors" => "The number of unique characters is less than 2"]);
    }
}
