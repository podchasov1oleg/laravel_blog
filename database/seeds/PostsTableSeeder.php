<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(
            [
                [
                    'title' => 'PHP is awesome',
                    'intro' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ac urna sit amet nibh scelerisque.",
                    'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam faucibus nunc eget ante suscipit, at maximus purus facilisis. Ut rhoncus pulvinar diam, et volutpat tortor pellentesque sit amet. Cras gravida, elit fermentum volutpat tempus, mauris neque vehicula eros, ut blandit diam sapien et arcu. Mauris eleifend ultrices cursus. Donec ornare mi at nibh semper, quis convallis purus vehicula. Nullam id hendrerit nulla, id pharetra magna. Donec turpis mi, varius eu eros id, convallis viverra mauris. Fusce ullamcorper purus in risus viverra, vitae iaculis urna porttitor. Integer ut consequat eros. Vestibulum non porta arcu. Nullam sed facilisis ex. Vivamus in felis elit. Nulla rhoncus ut nulla quis aliquam."
                ],
                [
                    'title' => 'Laravel is awesome',
                    'intro' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ac urna sit amet nibh scelerisque.",
                    'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam faucibus nunc eget ante suscipit, at maximus purus facilisis. Ut rhoncus pulvinar diam, et volutpat tortor pellentesque sit amet. Cras gravida, elit fermentum volutpat tempus, mauris neque vehicula eros, ut blandit diam sapien et arcu. Mauris eleifend ultrices cursus. Donec ornare mi at nibh semper, quis convallis purus vehicula. Nullam id hendrerit nulla, id pharetra magna. Donec turpis mi, varius eu eros id, convallis viverra mauris. Fusce ullamcorper purus in risus viverra, vitae iaculis urna porttitor. Integer ut consequat eros. Vestibulum non porta arcu. Nullam sed facilisis ex. Vivamus in felis elit. Nulla rhoncus ut nulla quis aliquam."
                ],
                [
                    'title' => 'Programming is awesome',
                    'intro' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ac urna sit amet nibh scelerisque.",
                    'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam faucibus nunc eget ante suscipit, at maximus purus facilisis. Ut rhoncus pulvinar diam, et volutpat tortor pellentesque sit amet. Cras gravida, elit fermentum volutpat tempus, mauris neque vehicula eros, ut blandit diam sapien et arcu. Mauris eleifend ultrices cursus. Donec ornare mi at nibh semper, quis convallis purus vehicula. Nullam id hendrerit nulla, id pharetra magna. Donec turpis mi, varius eu eros id, convallis viverra mauris. Fusce ullamcorper purus in risus viverra, vitae iaculis urna porttitor. Integer ut consequat eros. Vestibulum non porta arcu. Nullam sed facilisis ex. Vivamus in felis elit. Nulla rhoncus ut nulla quis aliquam."
                ],
            ]
        );
    }
}
