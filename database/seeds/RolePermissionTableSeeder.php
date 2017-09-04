<?php
use Illuminate\Database\Seeder;
use App\Models\RolePermission;

class RolePermissionTableSeeder extends Seeder
{

    public function run()
    {
        if (($handle = fopen(__DIR__ . '/data/role_permission.csv', 'r')) !== false) {
            $header = null;

            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                if (!$header) {
                    $header = $row;
                } else {
                    try {
                        $input['role_id'] = $row[0];
                        $input['permission'] = $row[1];

                        RolePermission::firstOrCreate($input);
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