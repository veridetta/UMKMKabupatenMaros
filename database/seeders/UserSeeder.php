<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'MA DDI KEMBANG LEMARI',
                'password' =>  Hash::make('131273100017'),
                'role' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAN PANGKAJENE KEPULAUAN',
                'password' =>  Hash::make('131173120015'),
                'role' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS AL-FALAH PAMMAS',
                'password' => Hash::make('131273050313'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS DARUL FATH BONTOLANGKASA',
                'password' =>  Hash::make('131273100317'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS DARUL DARUL KAMAL',
                'password' => Hash::make('131273100159'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS DARUSSALAM ANRONG APPAKA',
                'password' => Hash::make('131273100154'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS DDI AD BONTO-BONTO',
                'password' => Hash::make('131273100156'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS DDI BARU-BARU TANGA',
                'password' => Hash::make('131273100152'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS DDI GALLA RAYA',
                'password' => Hash::make('131273100160'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS DDI JAWI-JAWI',
                'password' => Hash::make('131273100158'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS DDI KALUKALUKUANG',
                'password' =>  Hash::make('131273092226'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS DDI PADANGLAMPE',
                'password' => Hash::make('131273100157'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS DDI TABO-TABO',
                'password' => Hash::make('131273100274'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS DDI-AD BOWONG CINDEA',
                'password' => Hash::make('131273100155'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS MUHAMMADIYAH SIBATUA PANGKAJENE',
                'password' => Hash::make('131273100151'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS PP MUJAHIDIN',
                'password' => Hash::make('131273100153'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS SABUTUNG',
                'password' => Hash::make('131273100150'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'MAS SYAWIR',
                'password' => Hash::make('131273100016'),
                'role' => '2',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'admin_01',
                'password' => Hash::make('password'),
                'role' => '3',
                 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

        ];

        User::insert($users);
    }
}
