<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    User,
    Contact
};

class UserSeeder extends Seeder
{
    /**
     * @return Void
     * Run the database seeds.
     */
    public function run(): void
    {
        User::created([
            'name'=>'test',
            'email'=>'test@gmail.com',
            'password'=>bcrypt('test')
        ]);

        Contact::create([
            'user_id'=>'1',
            'phone_no'=>'123456789',
            'address'=>'surat'
        ]);
    }
}
