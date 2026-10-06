<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_when_opening_edit_page(): void
    {
        $post = Post::factory()->create();

        $this->get(route('posts.edit', $post))->assertRedirect(route('login'));
    }

    public function test_owner_can_open_edit_page(): void
    {
        $post = Post::factory()->for(User::factory())->create();

        $this->actingAs($post->user)
            ->get(route('posts.edit', $post))
            ->assertOk()
            ->assertViewIs('posts.edit');
    }

    public function test_owner_can_update_the_post(): void
    {
        $post = Post::factory()->for(User::factory())->create();

        $this->actingAs($post->user)
            ->put(route('posts.update', $post), [
                'title' => 'Judul Baru',
                'content' => 'Konten Baru',
            ])
            ->assertRedirect(route('posts.index'));

        $this->assertSame('Judul Baru', $post->fresh()->title);
    }

    public function test_non_owner_cannot_update_the_post(): void
    {
        $post = Post::factory()->for(User::factory())->create();
        $otherUser = User::factory()->create();

        $this->actingAs($otherUser)
            ->put(route('posts.update', $post), ['title' => 'Dibajak'])
            ->assertForbidden();

        $this->assertNotSame('Dibajak', $post->fresh()->title);
    }

    public function test_non_owner_cannot_delete_the_post(): void
    {
        $post = Post::factory()->for(User::factory())->create();
        $otherUser = User::factory()->create();

        $this->actingAs($otherUser)
            ->delete(route('posts.destroy', $post))
            ->assertForbidden();

        $this->assertNotNull($post->fresh());
    }

    public function test_owner_can_delete_the_post(): void
    {
        $post = Post::factory()->for(User::factory())->create();

        $this->actingAs($post->user)
            ->delete(route('posts.destroy', $post))
            ->assertRedirect(route('posts.index'));

        $this->assertNull($post->fresh());
    }

    public function test_edit_post_gate_matches_post_policy(): void
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();
        $post = Post::factory()->for($owner)->create();

        $this->assertTrue($owner->can('edit-post', $post));
        $this->assertFalse($otherUser->can('edit-post', $post));
    }

    public function test_guest_sees_no_action_buttons_on_index(): void
    {
        $post = Post::factory()->for(User::factory())->create();

        $this->get(route('posts.index'))
            ->assertOk()
            ->assertSee($post->title)
            ->assertDontSee(route('posts.edit', $post), false);
    }

    public function test_owner_sees_edit_and_delete_buttons_on_index(): void
    {
        $post = Post::factory()->for(User::factory())->create();

        $this->actingAs($post->user)
            ->get(route('posts.index'))
            ->assertOk()
            ->assertSee(route('posts.edit', $post), false);
    }
}
