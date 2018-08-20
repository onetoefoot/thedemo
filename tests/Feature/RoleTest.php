<?php

namespace Tests\Feature;

use Tests\TestCase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Role;
use App\Models\User;
use Hyn\Tenancy\Environment;
use Tests\TenantAwareTestCase;

class RoleTest extends TenantAwareTestCase
{
    var $role;

    public function setup(): void
    {
        parent::setup();
    }

    public function testHasAdmin(): void
    {
        $this->artisan('tenant:create', ['name' => 'example', 'email' => 'test@example.com', 'password' => 'password']);
        $this->assertDatabaseHas('roles', [
            'name' => 'admin'
        ]);
        $this->assertDatabaseHas('roles', [
            'name' => 'user'
        ]);
    }

    public function testCreateRole(): void
    {
        $this->artisan('tenant:create', ['name' => 'example', 'email' => 'test@example.com', 'password' => 'password']);
        $role = Role::create(array('name' => 'roleTest'));
        $this->assertDatabaseHas('roles', [
            'name' => 'roleTest'
        ]);
    }
}
