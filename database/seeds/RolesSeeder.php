<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen(__DIR__ . '/data/role.csv', 'r')) !== false) {
            $header = null;

            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                if (!$header) {
                    $header = $row;
                } else {
                    try {
                        $input['id'] = $row[0];
                        $input['title'] = $row[1];
                        $input['access_admin'] = $row[2];

                        Role::firstOrCreate($input);
                    } catch (Exception $e) {
                        print_r($row);
                        print $e->getMessage();
                    }
                }
            }

            fclose($handle);
        }
    }
}
