<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(Seedeertags::class);
        $this->call(SeedeerCategories::class);
        $this->call(SedeerMedias::class);
        $this->call(SeedeerPets::class);
        $this->call(SedeerPetMedias::class);
        $this->call(SedeerPetTags::class);
    }
}
