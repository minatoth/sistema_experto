<?php

use uno\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call('ClientesTableSeeder');
        $this->command->info('User Table seeded!');

        Model::reguard();
    }
}
class ClientesTableSeeder extends Seeder
{
/**
 * Run the database seeds.
 *
 * @return void
 */
public function run()
{
    User::create([
        'nomUsu'=>'Thania',
        'apeUsu'=>'Huanca',
        'genUsu'=>'1',
        'edadUsu'=>'22',
        'regUsu'=>'Calle Rocallado entre Av. Ecuador',
        'fecUsu'=>'20/08/1994',
        'nickUsu'=>'thuanca',
        'password'=>bcrypt('123456'),
        'created_at'=> Carbon::now(),
        'updated_at'=> Carbon::now()

        ]);
}
}
