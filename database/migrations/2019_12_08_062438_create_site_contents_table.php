<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            // Generic
            $table->string('slug')->nullable();

            $table->string('h1', 800)->nullable();
            $table->string('h2', 800)->nullable();
            $table->string('p', 800)->nullable();
            $table->string('img')->nullable();
            $table->string('url')->nullable();

            $table->timestamps();
        });
        $data =[

            // About Us
            [
                'slug' => "about_us",
                'h1' => "Odio sed id eos et laboriosam consequatur eos earum soluta.",
                'h2' => "#",
                'p' => "Lorem ipsum dolor sit amet consectetur adipiscing elit sed do doloreconsectetur omnis numquam quaerat.",
                'img' => "about-img.jpg",
                'url' => "#",
            ],

            // Services
            [
                'slug' => "services",
                'h1' => "Laudem latine persequeris id sed ex fabulas delectusNo vel partiendo abhorreant vituperatoribus.",
                'h2' => '#',
                'p' => '#',
                'img' => '#',
                'url' => '#',
            ],
            [
                'slug' => "services",
                'h1' => "Lorem Ipsum",
                'h2' => "#",
                'p' => "Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati",
                'img' => "ion-ios-analytics-outline",
                'url' => "#",
            ],
            [
                'slug' => "services",
                'h1' => "Lorem Doleum",
                'h2' => "#",
                'p' => "Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati",
                'img' => "ion-ios-bookmarks-outline",
                'url' => "#",
            ],
            [
                'slug' => "services",
                'h1' => "Peruim Cpnvox",
                'h2' => "#",
                'p' => "Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati",
                'img' => "ion-ios-paper-outline",
                'url' => "#",
            ],
            [
                'slug' => "services",
                'h1' => "Rectica Kansas",
                'h2' => "#",
                'p' => "Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati",
                'img' => "ion-ios-speedometer-outline",
                'url' => "#",
            ],
            [
                'slug' => "services",
                'h1' => "Kasdn Ipsum",
                'h2' => "#",
                'p' => "Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati",
                'img' => "ion-ios-world-outline",
                'url' => "#",
            ],
            [
                'slug' => "services",
                'h1' => "Lorem Ipsum",
                'h2' => "#",
                'p' => "Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati",
                'img' => "ion-ios-clock-outline",
                'url' => "#",
            ],

            // Why choose us?
            [
                'slug' => "why_us",
                'h1' => "Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus.",
                'h2' => "#",
                'p' => "Molestiae omnis numquam corrupti omnis itaque. Voluptatum quidem impedit.",
                'img' => "why-us.jpg",
                'url' => "#",
            ],

            // Statistics
            [
                'slug' => "statistics",
                'h1' => "274",
                'h2' => '#',
                'img' => '#',
                'url' => '#',
                'p' => "Clients",
            ],
            [
                'slug' => "statistics",
                'h1' => "421",
                'h2' => '#',
                'img' => '#',
                'url' => '#',
                'p' => "Projects",
            ],
            [
                'slug' => "statistics",
                'h1' => "1,364",
                'h2' => '#',
                'img' => '#',
                'url' => '#',
                'p' => "Converts",
            ],
            [
                'slug' => "statistics",
                'h1' => "18",
                'h2' => '#',
                'img' => '#',
                'url' => '#',
                'p' => "Randoms",
            ],

            // Black banner
            [
                'slug' => "black_strip",
                'h1' => "Call To Action",
                'h2' => "Button To Action",
                'p' => "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.",
                'ing' => '#',
                'url' => "#",
            ],

            // Why choose us?
            [
                'slug' => "two_section_1",
                'h1' => "Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.",
                'h2' => '#',
                'p' => "Molestiae omnis numquam corrupti omnis itaque. Voluptatum quidem impedit.",
                'img' => "features-1.svg",
                'url' => "#",
            ],
            [
                'slug' => "two_section_1",
                'h1' => "Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.",
                'h2' => '#',
                'p' => "Molestiae omnis numquam corrupti omnis itaque. Voluptatum quidem impedit.",
                'img' => "features-2.svg",
                'url' => "#",
            ],

            // Testimonials
            [
                'slug' => "testimonials",
                'h1' => "malik ateeq",
                'h2' => "freelancer",
                'p' => "Molestiae omnis numquam corrupti omnis itaque. Voluptatum quidem impedit.",
                'img' => "testimonial-1.jpg",
                'url' => "#",
            ],
            [
                'slug' => "testimonials",
                'h1' => "john doe",
                'h2' => "CEO",
                'p' => "Molestiae omnis numquam corrupti omnis itaque. Voluptatum quidem impedit.",
                'img' => "testimonial-2.jpg",
                'url' => "#",
            ],
            [
                'slug' => "testimonials",
                'h1' => "malik arbaz",
                'h2' => "journalist",
                'p' => "Molestiae omnis numquam corrupti omnis itaque. Voluptatum quidem impedit.",
                'img' => "testimonial-3.jpg",
                'url' => "#",
            ],
            [
                'slug' => "testimonials",
                'h1' => "malik ateeq",
                'h2' => "freelancer",
                'p' => "Molestiae omnis numquam corrupti omnis itaque. Voluptatum quidem impedit.",
                'img' => "testimonial-4.jpg",
                'url' => "#",
            ],

            // Team
            [
                'slug' => "team",
                'h1' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqueq",
                'h2' => "#",
                'p' => "#",
                'img' => "#",
                'url' => "#",
            ],
            [
                'slug' => "team",
                'h1' => "malik ateeq",
                'h2' => "Chief Executive Officier",
                'p' => "#",
                'img' => "team-1.jpg",
                'url' => "#",
            ],
            [
                'slug' => "team",
                'h1' => "malik ateeq",
                'h2' => "Product Manager",
                'p' => "#",
                'img' => "team-2.jpg",
                'url' => "#",
            ],
            [
                'slug' => "team",
                'h1' => "malik ateeq",
                'h2' => "CTO",
                'p' => "#",
                'img' => "team-3.jpg",
                'url' => "#",
            ],
            [
                'slug' => "team",
                'h1' => "malik ateeq",
                'h2' => "Accountant",
                'p' => "#",
                'img' => "team-4.jpg",
                'url' => "#",
            ],

            // Our Clients
            [
                'slug' => 'our_clients',
                'img' => "clients/client-1.png",
                'url' => "#",
                'h1' => '#',
                'h2' => '#',
                'p' => '#'
            ],
            [
                'slug' => 'our_clients',
                'img' => "clients/client-2.png",
                'url' => "#",
                'h1' => '#',
                'h2' => '#',
                'p' => '#'
            ],
            [
                'slug' => 'our_clients',
                'img' => "clients/client-3.png",
                'url' => "#",
                'h1' => '#',
                'h2' => '#',
                'p' => '#'
            ],
            [
                'slug' => 'our_clients',
                'img' => "clients/client-4.png",
                'url' => "#",
                'h1' => '#',
                'h2' => '#',
                'p' => '#'
            ],
            [
                'slug' => 'our_clients',
                'img' => "clients/client-5.png",
                'url' => "#",
                'h1' => '#',
                'h2' => '#',
                'p' => '#'
            ],
            [
                'slug' => 'our_clients',
                'img' => "clients/client-6.png",
                'url' => "#",
                'h1' => '#',
                'h2' => '#',
                'p' => '#'
            ],

            // FAQ
            [
                'slug' => "faq",
                'h1' => "Sed ut per`spiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.",
                'h2' => '#',
                'p' => '#',
                'img' => '#',
                'url' => '#',
            ],
            // FAQ
            [
                'slug' => "faq",
                'h1' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.",
                'p' => "Molestiae omnis numquam corrupti omnis itaque. Voluptatum quidem impedit.",
                'h2' => '#',
                'img' => '#',
                'url' => '#',
            ],
            [
                'slug' => "faq",
                'h1' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.",
                'p' => "Molestiae omnis numquam corrupti omnis itaque. Voluptatum quidem impedit.",
                'h2' => '#',
                'img' => '#',
                'url' => '#',
            ],
            [
                'slug' => "faq",
                'h1' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.",
                'p' => "Molestiae omnis numquam corrupti omnis itaque. Voluptatum quidem impedit.",
                'h2' => '#',
                'img' => '#',
                'url' => '#',
            ],
            [
                'slug' => "faq",
                'h1' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.",
                'p' => "Molestiae omnis numquam corrupti omnis itaque. Voluptatum quidem impedit.",
                'h2' => '#',
                'img' => '#',
                'url' => '#',
            ],
            [
                'slug' => "faq",
                'h1' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.",
                'p' => "Molestiae omnis numquam corrupti omnis itaque. Voluptatum quidem impedit.",
                'h2' => '#',
                'img' => '#',
                'url' => '#',
            ],
            [
                'slug' => "faq",
                'h1' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.",
                'p' => "Molestiae omnis numquam corrupti omnis itaque. Voluptatum quidem impedit.",
                'h2' => '#',
                'img' => '#',
                'url' => '#',
            ],

            // contact us
            [
                'slug' => "contact_us",
                'h1' => "Call To Action",
                'h2' => '#',
                'p' => '#',
                'img' => '#',
                'url' => '#',
            ],
        ];
        DB::table('site_contents')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_contents');
    }
}
