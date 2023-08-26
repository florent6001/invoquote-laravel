<?php

namespace Tests\Feature;

use App\Models\Business;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_cannot_access_methods_for_other_customers()
    {
        $user = User::factory()->create();
        $business = Business::factory()->create();
        $this->actingAs($user);

        $customer = Customer::factory()->create(['business_id' => $business->id]);

        // Test show method
        $this->get(route('dashboard.customer.show', $customer))
            ->assertStatus(403); // Forbidden

        // Test edit method
        $this->get(route('dashboard.customer.edit', $customer))
            ->assertStatus(403); // Forbidden

        // Test update method
        $this->put(route('dashboard.customer.update', $customer), [])
            ->assertStatus(403); // Forbidden

        // Test delete method
        $this->delete(route('dashboard.customer.destroy', $customer))
            ->assertStatus(403); // Forbidden
    }
}
