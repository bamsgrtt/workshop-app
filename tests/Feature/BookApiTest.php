<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class BookApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_books_can_be_created_listed_updated_and_deleted(): void
    {
        $bookData = [
            'title' => 'Laravel API',
            'description' => null,
            'status' => 1,
        ];

        $this->postJson('/api/books', $bookData)
            ->assertCreated()
            ->assertJsonFragment($bookData);

        $book = Book::query()->firstOrFail();

        $this->getJson('/api/books')
            ->assertOk()
            ->assertJsonFragment(['id' => $book->id, 'title' => 'Laravel API']);

        $this->patchJson("/api/books/{$book->id}", ['title' => 'Sanctum API'])
            ->assertOk()
            ->assertJsonFragment(['title' => 'Sanctum API']);

        $this->deleteJson("/api/books/{$book->id}")
            ->assertOk()
            ->assertJson(['message' => 'Book deleted']);

        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }

    public function test_book_updates_validate_only_supported_fields(): void
    {
        $book = Book::query()->create(['title' => 'Original']);

        $this->patchJson("/api/books/{$book->id}", ['status' => -1])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('status');

        $this->assertSame('Original', $book->fresh()->title);
    }

    public function test_users_can_log_in_and_log_out_with_a_sanctum_token(): void
    {
        $user = User::factory()->create();

        $loginResponse = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ])->assertOk()
            ->assertJsonStructure(['access_token', 'token_type']);

        $token = $loginResponse->json('access_token');

        $this->withToken($token)
            ->getJson('/api/user')
            ->assertOk()
            ->assertJsonPath('id', $user->id);

        $this->withToken($token)
            ->postJson('/api/logout')
            ->assertOk()
            ->assertJson(['message' => 'Logged out']);

        $this->assertDatabaseCount('personal_access_tokens', 0);
        Auth::forgetGuards();

        $this->withToken($token)
            ->getJson('/api/user')
            ->assertUnauthorized();
    }
}
