<?php

namespace Database\Seeders;

use App\Models\PageSection;
use App\Models\SectionItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Loads the content that used to be hard-coded in the Blade views. A section
 * that already exists is skipped, so running this again never overwrites
 * edits made in the admin panel.
 */
class ContentSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            foreach ($this->content() as $page => $sections) {
                foreach ($sections as $key => $section) {
                    $this->seedSection($page, $key, $section['fields'] ?? [], $section['items'] ?? []);
                }
            }
        });
    }

    private function seedSection(string $page, string $key, array $fields, array $items): void
    {
        if (PageSection::where('page', $page)->where('key', $key)->exists()) {
            return;
        }

        $section = new PageSection(['page' => $page, 'key' => $key]);
        foreach ($fields as $name => $value) {
            $section->setValue($name, $value);
        }
        $section->save();

        $this->seedItems($section, $items);
    }

    private function seedItems(PageSection $section, array $items, ?SectionItem $parent = null): void
    {
        foreach (array_values($items) as $index => $values) {
            $children = $values['children'] ?? [];
            unset($values['children']);

            $item = new SectionItem;
            $item->page_section_id = $section->id;
            $item->parent_id = $parent?->id;
            $item->sort_order = $index + 1;
            $item->is_active = true;
            foreach ($values as $name => $value) {
                $item->setValue($name, $value);
            }
            $item->save();

            $this->seedItems($section, $children, $item);
        }
    }

    private function content(): array
    {
        $banner = 'assets/ghrweb/Sites/GHRWEB/HBanner/';
        $consultant = 'assets/ghrweb/Sites/GHRWEB/ConsultantLogo/';
        $benefitIcon = 'assets/ghrweb/Sites/GHRWEB/HPBenefitIcon/';
        $sunwaveGallery = 'assets/gallery/sunwave/';
        $sunwaveMap = 'https://www.google.com/maps/place/SUN+WAVE+Hotel+%2526+Resort/@21.819933,90.1134957,88m';
        $shopMap = 'https://www.google.com/maps/place/Nanova+Shop/@23.7918882,90.3745816,693m';
        $shopEmbed = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3018.5243907064155!2d90.37458157434405!3d23.791888187184185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7007be395d9%3A0x69c3942c6123b696!2sNanova%20Shop!5e1!3m2!1sen!2sbd!4v1782791732741!5m2!1sen!2sbd';
        $sunwaveEmbed = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3062.530842429796!2d90.1115905742801!3d21.819923460137776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30aa7d0010a370ff%3A0xeece9c284c4145c6!2sSUN%20WAVE%20Hotel%20%26%20Resort!5e1!3m2!1sen!2sbd!4v1782792451082!5m2!1sen!2sbd';
        $mirpurAddress = '971, East Sewrapara (2nd Floor), Begum Rokeya Sharani Road, Kafrul, Mirpur, Dhaka-1216';
        $brochure = 'assets/Home/GROUND FLOOR PLAN.pdf';
        $bestWestern = 'assets/bestWestern.webp';

        return [
            'layout' => [
                'brand' => ['fields' => ['image' => 'assets/logo.png', 'favicon' => 'assets/favicon.png']],
                'project_menu' => ['items' => [
                    ['title' => 'Hotel', 'children' => [
                        ['title' => 'SUN Wave Hotel & Resort', 'link_url' => '/project/hotel/sunwave'],
                    ]],
                    ['title' => 'Land'],
                    ['title' => 'Online Shop', 'children' => [
                        ['title' => 'Nanova Shop', 'link_url' => 'https://nanovashop.com'],
                    ]],
                    ['title' => 'ISP', 'children' => [
                        ['title' => 'Song Jozan Internet', 'link_url' => 'isp.html'],
                    ]],
                ]],
                'contact' => ['fields' => [
                    'body' => '971 Shewrapara, Begum Rokeya Soroni, Dhaka 1216, Bangladesh',
                    'hotline' => '+880 1945 484848',
                    'whatsapp' => '+880 1945 484848',
                    'link_url' => 'https://wa.me/8801945484848',
                    'image' => 'assets/payment.webp',
                    'copyright' => '© 2024 Nanova Groups. All rights reserved.',
                    'powered_by' => 'INFO CARE',
                    'powered_by_url' => 'https://infocarebd.com/',
                ]],
                'locations' => ['items' => [
                    ['title' => 'Sun Wave', 'link_url' => 'https://maps.app.goo.gl/zACeVdias7KHZ6qA8'],
                    ['title' => 'Nanova Shop', 'link_url' => 'https://maps.app.goo.gl/DwVmPuQSPo28qM8F9'],
                    ['title' => 'Songjozan'],
                ]],
                'social' => ['items' => [
                    ['title' => 'YouTube', 'link_url' => 'https://youtube.com', 'icon' => 'fa-brands fa-youtube', 'color' => '#FF0000'],
                    ['title' => 'Facebook', 'link_url' => 'https://facebook.com', 'icon' => 'fa-brands fa-facebook', 'color' => '#1877F2'],
                    ['title' => 'LinkedIn', 'link_url' => 'https://linkedin.com', 'icon' => 'fa-brands fa-linkedin', 'color' => '#0077B5'],
                    ['title' => 'Instagram', 'link_url' => 'https://instagram.com', 'icon' => 'fa-brands fa-instagram', 'color' => '#E1306C'],
                ]],
                'seo' => ['fields' => [
                    'title' => 'Number One Hotel Developer Company in Bangladesh',
                    'body' => 'Learn about Nanova Groups, a leading real estate and hospitality development company in Bangladesh. We build premium projects with innovation, quality, and long-term value.',
                    'keywords' => 'Nanova Groups, hotel developer Bangladesh, luxury hotels, real estate Bangladesh, hospitality investment, premium projects Bangladesh',
                    'image' => 'https://nanovagroups.com/assets/logo.webp',
                ]],
            ],

            'home' => [
                'hero' => ['items' => [
                    ['image' => $banner.'Sunwave-View.jpg', 'title' => 'be83d9a7-2c42-41ee-aa27-70e4471e560f.jpg'],
                    ['image' => $banner.'Sunwave-front-view.jpg', 'title' => 'c20bd026-2250-4ce6-a369-70fac3bc97fc.jpg'],
                    ['image' => $banner.'couple-suite.jpg', 'title' => '1cd673c3-85f0-40f7-b6b8-3a780c7f59de.jpg'],
                ]],
                'categories' => ['items' => [
                    ['image' => 'assets/Hotel.gif', 'title' => 'Hotel'],
                    ['image' => 'assets/Building.gif', 'title' => 'Online'],
                    ['image' => 'assets/Land.gif', 'title' => 'Land'],
                ]],
                'about' => ['fields' => [
                    'title' => 'Who we are ?',
                    'body' => 'Nanova Groups is Bangladesh’s top hotel development and investment company, dedicated to quality and precision in every project. We guide our partners and investors toward consistent growth and high profits by streamlining our development processes. Our primary mission is to build world-class hotels and suites in Cox’s Bazar, the world\'s longest beach, and Kuakata, a scenic paradise on the Bay of Bengal. By designing projects with unique, customer-focused features, we secure valuable ventures with excellent profit-sharing for our owners. Our team of experts supports you through every single phase—from your initial investment idea to the hotel\'s grand opening—to guarantee an economically stable and highly successful business that boosts local tourism.',
                    'image' => 'assets/main-logo.png',
                    'button_text' => 'We Work With',
                ]],
                'concerns' => ['items' => [
                    ['image' => 'assets/nanovashop.png', 'title' => 'Nanova Shop', 'width' => '75%'],
                    ['image' => 'assets/sunwave.png', 'title' => 'Sun Wave'],
                    ['image' => 'assets/songjozan.png', 'title' => 'Songjozan', 'width' => '70%'],
                ]],
                'partners' => ['items' => array_map(
                    fn (string $file) => ['image' => $consultant.$file, 'title' => 'brand name'],
                    ['infocare.jpg', '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg']
                )],
                'projects' => [
                    'fields' => ['title' => 'Our Project Overview'],
                    'items' => [[
                        'image' => 'assets/ghrweb/Sites/GHRWEB/ProjectMainImg/sun-wave.jpg',
                        'title' => 'Sun Wave Hotel & Resort',
                        'body' => "Sun Wave Hotel & Resort is a promising and modern hotel-resort project in the tourism industry of Bangladesh.\n\nOur journey began with the aim of ensuring comfortable accommodation, quality service, and safe hospitality for tourists. We believe that a hotel is not just a place to stay; it is a part of joy, comfort, and memorable experiences for travelers.\n\nOur goal is to develop world-class hotel and resort facilities in an important tourist destination like Kuakata. Ensuring improved accommodation, a clean environment, modern facilities, and sincere service for guests is our main commitment.\n\nWith the dream of contributing to the development of the tourism industry, creating employment opportunities, and supporting the economic progress of the country, Sun Wave Hotel & Resort is moving forward. We expect that this project will become a trusted name among local and international tourists in the future.",
                        'link_url' => '/project/hotel/sunwave',
                        'brochure' => $brochure,
                        'map_url' => $sunwaveMap,
                        'video_url' => 'https://www.youtube.com/watch?v=APCsrnYlGUs',
                        'gallery_image' => 'assets/ghrweb/Sites/GHRWEB/ProjectImg/29052f41-acab-4c09-ae4d-93ae090cf612.jpg',
                    ]],
                ],
                'why_invest' => [
                    'fields' => [
                        'title' => 'Why Should You Invest in Nanova Groups ?',
                        'image' => 'assets/ghrweb/Sites/GHRWEB/assets/7bf67fc3-1cc8-42cd-8bc2-aecca177107f.jpg',
                        'link_url' => 'https://www.youtube.com/watch?v=APCsrnYlGUs',
                    ],
                    'items' => [
                        ['title' => 'Kuakata is one of the most promising tourist destinations in Bangladesh, where the number of local and international tourists is increasing every year.'],
                        ['title' => 'Keeping this growing tourism potential in mind, Sun Wave Hotel & Resort is creating an attractive opportunity for investors as a modern, quality-focused, and well-planned hotel-resort project.'],
                        ['title' => 'By investing in this project, investors will get the opportunity to become part of a promising initiative in the tourism sector.'],
                        ['title' => 'With a prime location, modern infrastructure, professional management, and a transparent ownership policy, the project has the potential to become a valuable long-term asset.'],
                        ['title' => 'We give the highest importance to investor confidence, project quality, and sustainable development.'],
                        ['title' => 'With the growth of Kuakata’s tourism industry, we expect this project to be established in the future as a prestigious and promising investment opportunity.'],
                    ],
                ],
                'benefits' => [
                    'fields' => ['title' => 'Ownership Benefits'],
                    'items' => [
                        ['image' => $benefitIcon.'icon-4.png', 'title' => 'Facility for registered sub-deed ownership of the hotel unit including land.'],
                        ['image' => $benefitIcon.'icon-1.png', 'title' => 'Ownership will be saleable and transferable, ensuring that your investment remains secure and future-oriented.'],
                        ['image' => $benefitIcon.'icon-5.png', 'title' => 'Special privilege to spend holidays with family in your own hotel.'],
                        ['image' => $benefitIcon.'icon-2.png', 'title' => 'Priority room usage facility along with potential income opportunities.'],
                        ['image' => $benefitIcon.'icon-6.png', 'title' => 'An opportunity to own a prestigious asset in the tourist city of Kuakata.'],
                        ['image' => $benefitIcon.'icon-3.png', 'title' => 'Possibility to enhance social status and establish yourself as an entrepreneur in the tourism sector.'],
                        ['image' => $benefitIcon.'ffb0e29a-f355-4204-a13f-5687f3e4ec09.jpg', 'title' => 'A modern investment opportunity that offers long-term assets, regular income potential, and family security.'],
                    ],
                ],
                'team' => [
                    'fields' => ['title' => 'Our Team'],
                    'items' => [
                        ['image' => 'assets/md.jpg', 'title' => 'MD. Ziaul Khan', 'subtitle' => 'Managing Director (MD)'],
                        ['image' => 'assets/akbor.png', 'title' => 'Akbor Hossen', 'subtitle' => 'Head of Marketing'],
                        ['image' => 'assets/technical-engineer.jpg', 'title' => 'Anisur Rahman', 'subtitle' => 'Chief Engineer'],
                        ['image' => 'assets/romana.jpg', 'title' => 'Romana Prodhan', 'subtitle' => 'HR Admin'],
                        ['title' => 'Aowal Hossan', 'subtitle' => 'Senior Technical Expert'],
                        ['image' => 'assets/limon.png', 'title' => 'Limon Hasan', 'subtitle' => 'Senior Technical Expert'],
                        ['image' => 'assets/rahat.jpg', 'title' => 'Md. Rahat Hossain', 'subtitle' => 'Assistant Marketing'],
                        ['image' => 'assets/shihab.jpeg', 'title' => 'Md. Shihab', 'subtitle' => 'Technical Assistant'],
                        ['image' => 'assets/khorshed_Alom.jpg', 'title' => 'Khorshed Alom', 'subtitle' => 'Sales Executive'],
                        ['image' => 'assets/mahfijur.jpg', 'title' => 'Mahfijur Rahman Jewel', 'subtitle' => 'Sales Executive'],
                    ],
                ],
            ],

            'about' => [
                'intro' => ['fields' => [
                    'title' => 'We Are Nanova Groups',
                    'body' => 'Nanova Groups is Bangladesh’s number one hotel developer and investment company, shaping the future of hospitality, tourism, and real estate since 2015. Alongside premium hotel projects like Best Western Plus Bay Hills Himchhari, Bay Sands, Bay Marina, and Bay Breeze, we have also developed landmark residential projects, including Amin City Purbachol and Gold City Mawa. Driven by quality, innovation, and long-term vision, we create profitable investment opportunities that combine luxury, trust, and sustainable growth. Through legally secured ownership, we make premium property and hotel investments accessible for everyday Bangladeshis — creating a trusted path toward long-term asset value.',
                    'image' => 'assets/ghrweb/Sites/GHRWEB/AboutPageImg/e8a1b74d-3dac-4c67-b29a-dc0d6914b479.jpg',
                ]],
                'sister_concern' => [
                    'fields' => ['title' => 'Nanova Groups SISTER CONCERN', 'image' => 'assets/main-logo.png'],
                    'items' => [
                        ['title' => 'Sun Wave Hotel & Resort', 'subtitle' => 'A Trusted Destination for memorable moments'],
                        ['title' => 'Nanova Project management', 'subtitle' => "Nanova Project Management specializes in comprehensive and efficient project execution\r\nPioneering"],
                        ['title' => 'Nanova Shop', 'subtitle' => 'Nanova Shop introduces a Huge amount of Products store in Dhaka'],
                    ],
                ],
                'mission' => [
                    'fields' => ['title' => 'OUR MISSION', 'image' => 'assets/ArrowAndGoal.webp', 'bullet' => 'assets/reshot-icon-list.svg'],
                    'items' => [
                        ['title' => 'To Ensure High Quality Product With Most Modern & Innovation Concept'],
                        ['title' => 'To Grow the Economy by Reducing Poverty & Unemployment.'],
                        ['title' => 'To Create Tension Free Source of Income by Providing the Opportunities of Guaranteed & Safe Investment Return.'],
                        ['title' => 'To Give Most Priority and Ensure Best Service to our Clients.'],
                        ['title' => 'To make Bangladesh as one of the top Tourism Country in the World.'],
                        ['title' => 'To Make the Nation Prestigious & Wealthy.'],
                    ],
                ],
                'vision' => ['fields' => [
                    'title' => 'OUR  VISION',
                    'body' => 'Join us on this journey as we redefine real estate standards, transform spaces into homes, source of halal income  and create environments that inspire progress. Together, we are architects of dreams, shaping a future where Nanova Groups is synonymous with excellence, compassion, and the realization of aspirations. Welcome to a world where your real estate goals become our shared vision for a brighter tomorrow. Nanova Groups stands as a symbol of trust, innovation, and integrity. We aspire to be the go-to real estate partner, recognized for our unwavering commitment to understanding and meeting the unique needs of our clients.',
                    'image' => 'assets/ghrweb/Sites/GHRWEB/AboutPageImg/f05a06f0-f7b6-426b-b196-98405a96b28c.jpg',
                ]],
                'values' => [
                    'fields' => ['title' => 'VALUES'],
                    'items' => array_map(fn (string $value) => ['image' => 'assets/social-care.gif', 'title' => $value], [
                        'Always Customer first-Customer Priority-Customer Focused',
                        'Sharing both happiness & sadness',
                        'Respect & Responsibility',
                        'Honesty, Caring & Trust',
                        'Passion, Dedicated, Professional & Commitment',
                        'Courageous, Embrace Change & Innovate',
                        'Positive Mind never give-up & believe in growth.',
                        'Work for Success',
                        'Self Discipline, Focused, Hard Working, Achieve Goals',
                        'We believe in our people, Develop & Empower them',
                        'Compliance, legal authority & Environment',
                        'Positive Mind never give-up & believe in growth',
                    ]),
                ],
                'csr' => ['fields' => [
                    'title' => 'Social Responsibility',
                    'body' => 'As an integral aspect of our Corporate Social Responsibility, Nanova Groups actively participates in various charitable initiatives, community volunteering endeavors, and implements corporate policies that contribute to environmental well-being through diverse programs. Here at Nanova, we give great importance to Corporate Social Responsibility (CSR). Nanova undertakes business activities which benefit not only our company and our clients, but also the economy, the society that we live in and our surrounding environment simultaneously. The idea behind Corporate Social Responsibility is to create a framework that encourages responsible behavior by businesses, and Nanova Hotels & Resorts Ltd. intends to adhere to this ideology. We strive to keep social progress, protection of the environment and careful use of natural resources at the forefront when determining our business objectives, so that a superior standard of living is ensured for present and future generations.',
                    'image' => 'assets/ghrweb/Sites/GHRWEB/CSRPageImg/5b47407a-3f3d-47b4-ae8d-51e382821fca.jpg',
                ]],
            ],

            'sunwave' => [
                'banner' => ['fields' => ['image' => 'assets/ghrweb/Sites/GHRWEB/ProjectBanner/2eace455-2f4f-4199-8712-500fc21d0dca.jpg']],
                'intro' => ['fields' => [
                    'title' => 'Sun Wave Hotel and Resort',
                    'body' => "Kuakata is a highly promising tourist destination in the southern region of Bangladesh, located in Patuakhali District. It is becoming increasingly popular among local and international tourists due to its sea beach and natural beauty.\n\nAfter Cox’s Bazar, Kuakata is known as one of the most attractive sea beaches in Bangladesh. It offers the rare opportunity to enjoy both sunrise and sunset from the same location, which gives Kuakata a unique position on the tourism map of the country.\n\nConsidering this potential, Sun Wave Hotel & Resort has taken the initiative to develop a modern, attractive, and international-standard hotel-resort project in Kuakata.\n\nOur main objective is to ensure safe, comfortable, and enjoyable accommodation facilities for tourists, while also creating a profitable and reliable investment opportunity for investors.",
                    'image' => $banner.'Sunwave-front-view.jpg',
                    'link_url' => $sunwaveMap.'/data',
                    'brochure' => $brochure,
                    'popup_title' => 'Sun Wave Hotel & Resort',
                    'popup_body' => 'Sun Wave Hotel and Resort, Kuakata is the iconic flagship 4-star property by Nanova Group. Located in scenic Kuakata, this upscale hotel is a masterpiece of modern architecture, elegant decor, and luxury amenities. Guests can look forward to world-class, professional service that makes every leisure moment unforgettable. Nestled perfectly between the hills and the sea, the hotel offers a uniquely breathtaking view of the Bay of Bengal, panoramic mountain waterfalls, and lush greenery.',
                    'popup_image' => $banner.'Sunwave-front-view.jpg',
                ]],
                'ownership' => [
                    'fields' => [
                        'title' => 'CATEGORY OF OWNERSHIP',
                        'image' => $banner.'couple-suite.jpg',
                        'full_image' => 'assets/ExecutiveSuite.webp',
                        'subtitle' => 'Single & Multiple Ownership',
                    ],
                    'items' => [
                        ['title' => 'Standard Suite', 'subtitle' => '630-720 sft.'],
                        ['title' => 'Executive Suite', 'subtitle' => '750-780 sft.'],
                        ['title' => 'Presidential Suite', 'subtitle' => '1950 sft.'],
                        ['title' => 'Family Suite', 'subtitle' => '2280 sft.'],
                    ],
                ],
                'objectives' => [
                    'fields' => ['title' => 'Sun Wave Hotel & Resort Objectives', 'image' => $bestWestern],
                    'items' => [
                        ['title' => 'The main goal of Sun Wave Hotel & Resort is to utilize the tourism potential of Kuakata and build a modern, safe, and high-quality hotel-resort project.'],
                        ['title' => 'We are committed to ensuring comfortable accommodation, improved services, and enjoyable travel experiences for our respected guests.'],
                        ['title' => 'At the same time, one of our key objectives is to create a transparent, secure, and profitable investment opportunity for investors.'],
                        ['title' => 'Through this project, we expect to play a positive role in the development of Kuakata’s tourism industry, employment generation, and the economic progress of the country.'],
                    ],
                ],
                'comparison' => [
                    'fields' => ['title' => 'Comparative Discussion', 'image' => $bestWestern],
                    'items' => [
                        ['title' => 'Most hotel shares are sold in large numbers, usually ranging from 8,000 to 15,000 small shares. However, the total number of hotel rooms is usually not more than 200 to 250.'],
                        ['title' => 'When the share value is very low, ensuring profit according to that share becomes difficult and unrealistic.'],
                    ],
                ],
                'difference' => [
                    'fields' => ['title' => 'Difference', 'image' => $bestWestern],
                    'items' => [
                        ['title' => 'In our project, room-based shares will be provided. The room owners will remain connected with the hotel management system.'],
                        ['title' => 'As a result, they will be able to know which room was rented, for how many days, and at what rate.'],
                        ['title' => 'At the end of the year, your specific profit share will be sent to your account.'],
                        ['title' => 'We have divided each room into a maximum of five shares.'],
                        ['title' => 'If any customer wants to take a loan, arrangements will be made for that as well.'],
                    ],
                ],
                'photos' => [
                    'fields' => ['title' => 'Photo Gallery'],
                    'items' => [
                        ['image' => $sunwaveGallery.'sun-wave.jpg', 'title' => 'Sun View Hotel and Resort', 'subtitle' => 'Sun Wave Hotel & Resort'],
                        ['image' => $sunwaveGallery.'sunwave-view.jpg', 'title' => 'Sun View Hotel and Resort', 'subtitle' => 'Sun View'],
                        ...array_map(
                            fn (string $file) => ['image' => $sunwaveGallery.$file, 'title' => 'Couple Room'],
                            ['8.jpg', '9.jpg', '11.jpg', '12.jpg', '13.jpg', '14.jpg', '15.jpg', '16.jpg', '17.jpg', '18.jpg', '26.jpg', '28.jpg']
                        ),
                    ],
                ],
                'videos' => ['fields' => [
                    'title' => 'Video Gallery Now',
                    'link_url' => 'https://www.youtube.com/embed/APCsrnYlGUs?si=x7NWaqEza1kkBLM-',
                ]],
            ],

            'project_detail' => [
                'floor_plans' => ['items' => [
                    ['image' => 'assets/brochure/BASEMENT_FLOOR_PLAN.jpg', 'title' => 'BASEMENT FLOOR PLAN'],
                    ['image' => 'assets/brochure/GROUND_FLOOR_PLAN.jpg', 'title' => 'GROUND FLOOR PLAN'],
                    ['image' => 'assets/brochure/1ST_FLOOR_PLAN.jpg', 'title' => '1ST FLOOR PLAN'],
                    ['image' => 'assets/brochure/2ND_TO_5TH_FLOOR_PLAN.jpg', 'title' => '2ND To 5TH FLOOR PLAN'],
                    ['image' => 'assets/brochure/5TH_FLOOR_PLAN-1.jpg', 'title' => '5TH FLOOR PLAN 1'],
                    ['image' => 'assets/brochure/5TH_FLOOR_PLAN.jpg', 'title' => '5TH FLOOR PLAN'],
                    ['image' => 'assets/brochure/8TH_FLOOR_PLAN.jpg', 'title' => '8TH FLOOR PLAN'],
                    ['image' => 'assets/brochure/9TH_FLOOR_PLAN.jpg', 'title' => '9TH FLOOR PLAN'],
                ]],
            ],

            'gallery' => [
                'images' => [
                    'fields' => ['title' => 'Our Gallery'],
                    'items' => [
                        ['image' => $banner.'Sunwave-View.jpg', 'title' => 'Sun Wave View'],
                        ['image' => $banner.'Sunwave-front-view.jpg', 'title' => 'Sun Wave Front View'],
                        ['image' => $banner.'couple-suite.jpg', 'title' => 'Couple Suite'],
                        ...array_map(
                            fn (string $file) => ['image' => $sunwaveGallery.$file, 'title' => 'Couple Suite'],
                            ['11.jpg', '12.jpg', '13.jpg', '18.jpg', '26.jpg', '28.jpg', '1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '20.png', 'image-1.jpg', 'image-2.jpg', 'image-3.jpg', 'image-4.jpg']
                        ),
                    ],
                ],
            ],

            'contact' => [
                'hero' => ['fields' => ['image' => 'assets/ghrweb/Sites/GHRWEB/ContactPageImg/contact-hero.jpg']],
                'intro' => ['fields' => [
                    'title' => 'CONTACT US',
                    'subtitle' => 'Got a question? We’re just a message away at Nanova Groups Ltd."',
                ]],
                'cards' => ['items' => [
                    ['image' => 'assets/phone-icon.webp', 'title' => 'CALL US', 'subtitle' => '+880 1945 484848', 'link_url' => 'tel:8801945484848', 'button_text' => 'Call'],
                    ['image' => 'assets/email.webp', 'title' => 'EMAIL', 'subtitle' => 'nanovagroups@gmail.com', 'link_url' => 'mailto:nanovagroups@gmail.com', 'button_text' => 'Email'],
                    ['image' => 'assets/whatsapp.webp', 'title' => 'WHATS APP', 'subtitle' => '+880 1945 484848', 'link_url' => 'https://wa.me/8801945484848', 'button_text' => 'Whats App'],
                    ['image' => 'assets/career.webp', 'title' => 'CAREER', 'subtitle' => 'nanovagroups@gmail.com', 'link_url' => 'mailto:nanovagroups@gmail.com', 'button_text' => 'Email'],
                ]],
                'branches' => [
                    'fields' => ['title' => 'Get in touch with us for More Information'],
                    'items' => [
                        ['title' => 'Head Office', 'body' => $mirpurAddress, 'email' => 'info@nanovagroups.com', 'cell' => '+880 1945 484848', 'hotline' => '+880 1945 484848', 'map_embed' => $shopEmbed, 'link_url' => $shopMap],
                        ['title' => 'Corporate Office', 'body' => 'House#75, Road#06, Block# C, Banani, Dhaka-1213, Bangladesh', 'email' => 'info@nanovagroups.com', 'cell' => '+880 1945 484848', 'hotline' => '+880 1945 484848', 'map_embed' => $shopEmbed, 'link_url' => $shopMap],
                        ['title' => 'SUN WAVE Hotel & Resort', 'body' => 'kuakata, Pourashava, Ward-3, Kalapara, Mohipur, Patuakhali', 'email' => 'info@nanovagroups.com', 'cell' => '01945-484848', 'hotline' => '01945-484848', 'map_embed' => $sunwaveEmbed, 'link_url' => 'https://www.google.com/maps/place/SUN+WAVE+Hotel+%2526+Resort/@21.8199235,90.1115906,703m'],
                        ['title' => 'Nanova Shop', 'body' => $mirpurAddress, 'email' => 'nanovashopbd@gmail.com', 'cell' => '01923-464646', 'hotline' => '01923-464646', 'map_embed' => $shopEmbed, 'link_url' => $shopMap],
                        ['title' => 'Sangzojan Internet', 'body' => $mirpurAddress, 'email' => 'support@sangjozan.com', 'cell' => '01942-464646', 'hotline' => '01942-464646', 'map_embed' => $shopEmbed, 'link_url' => $shopMap],
                    ],
                ],
                'form' => ['fields' => ['title' => 'CONTACT FORM']],
            ],
        ];
    }
}
