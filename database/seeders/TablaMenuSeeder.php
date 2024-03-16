<?php
namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $menus = [
            array('id' => '1', 'menu_id' => '8', 'nombre' => 'Menus', 'url' => 'admin/menu', 'orden' => '1', 'icono' => 'fas fa-ellipsis-v', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'menu_id' => '8', 'nombre' => 'Menu Rol', 'url' => 'admin/menu-rol', 'orden' => '2', 'icono' => 'fas fa-tag', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '3', 'menu_id' => '8', 'nombre' => 'Roles', 'url' => 'admin/rol', 'orden' => '5', 'icono' => 'fas fa-user-tag', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '4', 'menu_id' => '8', 'nombre' => 'Permisos', 'url' => 'admin/permiso', 'orden' => '3', 'icono' => 'fas fa-key', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '5', 'menu_id' => '8', 'nombre' => 'Usuarios', 'url' => 'admin/usuario', 'orden' => '6', 'icono' => 'fas fa-users', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '6', 'menu_id' => '0', 'nombre' => 'Transportes', 'url' => 'gondola', 'orden' => '2', 'icono' => 'fas fa-truck', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '7', 'menu_id' => '0', 'nombre' => 'Fletes', 'url' => 'flete', 'orden' => '3', 'icono' => 'fas fa-location-arrow', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '8', 'menu_id' => '0', 'nombre' => 'Administrador', 'url' => '#', 'orden' => '1', 'icono' => 'fas fa-user-shield', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '9', 'menu_id' => '8', 'nombre' => 'Permiso Rol', 'url' => 'admin/permiso-rol', 'orden' => '4', 'icono' => 'fas fa-user-check', 'created_at' => $now, 'updated_at' => $now)
        ];
        DB::table('menu')->insert($menus);
    }
}
