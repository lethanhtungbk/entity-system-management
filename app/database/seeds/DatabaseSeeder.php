<?php

class DatabaseSeeder extends Seeder {

    public function run() {
        $this->call('EMS');
        $this->command->info('Database dumped!');
    }

}
