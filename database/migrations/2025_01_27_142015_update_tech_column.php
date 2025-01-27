<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Backup data lama jika ada
            $table->text('technologies_backup')->nullable()->after('technologies');
            
            // Drop kolom lama
            $table->dropColumn('technologies');
            
            // Buat kolom baru dengan tipe json
            $table->json('technologies')->nullable()->after('technologies_backup');
        });

        // Jika perlu memindahkan data dari backup
        if (Schema::hasColumn('projects', 'technologies_backup')) {
            DB::table('projects')->get()->each(function ($project) {
                $technologies = $project->technologies_backup ? 
                    explode(',', $project->technologies_backup) : 
                    [];
                
                DB::table('projects')
                    ->where('id', $project->id)
                    ->update(['technologies' => json_encode($technologies)]);
            });

            // Hapus kolom backup
            Schema::table('projects', function (Blueprint $table) {
                $table->dropColumn('technologies_backup');
            });
        }
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('technologies')->nullable()->change();
        });
    }
};