<?php

namespace Database\Seeders;

use App\Models\ProductStorage;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           // MachineSeeder::class,
            StorageSeeder::class,
            SupplierSeeder::class,
            EmployeeSeeder::class,
            WorkstationSeeder::class,
            ClientSeeder::class,
            ProductSeeder::class,
            ClientuserSeeder::class,
            // ScheduleSeeder::class,
            DefectiveSeeder::class,
            OrderSeeder::class,
            // ReportSeeder::class,
            MaterialSeeder::class,
            MachineProductSeeder::class,
            MaterialProductSeeder::class,
            ProductStorageSeeder::class,
            // DefectiveReportSeeder::class,
            ProcessSeeder::class,
            MaterialChangeSeeder::class
        ]);
    }
}
