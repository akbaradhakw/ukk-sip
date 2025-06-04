<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("


            CREATE TRIGGER update_internship_status
            AFTER INSERT ON internships
            FOR EACH ROW
            BEGIN
                UPDATE students
                SET internship_status = true
                WHERE id = NEW.student_id;
            END;


        ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
