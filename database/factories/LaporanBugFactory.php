<?php

namespace Database\Factories;

use App\Models\laporanBug;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\laporanBug>
 */
class LaporanBugFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'jenis' => fake()->randomElement(['functional_error', 'performance_defects', 'usability_defects','compatibility_error','security_error','syntax_error','logic_error']),
            'deskripsi' => fake()->randomElement(['ui jelek','eror saat klik submit','gabisa login','gabisa logout','crash sendiri','eror 404','pesan eror gabisa di close','data ga muncul', 'data ga sesuai saat di input','gabisa ngedit']),
            'status' => fake()->randomElement(['reported','on progress','solved']),
            'tgl_kejadian' => '2023-3'."-".fake()->numberBetween(1,30),
            'pelapor' => fake()->name(),
        ];
    }
}
