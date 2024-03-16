<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Seguridad\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = Usuario::create([
            'usuario' => 'admin',
            'nombre' => 'Administrador',
            'email' => 'vilma@gmail.com',
            //'password' => Hash::make('pass123')
            'password' => 'pass123'
        ]);

        $usuario->roles()->sync(1);

    }
}
