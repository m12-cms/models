<?php

namespace M12\Models\Tests\Unit;

use M12\Models\Tests\TestCase;
use M12\Models\User;

class UserTest extends TestCase
{
    public function test_it_creates_user()
    {
        $user = User::factory()->create([
            'name' => 'John',
        ]);

        $this->assertEquals('John', $user->name);
        $this->assertNotNull($user->id);
    }
}
