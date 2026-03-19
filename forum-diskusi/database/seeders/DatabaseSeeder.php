<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $user = User::factory()->create([
            'username' => 'testuser',
            'email'    => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // ✅ Tambahkan ini
        Profile::create([
            'user_id' => $user->id,
            'name'    => 'Test User',
            'email'   => 'test@example.com',
            'umur'    => 20,
            'gender'  => 'Laki-laki',
            'alamat'  => 'Jakarta',
            'bio'     => 'Ini bio test user',
        ]);
    }
}