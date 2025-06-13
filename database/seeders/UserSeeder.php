<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Norma Fisher',
            'email' => 'normafisher@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'user',
            'image' => null,
            'nationality' => 'Saudi',
            'mission' => 'Propagation',
            'last_login_at' => '2025-04-09 16:31:00',
        ]);
        
        User::create([
            'name' => 'Jorge Sullivan',
            'email' => 'jorgesullivan@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'user',
            'image' => null,
            'nationality' => 'Omani',
            'mission' => 'Control',
            'last_login_at' => '2025-04-12 18:57:00',
        ]);
        
        User::create([
            'name' => 'Elizabeth Woods',
            'email' => 'elizabethwoods@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'admin',
            'image' => null,
            'nationality' => 'Kuwaiti',
            'mission' => 'Payload',
            'last_login_at' => '2025-04-05 03:39:00',
        ]);
        
        User::create([
            'name' => 'Susan Wagner',
            'email' => 'susanwagner@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'user',
            'image' => null,
            'nationality' => 'Kuwaiti',
            'mission' => 'Payload',
            'last_login_at' => '2025-04-04 23:04:00',
        ]);
        
        User::create([
            'name' => 'Peter Montgomery',
            'email' => 'petermontgomery@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'admin',
            'image' => null,
            'nationality' => 'Emirati',
            'mission' => 'Telemetry',
            'last_login_at' => '2025-04-28 20:45:00',
        ]);
        
        User::create([
            'name' => 'Kristen Campbell',
            'email' => 'kristencampbell@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'admin',
            'image' => null,
            'nationality' => 'American',
            'mission' => 'Payload',
            'last_login_at' => '2025-04-15 06:58:00',
        ]);
        
        User::create([
            'name' => 'Evan Matthews',
            'email' => 'evanmatthews@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'user',
            'image' => null,
            'nationality' => 'Tunisian',
            'mission' => 'Propagation',
            'last_login_at' => '2025-04-20 10:25:00',
        ]);
        
        User::create([
            'name' => 'Victoria Gray',
            'email' => 'victoriagray@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'user',
            'image' => null,
            'nationality' => 'Qatari',
            'mission' => 'Payload',
            'last_login_at' => '2025-04-14 19:17:00',
        ]);
        
        User::create([
            'name' => 'Henry Dean',
            'email' => 'henrydean@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'admin',
            'image' => null,
            'nationality' => 'Sudanese',
            'mission' => 'Telemetry',
            'last_login_at' => '2025-04-18 21:48:00',
        ]);
        
        User::create([
            'name' => 'Katherine Stanley',
            'email' => 'katherinestanley@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'user',
            'image' => null,
            'nationality' => 'Iraqi',
            'mission' => 'Control',
            'last_login_at' => '2025-04-11 13:11:00',
        ]);

        User::create([
            'name' => 'Ahmed Nasser',
            'email' => 'ahmednasser@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'admin',
            'image' => null,
            'nationality' => 'Egyptian',
            'mission' => 'Control',
            'last_login_at' => '2025-04-03 11:10:00',
        ]);
        
        User::create([
            'name' => 'Fatima Alharthy',
            'email' => 'fatimaalharthy@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'user',
            'image' => null,
            'nationality' => 'Omani',
            'mission' => 'Telemetry',
            'last_login_at' => '2025-04-07 08:05:00',
        ]);
        
        User::create([
            'name' => 'Mohammed Alqahtani',
            'email' => 'mohammedalqahtani@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'user',
            'image' => null,
            'nationality' => 'Saudi',
            'mission' => 'Payload',
            'last_login_at' => '2025-04-10 17:33:00',
        ]);
        
        User::create([
            'name' => 'Laila Hamdan',
            'email' => 'lailahamdan@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'admin',
            'image' => null,
            'nationality' => 'Jordanian',
            'mission' => 'Propagation',
            'last_login_at' => '2025-04-17 14:45:00',
        ]);
        
        User::create([
            'name' => 'Omar Dabbas',
            'email' => 'omardabbas@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'user',
            'image' => null,
            'nationality' => 'Jordanian',
            'mission' => 'Control',
            'last_login_at' => '2025-04-26 20:00:00',
        ]);
        
        User::create([
            'name' => 'Salma Khalid',
            'email' => 'salmakhalid@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'admin',
            'image' => null,
            'nationality' => 'Sudanese',
            'mission' => 'Telemetry',
            'last_login_at' => '2025-04-29 11:21:00',
        ]);
        
        User::create([
            'name' => 'Khaled Habib',
            'email' => 'khaledhabib@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'user',
            'image' => null,
            'nationality' => 'Bahraini',
            'mission' => 'Payload',
            'last_login_at' => '2025-04-21 09:45:00',
        ]);
        
        User::create([
            'name' => 'Huda Alzahraa',
            'email' => 'hudaalzahraa@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'admin',
            'image' => null,
            'nationality' => 'Iraqi',
            'mission' => 'Control',
            'last_login_at' => '2025-04-24 12:32:00',
        ]);
        
        User::create([
            'name' => 'Yousef Taha',
            'email' => 'youseftaha@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'user',
            'image' => null,
            'nationality' => 'Egyptian',
            'mission' => 'Propagation',
            'last_login_at' => '2025-04-19 07:50:00',
        ]);
        
        User::create([
            'name' => 'Noura Fathi',
            'email' => 'nourafathi@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'role' => 'admin',
            'image' => null,
            'nationality' => 'Kuwaiti',
            'mission' => 'Telemetry',
            'last_login_at' => '2025-04-08 10:00:00',
        ]);

        User::create([
            'name' => 'Rania Alameer',
            'email' => 'raniaalameer@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'nationality' => 'Emirati',
            'mission' => 'Payload',
            'last_login_at' => '2025-04-06 15:10:00',
        ]);
        
        User::create([
            'name' => 'Fares Ghoneim',
            'email' => 'faresghoneim@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nationality' => 'Egyptian',
            'mission' => 'Telemetry',
            'last_login_at' => '2025-04-22 09:20:00',
        ]);
        
        User::create([
            'name' => 'Layla Alhaddad',
            'email' => 'laylaalhaddad@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'nationality' => 'Palestinian',
            'mission' => 'Control',
            'last_login_at' => '2025-04-11 14:15:00',
        ]);
        
        User::create([
            'name' => 'Othman Barakat',
            'email' => 'othmanbarakat@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nationality' => 'Jordanian',
            'mission' => 'Propagation',
            'last_login_at' => '2025-04-03 08:30:00',
        ]);
        
        User::create([
            'name' => 'Dina Sorour',
            'email' => 'dinasorour@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'nationality' => 'Syrian',
            'mission' => 'Payload',
            'last_login_at' => '2025-04-25 13:20:00',
        ]);
        
        User::create([
            'name' => 'Tariq Mahdi',
            'email' => 'tariqmahdi@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nationality' => 'Sudanese',
            'mission' => 'Control',
            'last_login_at' => '2025-04-13 19:45:00',
        ]);
        
        User::create([
            'name' => 'Hanan Alsharif',
            'email' => 'hananalsharif@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'nationality' => 'Moroccan',
            'mission' => 'Telemetry',
            'last_login_at' => '2025-04-02 06:00:00',
        ]);
        
        User::create([
            'name' => 'Yasin Khattab',
            'email' => 'yasinkhattab@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nationality' => 'Syrian',
            'mission' => 'Propagation',
            'last_login_at' => '2025-04-16 12:15:00',
        ]);
        
        User::create([
            'name' => 'Farida Osama',
            'email' => 'faridaosama@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'nationality' => 'Egyptian',
            'mission' => 'Payload',
            'last_login_at' => '2025-04-09 18:45:00',
        ]);
        
        User::create([
            'name' => 'Ali Hassan',
            'email' => 'alihassan@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nationality' => 'Lebanese',
            'mission' => 'Control',
            'last_login_at' => '2025-04-27 07:50:00',
        ]);

        User::create([
            'name' => 'Sahar Badawi',
            'email' => 'saharbadawi@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'nationality' => 'Egyptian',
            'mission' => 'Telemetry',
            'last_login_at' => '2025-04-05 10:05:00',
        ]);
        
        User::create([
            'name' => 'Majed Faleh',
            'email' => 'majedfaleh@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nationality' => 'Saudi',
            'mission' => 'Payload',
            'last_login_at' => '2025-04-23 21:10:00',
        ]);
        
        User::create([
            'name' => 'Najla Hariri',
            'email' => 'najlahariri@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'nationality' => 'Saudi',
            'mission' => 'Control',
            'last_login_at' => '2025-04-19 17:30:00',
        ]);
        
        User::create([
            'name' => 'Ayman Sadiq',
            'email' => 'aymansadiq@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nationality' => 'Iraqi',
            'mission' => 'Propagation',
            'last_login_at' => '2025-04-18 14:10:00',
        ]);
        
        User::create([
            'name' => 'Mona Abdulrahman',
            'email' => 'monaabdulrahman@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'nationality' => 'Emirati',
            'mission' => 'Telemetry',
            'last_login_at' => '2025-04-10 13:45:00',
        ]);
        
        User::create([
            'name' => 'Adel Alnashmi',
            'email' => 'adelalnashmi@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nationality' => 'Kuwaiti',
            'mission' => 'Control',
            'last_login_at' => '2025-04-07 18:15:00',
        ]);
        
        User::create([
            'name' => 'Yara Helal',
            'email' => 'yarahelal@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'nationality' => 'Palestinian',
            'mission' => 'Payload',
            'last_login_at' => '2025-04-12 08:40:00',
        ]);
        
        User::create([
            'name' => 'Hussein Darwish',
            'email' => 'husseindarwish@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nationality' => 'Lebanese',
            'mission' => 'Propagation',
            'last_login_at' => '2025-04-20 22:30:00',
        ]);
        
        User::create([
            'name' => 'Reem Alsaleh',
            'email' => 'reemalsaleh@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'nationality' => 'Qatari',
            'mission' => 'Telemetry',
            'last_login_at' => '2025-04-06 16:50:00',
        ]);
        
        User::create([
            'name' => 'Nabil Kassem',
            'email' => 'nabilkassem@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nationality' => 'Tunisian',
            'mission' => 'Control',
            'last_login_at' => '2025-04-14 09:25:00',
        ]);

        User::create([
            'name' => 'Jasmine Tawfiq',
            'email' => 'jasminetawfiq@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'nationality' => 'Egyptian',
            'mission' => 'Telemetry',
            'last_login_at' => '2025-04-04 10:30:00',
        ]);
        
        User::create([
            'name' => 'Fouad Rizk',
            'email' => 'fouadrizk@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nationality' => 'Lebanese',
            'mission' => 'Payload',
            'last_login_at' => '2025-04-23 15:00:00',
        ]);
        
        User::create([
            'name' => 'Mariam Nassar',
            'email' => 'mariamnassar@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'nationality' => 'Jordanian',
            'mission' => 'Control',
            'last_login_at' => '2025-04-13 19:00:00',
        ]);
        
        User::create([
            'name' => 'Alaa Zain',
            'email' => 'alaazain@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nationality' => 'Iraqi',
            'mission' => 'Propagation',
            'last_login_at' => '2025-04-12 17:40:00',
        ]);
        
        User::create([
            'name' => 'Zeinab Saleh',
            'email' => 'zeinabsaleh@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'nationality' => 'Egyptian',
            'mission' => 'Telemetry',
            'last_login_at' => '2025-04-29 21:30:00',
        ]);
        
        User::create([
            'name' => 'Sami Elhadi',
            'email' => 'samielhadi@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nationality' => 'Libyan',
            'mission' => 'Control',
            'last_login_at' => '2025-04-10 14:00:00',
        ]);
        
        User::create([
            'name' => 'Khaled Althani',
            'email' => 'khaledalthani@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'nationality' => 'Qatari',
            'mission' => 'Payload',
            'last_login_at' => '2025-04-02 08:50:00',
        ]);
        
        User::create([
            'name' => 'Rasha Hamza',
            'email' => 'rashahamza@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nationality' => 'Egyptian',
            'mission' => 'Propagation',
            'last_login_at' => '2025-04-09 11:10:00',
        ]);
        
        User::create([
            'name' => 'Basma Sharaf',
            'email' => 'basmasharaf@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'user',
            'nationality' => 'Egyptian',
            'mission' => 'Control',
            'last_login_at' => '2025-04-15 18:20:00',
        ]);
        
        User::create([
            'name' => 'Khalil Mahmoud',
            'email' => 'khalilmahmoud@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'nationality' => 'Moroccan',
            'mission' => 'Telemetry',
            'last_login_at' => '2025-04-28 09:55:00',
        ]);
    }
}