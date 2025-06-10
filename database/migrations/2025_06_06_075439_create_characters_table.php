<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img');
            $table->timestamps();
        });

        DB::table('characters')->insert([
            ['name' => 'Alice', 'img' => '/images/characters/wie1.png'],
            ['name' => 'Bob', 'img' => '/images/characters/wie2.png'],
            ['name' => 'Charlie', 'img' => '/images/characters/wie3.png'],
            ['name' => 'Diana', 'img' => '/images/characters/wie4.png'],
            ['name' => 'Eve', 'img' => '/images/characters/wie5.png'],
            ['name' => 'Frank', 'img' => '/images/characters/wie6.png'],
            ['name' => 'Grace', 'img' => '/images/characters/wie7.png'],
            ['name' => 'Hank', 'img' => '/images/characters/wie8.png'],
            ['name' => 'Ivy', 'img' => '/images/characters/wie9.png'],
            ['name' => 'Jack', 'img' => '/images/characters/wie10.png'],
            ['name' => 'Kara', 'img' => '/images/characters/wie11.png'],
            ['name' => 'Leo', 'img' => '/images/characters/wie12.png'],
            ['name' => 'Mona', 'img' => '/images/characters/wie13.png'],
            ['name' => 'Nico', 'img' => '/images/characters/wie14.png'],
            ['name' => 'Olga', 'img' => '/images/characters/wie15.png'],
            ['name' => 'Pete', 'img' => '/images/characters/wie16.png'],
            ['name' => 'Quinn', 'img' => '/images/characters/wie17.png'],
            ['name' => 'Rita', 'img' => '/images/characters/wie18.png'],
            ['name' => 'Sam', 'img' => '/images/characters/wie19.png'],
            ['name' => 'Tina', 'img' => '/images/characters/wie20.png'],
            ['name' => 'Uma', 'img' => '/images/characters/wie21.png'],
            ['name' => 'Viktor', 'img' => '/images/characters/wie22.png'],
            ['name' => 'Wendy', 'img' => '/images/characters/wie23.png'],
            ['name' => 'Xander', 'img' => '/images/characters/wie24.png'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
