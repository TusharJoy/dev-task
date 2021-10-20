<?php

namespace Database\Seeders;

use App\Models\User;
use App\Module\UserRepository;
use Illuminate\Database\Seeder;
use Spatie\SimpleExcel\SimpleExcelReader;

class UserSeeder extends Seeder
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedFromDummy();
    }

    private function seedFromDummy()
    {
        $filePath = public_path(config('eastnetic.test_data_path'));

        SimpleExcelReader::create($filePath)
            ->getRows()
            ->each(function (array $rowProperties) {

                $transformer = User::FIELD_MAP;
                $indexedProperties = array_values($rowProperties);
                $properties = array();

                foreach ($indexedProperties as $index => $value) {

                    $index = strval($index);
                    if (!array_key_exists($index, $transformer)) {
                        continue;
                    }

                    $properties[$transformer[$index]] = $value;
                }
                $this->userRepository->store($properties);
            });
    }
}
