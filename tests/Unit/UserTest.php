<?php

namespace M12\Models\Tests\Unit;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\NewAccessToken;
use M12\Models\Tests\TestCase;
use M12\Models\User;

class UserTest extends TestCase
{
    public function test_it_creates_user_via_factory(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
        ]);

        $this->assertEquals('John Doe', $user->name);
        $this->assertNotNull($user->id);
    }

    public function test_password_is_hashed(): void
    {
        $user = User::factory()->create([
            'password' => 'secret123',
        ]);

        $this->assertTrue(Hash::check('secret123', $user->password));
    }

    public function test_email_verified_at_is_cast_to_carbon(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $this->assertInstanceOf(Carbon::class, $user->email_verified_at);
    }

    public function test_soft_deletes(): void
    {
        $user = User::factory()->create();
        $user->delete();

        $this->assertSoftDeleted('users', ['id' => $user->id]);

        $user->restore();

        $this->assertFalse($user->trashed());
    }

    public function test_mass_assignment_fillable(): void
    {
        $user = User::create([
            'name' => 'Valid Name',
            'email' => 'email@example.com',
            'password' => 'secret123',
        ]);

        $this->assertEquals('Valid Name', $user->name);
    }

    public function test_user_can_generate_api_token(): void
    {
        $user = User::factory()->create();

        $token = $user->createToken('test-token');

        $this->assertInstanceOf(NewAccessToken::class, $token);
        $this->assertNotEmpty($token->plainTextToken);
    }
}
