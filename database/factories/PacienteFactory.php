<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_AR');

        // Generar un género aleatorio
        $genero = $faker->randomElement(['M', 'F']);

        // Generar el nombre basado en el género
        $nombres = $genero === 'M' ? $faker->firstNameMale : $faker->firstNameFemale;
        $apellidos = $faker->lastName;

        // Generar un DNI numérico entre 7 y 8 dígitos
        $dni = $faker->numberBetween(1000000, 99999999);

        // Generar fecha de nacimiento entre hace 110 años y hace 18 años
        $fechaNacimiento = $faker->dateTimeBetween('-110 years', '-18 years')->format('Y-m-d');

        // Generar correo electrónico basado en nombre y apellido
        $correo = strtolower($nombres) . strtolower($apellidos) . '@gmail.com';

        // Generar alergias médicas aleatorias
        $alergias = $faker->randomElements(['Polen', 'Acaros', 'Penicilina', 'Mariscos', 'Mani', 'Lacteos'], $count = $faker->numberBetween(0, 3));
        $alergias = !empty($alergias) ? implode(', ', $alergias) : null;

        return [
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'genero' => $genero,
            'dni' => $dni,
            'nro_seguro' => $this->faker->unique()->numerify('########'),
            'celular' => '11' . $faker->numerify('########'),
            'fecha_nacimiento' => $fechaNacimiento,
            'grupo_sanguineo' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', '0+', '0-']),
            'alergias' => $this->faker->randomElement(['Polen', 'Acaros', 'Penicilina', 'Mariscos', 'Mani', 'Lacteos']),
            'contacto_emergencia' => '11' . $faker->numerify('########'),
            'direccion' => $faker->address,
            'correo' => $correo,
            'observaciones' => $this->faker->optional()->text(100),
        ];
    }
}
