<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /**
         * Inciado uma fabrica
         * criamos laço de repetição em sequencia (5 classes, 10 sections, 20 students)
         * laço:
         * cria 0 disciplina
         *      - cria 0 sections
         *          - cria 2 students
         *      - cria 1 sections
         *          - cria 2 students
        */
        Classes::factory()
            ->count(5)
            ->sequence(fn ($sequence) => [
                'name' => 'Discipline '. $sequence->index + 1])
            ->has(
                Section::factory()->count(2)->state(
                    new Sequence(
                        ['name'=>'Turma A'],
                        ['name'=>'Turma B'],
                    )
                )
                    ->has(
                        Student::factory()->count(2)->state(
                            function (array $attributes, Section $section){
                                return ['class_id' => $section->class_id];
                            }
                        )
                    )
            )
            ->create();
    }
}
