<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relations = array(
            ['name' => 'Guardian'],
            ['name' => 'Husband'],
            ['name' => 'Wife'],
            ['name' => 'Sons'],
            ['name' => 'Daughter'],
            ['name' => 'Step son'],
            ['name' => 'Step daughter'],
            ['name' => 'Uncle'],
            ['name' => 'Aunty'],
            ['name' => 'Friends'],
            ['name' => 'Niece'],
            ['name' => 'Cousin'],
            ['name' => 'Brother'],
            ['name' => 'Sister'],
            ['name' => 'Relative'],
            ['name' => 'Non Blood Relative']
        );
        \App\Models\Relations::insert($relations);

        $homeStatuses = [
            ['name' => 'Rental'],
            ['name' => 'Owned'],
            ['name' => 'Temporary accomodation'],
        ];
        \App\Models\Homestatuses::insert($homeStatuses);

        $family_status = [
            ['name' => 'Family head'],
            ['name' => 'Dependant'],
            ['name' => 'Single independent'],
        ];
        \App\Models\FamilyStatuses::insert($family_status);


        $jobSector = [
            ['name' => 'Government'],
            ['name' => 'Private'],
            ['name' => 'Business'],
            ['name' => 'Self Employed'],
            ['name' => 'Others'],
        ];
        \App\Models\JobSectors::insert($jobSector);


        $memberStatus = [
            ['name' => 'Kariah'],
            ['name' => 'Non Kariah'],
            ['name' => 'Kariah Member'],
        ];
        \App\Models\MemberStatuses::insert($memberStatus);

        $religions = [
            ['name' => 'Islam'],
            ['name' => 'Christian'],
            ['name' => 'Hindu'],
            ['name' => 'Budha'],
            ['name' => 'Sikh'],
            ['name' => 'Others'],
        ];
        \App\Models\Religions::insert($religions);

        $gender = [
            ['name' => 'Male'],
            ['name' => 'Female'],
        ];
        \App\Models\Genders::insert($gender);

        $races = [
            ['name' => 'Melayu'],
            ['name' => 'Cina'],
            ['name' => 'India'],
            ['name' => 'Kadazan Dusun'],
            ['name' => 'Bajau'],
            ['name' => 'Murut'],
            ['name' => 'Myanmar'],
            ['name' => 'Rohingya'],
            ['name' => 'Indonesia'],
            ['name' => 'Thailand'],
            ['name' => 'Others'],
        ];
        \App\Models\Races::insert($races);


        $citizenship = [
            ['name' => 'Malaysia'],
            ['name' => 'Indonesia'],
            ['name' => 'India'],
            ['name' => 'Mayanmar'],
            ['name' => 'Bangladesh'],
            ['name' => 'Rohingya'],
            ['name' => 'Others'],
        ];
        \App\Models\CitizenshipCountry::insert($citizenship);

        $maritalStatuses = [
            ['name' => 'Single'],
            ['name' => 'Married'],
            ['name' => 'Divorcee Man'],
            ['name' => 'Divorcee Woman'],
        ];
        \App\Models\MaritalStatuses::insert($maritalStatuses);

        $states = [
            ['name' => 'Johor'],
            ['name' => 'Kedah'],
            ['name' => 'Kelantan'],
            ['name' => 'Kuala Lumpur'],
            ['name' => 'Labuan'],
            ['name' => 'Melaka'],
            ['name' => 'Negeri Sembilan'],
            ['name' => 'Pahang'],
            ['name' => 'Perak'],
            ['name' => 'Perlis'],
            ['name' => 'Sabah'],
            ['name' => 'Sarawak'],
            ['name' => 'Selangor'],
            ['name' => 'Terengganu'],
            ['name' => 'Others']
        ];
        \App\Models\State::insert($states);

        $help_categories = [
            ['name' => 'Orphan'],
            ['name' => 'Asnaf'],
            ['name' => 'Welfare'],
            ['name' => 'Education'],
            ['name' => 'Others'],
        ];
        \App\Models\HelpCategory::insert($help_categories);

        $help_types = [
            ['name' => 'School / Tuition'],
            ['name' => 'Financial'],
            ['name' => 'Eidul-fitr'],
            ['name' => 'Human development'],

            ['name' => 'Groceries'],
            ['name' => 'House rental'],
            ['name' => 'Clothing'],

            ['name' => 'Adhoc/ Musafir'],
            ['name' => 'House rental'],
            ['name' => 'Musibah'],
            ['name' => 'General activities'],

            ['name' => 'School fees'],
            ['name' => 'Tuition'],
            ['name' => 'Sponsorship'],
            ['name' => 'Travel tickets'],

            ['name' => 'Other helps'],
        ];
        \App\Models\HelpTypes::insert($help_types);

        $help_categories_types = [
            ['help_category_id' => 1, 'help_type_id' => 1],
            ['help_category_id' => 1, 'help_type_id' => 2],
            ['help_category_id' => 1, 'help_type_id' => 7],
            ['help_category_id' => 1, 'help_type_id' => 3],
            ['help_category_id' => 1, 'help_type_id' => 4],
            ['help_category_id' => 2, 'help_type_id' => 2],
            ['help_category_id' => 2, 'help_type_id' => 2],
            ['help_category_id' => 2, 'help_type_id' => 5],
            ['help_category_id' => 2, 'help_type_id' => 6],
            ['help_category_id' => 2, 'help_type_id' => 7],
            ['help_category_id' => 3, 'help_type_id' => 8],
            ['help_category_id' => 3, 'help_type_id' => 5],
            ['help_category_id' => 3, 'help_type_id' => 6],
            ['help_category_id' => 3, 'help_type_id' => 7],
            ['help_category_id' => 3, 'help_type_id' => 9],
            ['help_category_id' => 3, 'help_type_id' => 10],
            ['help_category_id' => 4, 'help_type_id' => 11],
            ['help_category_id' => 4, 'help_type_id' => 12],
            ['help_category_id' => 4, 'help_type_id' => 13],
            ['help_category_id' => 4, 'help_type_id' => 14],
            ['help_category_id' => 4, 'help_type_id' => 15],
            ['help_category_id' => 5, 'help_type_id' => 16],
        ];
        \App\Models\HelpCategoriesType::insert($help_categories_types);
    }
}

