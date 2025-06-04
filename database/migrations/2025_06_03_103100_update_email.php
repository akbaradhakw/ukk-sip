<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER trg_update_student_email
            AFTER UPDATE ON students
            FOR EACH ROW
            BEGIN
                IF OLD.email <> NEW.email THEN
                    UPDATE users
                    SET email = NEW.email
                    WHERE email = OLD.email;
                END IF;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_update_student_email');
    }
};
