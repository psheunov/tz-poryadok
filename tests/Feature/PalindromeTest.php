<?php

namespace Tests\Feature;

use Tests\TestCase;

class PalindromeTest extends TestCase
{
    public function testIsPalindrome()
    {
        $params = ['text' => 'tot'];
        $response = $this->get(route('palindrome', $params));
        $response->assertOk()
            ->assertJson(['result' => true]);
    }

    public function testIsNotPalindrome()
    {
        $params = ['text' => 'tort'];
        $response = $this->get(route('palindrome', $params));
        $response->assertOk()
            ->assertJson(['result' => false]);
    }

    public function testWithoutTextParams()
    {
        $params = ['textt' => 'tort'];
        $response = $this->get(route('palindrome', $params));
        $response->assertStatus(422)
            ->assertJson(["errors" => ["text" => ["The text field is required."]]]);
    }

    public function testIsPalindromeCyrillic()
    {
        $params = ['text' => 'шалаш'];
        $response = $this->get(route('palindrome', $params));
        $response->assertOk()
            ->assertJson(['result' => true]);
    }
}
