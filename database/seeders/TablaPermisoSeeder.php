<?php
namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $permisos = [
            array('id' => '1', 'nombre' => 'Crear Transporte', 'slug' => 'crear-gondola', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'nombre' => 'Crear Flete', 'slug' => 'crear-flete', 'created_at' => $now, 'updated_at' => $now)
        ];
        DB::table('permiso')->insert($permisos);
    }
}
