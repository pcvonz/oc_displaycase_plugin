<?php namespace Vonzimmerman\DisplayCase\Updates;
use Vonzimmerman\DisplayCase\Models\Item;
use Vonzimmerman\DisplayCase\Models\Tags;
use Vonzimmerman\DisplayCase\Models\Section;
use Vonzimmerman\DisplayCase\Models\Profile;
use Vonzimmerman\DisplayCase\Models\Links;
use October\Rain\Database\Updates\Seeder;
class SeedAllTables extends Seeder
{
    public function run()
    {
        // Setup test item
        $item = Item::create([
           'short_description' => 'This is a neat new item',
           'title' => 'New Item',
           'slug' => 'new-item',
           'item_date' => date("Y-m-d H:i:s"),
           'published' => '1',
           'sort_order' => '0'
        ]);
        $tag = Tags::create(['name' => 'tag']);
        $item->tags()->attach($tag->id);

        $logo = (new \System\Models\File)->fromFile('plugins/vonzimmerman/displaycase/logo.png');
        $logoWhite = (new \System\Models\File)->fromFile('plugins/vonzimmerman/displaycase/logo_white.png');
        $item->banner()->add($logoWhite);
        $logoWhite = (new \System\Models\File)->fromFile('plugins/vonzimmerman/displaycase/logo_white.png');
        $item->thumbnail()->add($logoWhite);
        $item->screenshot()->add($logo);

        $lorem = '
<p>
Dolores quia qui excepturi maiores sint. Quia modi omnis qui quos consequatur animi fugiat omnis. Omnis iusto deleniti est sequi et earum explicabo animi. A accusamus aliquam inventore saepe voluptatem quasi. Provident natus est et placeat qui animi doloribus. Qui maxime fuga iure natus voluptatibus alias ipsum ut.
</p>
<p>
Est eligendi ut et. A recusandae exercitationem eum quis et placeat est. Eos eius aut nulla. Nesciunt ea aut aut quos est cumque dolores ut. Architecto ut ab qui exercitationem aut itaque. Vero ipsa enim eius at.
</p>
<p>
Consequuntur rerum deleniti pariatur non nostrum. Recusandae eum itaque ullam quis eos nulla maxime. Sed sit adipisci ea et ipsa maxime iste.
</p>
<p>
Laudantium sint ullam aperiam facere ab veniam. Excepturi cumque occaecati velit ut nobis quasi nulla dolores. Itaque iure debitis dicta. Hic eum voluptate aperiam molestiae dignissimos. Doloribus consectetur velit unde sunt labore aut modi.
</p>
<p>
Voluptates asperiores veniam voluptate qui corporis eius eum maxime. Ut maiores numquam necessitatibus perspiciatis. Officia officia vel incidunt et impedit repellendus. Expedita hic deserunt esse.
</p>
';
        for($i = 1; $i <= 5; $i++) {
            $section = Section::create([
                'section_title' => 'Test section '.$i,
                'section' => $lorem,
                'sort_order' => $i,
                'item_id' => $item->id
            ]);
            $section->save();
        }

        // Setup profile
        $profile = Profile::create([
            'name' => 'My Name',
            'occupation' => 'My Occupatation',
            'description' => 'Describe what you do. Highlight <span class="background-secondary color-white">choice</span> items with this <span class="background-secondary color-white">span</span>. Hope you enjoy your new portfolio!',
            'profile_key' => 'my-key',
            'email' => 'example@example.com'
        ]);
        $file = (new \System\Models\File)->fromFile('plugins/vonzimmerman/displaycase/avatar.png');
        $profile->profile_image()->add($file);

        for($i = 1; $i <= 4; $i++) {
            $links = Links::create([
                'name' => 'a link',
                'url' => 'http://duckduckgo.com/',
                'profile_id' => $profile->id
            ]);
            $linkImage = (new \System\Models\File)->fromFile('plugins/vonzimmerman/displaycase/link-intact.svg');
            $links->icon()->add($linkImage);
            $links->save();
        }
    }
}
