<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Animal::create([
            'name' => 'Max',
            'species' => 'Perro',
            'breed' => 'Beagle',
            'birth_date' => '2022-04-15',
            'sex' => 'male',
            'health_status' => 'Vacunación al día. Microchip instalado. Castrado. Leve alergia al pollo.',
            'description' => 'Soy un Beagle con mucha energía compilada. Fui rescatado y ahora busco un equipo de desarrollo estable donde pueda hacer deploy de mi amor a diario.',
            'image_path' => 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?q=80&w=800&auto=format&fit=crop',
            'status' => 'available',
        ]);

        Animal::create([
            'name' => 'Garfield',
            'species' => 'Gato',
            'breed' => 'Común europeo',
            'birth_date' => '2020-08-10',
            'sex' => 'male',
            'health_status' => 'Sano. Desparasitado y vacunado.',
            'description' => 'Gato tranquilo, experto en dormir sobre el teclado mientras intentas hacer push a producción.',
            'image_path' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?q=80&w=800&auto=format&fit=crop',
            'status' => 'available',
        ]);
        
        Animal::create([
            'name' => 'Snow',
            'species' => 'Perro',
            'breed' => 'Husky Siberiano',
            'birth_date' => '2023-01-20',
            'sex' => 'female',
            'health_status' => 'Excelente estado de salud. Todas las vacunas al día.',
            'description' => 'Husky siberiano. Requiere sistemas de refrigeración avanzados y paseos largos.',
            'image_path' => 'https://images.unsplash.com/photo-1605568427561-40dd23c2acea?q=80&w=600&auto=format&fit=crop',
            'status' => 'available',
        ]);
    }
}
