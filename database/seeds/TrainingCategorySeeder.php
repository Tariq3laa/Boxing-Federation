<?php

use Illuminate\Database\Seeder;
use App\Models\TrainingCategory;

class TrainingCategorySeeder extends Seeder
{
    public function run()
    {
        $trainingCategory = [
            'amateurs', //للمبتدأين
            'pro', //للمحترفين
            'kids', //للصغار
            'old', // للكبار
        ];

        foreach ($trainingCategory as $item) {
            TrainingCategory::create([
                'name' => $item
            ]);
        }
    }
}
