<?php

namespace Tests\Feature;

use App\Models\Business;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BusinessControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_cannot_access_methods_for_other_businesses()
    {
        $user = User::factory()->create();
        $business = Business::factory()->create();

        // Test show method
        $this->actingAs($user)
            ->get(route('dashboard.business.show', $business))
            ->assertStatus(403); // Forbidden

        // Test edit method
        $this->actingAs($user)
            ->get(route('dashboard.business.edit', $business))
            ->assertStatus(403); // Forbidden

        // Test update method
        $this->actingAs($user)
            ->put(route('dashboard.business.update', $business), [])
            ->assertStatus(403); // Forbidden

        // Test delete method
        $this->actingAs($user)
            ->delete(route('dashboard.business.destroy', $business))
            ->assertStatus(403); // Forbidden
    }
}
