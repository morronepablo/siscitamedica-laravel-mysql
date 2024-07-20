<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Configuracione;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([RoleSeeder::class]);


        // Usuario Admin
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678')
        ])->assignRole('admin');

        // Usuario Secretaria
        User::create([
            'name' => 'Natalia Oduber',
            'email' => 'nataliaoduber@gmail.com',
            'password' => Hash::make('12345678')
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres' => 'Natalia',
            'apellidos' => 'Oduber',
            'dni' => '94654750',
            'celular' => '1138661609',
            'fecha_nacimiento' => '03/12/1983',
            'direccion' => 'Juan Agustin Garcia 2752 6 A',
            'user_id' => '2'
        ]);

        // Usuario Doctor
        User::create([
            'name' => 'Andrea Oviedo',
            'email' => 'andreaoviedo@gmail.com',
            'password' => Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'Andrea',
            'apellidos' => 'Oviedo',
            'telefono' => '1135627412',
            'licencia' => '1234567890',
            'especialidad' => 'Pediatría',
            'user_id' => '3'
        ]);

        // Consultorios
        Consultorio::create([
            'nombre' => 'Pediatría',
            'ubicacion' => '1-1A',
            'capacidad' => '10',
            'telefono' => '1138905671',
            'especialidad' => 'Pediatría',
            'estado' => 'ACTIVO'
        ]);

        Consultorio::create([
            'nombre' => 'Fisioterapia',
            'ubicacion' => '3-1A',
            'capacidad' => '20',
            'telefono' => '1138905671',
            'especialidad' => 'Fisioterapia',
            'estado' => 'ACTIVO'
        ]);

        Consultorio::create([
            'nombre' => 'Odontología',
            'ubicacion' => '2-1A',
            'capacidad' => '5',
            'telefono' => '1138905671',
            'especialidad' => 'Odontología',
            'estado' => 'ACTIVO'
        ]);

        // Usuario Común
        // Usuario Secretaria
        User::create([
            'name' => 'Pablo Morrone',
            'email' => 'morronepablo@gmail.com',
            'password' => Hash::make('12345678')
        ])->assignRole('usuario');

        // Pacientes
        $this->call([PacienteSeeder::class]);

        // Horarios
        Horario::create([
            'dia' => 'Lunes',
            'hora_inicio' => '08:00:00',
            'hora_fin' => '13:00:00',
            'doctor_id' => '1',
            'consultorio_id' => '1'
        ]);
        Horario::create([
            'dia' => 'Miercoles',
            'hora_inicio' => '08:00:00',
            'hora_fin' => '13:00:00',
            'doctor_id' => '1',
            'consultorio_id' => '1'
        ]);

        //Configuración
        Configuracione::create([
            'nombre' => 'Clinica Morrone',
            'direccion' => 'Juan Agustin Garcia 6 A',
            'telefono' => '1138669097',
            'email' => 'clinicamorrone@gmail.com'
        ]);
    }
}
