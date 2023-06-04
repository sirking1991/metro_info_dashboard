<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LGUSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Caloocan']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Las Piñas']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Makati']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Malabon']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Mandaluyong']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Manila']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Marikina']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Muntinlupa']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Navotas']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Parañaque']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Pasay']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Pasig']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Pateros']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Quezon City']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'San Juan']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Taguig']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'NCR', 'name'=>'Valenzuela']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'Region I', 'name'=>'Dagupan']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region I', 'name'=>'Ilocos Norte']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region I', 'name'=>'Ilocos Sur']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region I', 'name'=>'La Union']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region I', 'name'=>'Pangasinan']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'CAR', 'name'=>'Abra']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'CAR', 'name'=>'Apayao']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'CAR', 'name'=>'Baguio']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'CAR', 'name'=>'Benguet']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'CAR', 'name'=>'Ifugao']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'CAR', 'name'=>'Kalinga']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'CAR', 'name'=>'Mountain Province']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'Region II', 'name'=>'Batanes']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region II', 'name'=>'Cagayan']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region II', 'name'=>'Isabela']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region II', 'name'=>'Nueva Vizcaya']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region II', 'name'=>'Quirino']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region II', 'name'=>'Santiago']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'Region III', 'name'=>'Angeles']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region III', 'name'=>'Aurora']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region III', 'name'=>'Bataan']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region III', 'name'=>'Bulacan']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region III', 'name'=>'Nueva Ecija']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region III', 'name'=>'Olongapo']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region III', 'name'=>'Pampanga']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region III', 'name'=>'Tarlac']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region III', 'name'=>'Zambales']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'Region IV-A', 'name'=>'Batangas']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region IV-A', 'name'=>'Cavite']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region IV-A', 'name'=>'Laguna']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region IV-A', 'name'=>'Lucena']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region IV-A', 'name'=>'Quezon']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region IV-A', 'name'=>'Rizal']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'Mimaropa', 'name'=>'Marinduque']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Mimaropa', 'name'=>'Occidental Mindoro']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Mimaropa', 'name'=>'Oriental Mindoro']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Mimaropa', 'name'=>'Palawan']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Mimaropa', 'name'=>'Puerto Princesa']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Mimaropa', 'name'=>'Romblon']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'Region V', 'name'=>'Albay']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region V', 'name'=>'Camarines Norte']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region V', 'name'=>'Camarines Sur']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region V', 'name'=>'Catanduanes']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region V', 'name'=>'Masbate']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region V', 'name'=>'Naga']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region V', 'name'=>'Sorsogon']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VI', 'name'=>'Aklan']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VI', 'name'=>'Antique']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VI', 'name'=>'Bacolod']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VI', 'name'=>'Capiz']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VI', 'name'=>'Guimaras']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VI', 'name'=>'Iloilo']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VI', 'name'=>'Iloilo City']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VI', 'name'=>'Negros Occidental']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VII', 'name'=>'Bohol']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VII', 'name'=>'Cebu']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VII', 'name'=>'Cebu City']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VII', 'name'=>'Lapu-Lapu']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VII', 'name'=>'Mandaue']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VII', 'name'=>'Negros Oriental']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VII', 'name'=>'Siquijor']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VIII', 'name'=>'Biliran']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VIII', 'name'=>'Eastern Samar']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VIII', 'name'=>'Leyte']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VIII', 'name'=>'Northern Samar']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VIII', 'name'=>'Ormoc']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VIII', 'name'=>'Samar']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VIII', 'name'=>'Southern Leyte']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region VIII', 'name'=>'Tacloban']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'Region IX', 'name'=>'Isabela City']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region IX', 'name'=>'Zamboanga City']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region IX', 'name'=>'Zamboanga del Norte']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region IX', 'name'=>'Zamboanga del Sur']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region IX', 'name'=>'Zamboanga Sibugay']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'Region X', 'name'=>'Bukidnon']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region X', 'name'=>'Cagayan de Oro']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region X', 'name'=>'Camiguin']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region X', 'name'=>'Iligan']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region X', 'name'=>'Lanao del Norte']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region X', 'name'=>'Misamis Occidental']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region X', 'name'=>'Misamis Oriental']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XI', 'name'=>'Davao City']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XI', 'name'=>'Davao de Oro']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XI', 'name'=>'Davao del Norte']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XI', 'name'=>'Davao del Sur']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XI', 'name'=>'Davao Oriental']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XI', 'name'=>'Davao Occidental']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XII', 'name'=>'Cotabato']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XII', 'name'=>'General Santos']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XII', 'name'=>'Sarangani']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XII', 'name'=>'South Cotabato']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XII', 'name'=>'Sultan Kudarat']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XIII', 'name'=>'Agusan del Norte']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XIII', 'name'=>'Agusan del Sur']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XIII', 'name'=>'Butuan']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XIII', 'name'=>'Dinagat Islands']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XIII', 'name'=>'Surigao del Norte']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'Region XIII', 'name'=>'Surigao del Sur']);

        DB::table('local_govt_units')->insert(['region_short_name'=>'BARMM', 'name'=>'Basilan']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'BARMM', 'name'=>'Cotabato City']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'BARMM', 'name'=>'Lanao del Sur']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'BARMM', 'name'=>'Maguindanao']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'BARMM', 'name'=>'Sulu']);
        DB::table('local_govt_units')->insert(['region_short_name'=>'BARMM', 'name'=>'Tawi-Tawi']);        

        // update slugs
        $LUGs = \App\LGU::all();
        foreach ($LUGs as $lgu) {
            $lgu->slug = Str::slug($lgu->name);
            $lgu->save();
        }

    }
}
