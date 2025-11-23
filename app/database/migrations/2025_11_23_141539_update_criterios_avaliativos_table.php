<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class UpdateCriteriosAvaliativosTable extends Migration {

    public function up()
    {
        $exists = DB::table('calculos')->where('id', 3)->exists();

        if (! $exists) {
            DB::table('calculos')->insert([
                'id' => 3,
                'nome' => 'CÁLCULO DE NOTA FINAL COM PESO NOS BIMESTRES',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
     
        DB::table('criterios_avaliativos')->update([
            'calculo_id' => 3,
            'updated_at' => Carbon::now(),
        ]);
    }

    public function down()
    {
        DB::table('criterios_avaliativos')
            ->where('id', 1)
            ->update([
                'calculo_id' => 1,
                'updated_at' => Carbon::now(),
            ]);

        DB::table('criterios_avaliativos')
            ->where('id', 2)
            ->update([
                'calculo_id' => 1,
                'updated_at' => Carbon::now(),
            ]);

        DB::table('criterios_avaliativos')
            ->where('id', 3)
            ->update([
                'calculo_id' => 2,
                'updated_at' => Carbon::now(),
            ]);

        DB::table('calculos')->where('id', 3)->delete();
    }
}
