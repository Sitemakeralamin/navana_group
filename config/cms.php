<?php

/*
| Editable content of the public site. Every page lists its sections in the
| order they appear on screen. A section has its own fields and, when it holds
| a repeating list (slides, team members, logos...), an "items" definition.
|
| Field types: text, textarea, url, image, file.
| Fields named title, subtitle, body, image, link_url are stored in columns;
| anything else is kept in the row's meta JSON.
*/

$text = fn (string $label) => ['label' => $label, 'type' => 'text'];
$area = fn (string $label) => ['label' => $label, 'type' => 'textarea'];
$url = fn (string $label) => ['label' => $label, 'type' => 'url'];
$image = fn (string $label = 'Image') => ['label' => $label, 'type' => 'image'];
$file = fn (string $label) => ['label' => $label, 'type' => 'file'];

$bulletList = fn (string $sectionLabel) => [
    'label' => $sectionLabel,
    'fields' => ['title' => $text('Heading'), 'image' => $image('Logo above heading')],
    'items' => ['label' => 'Point', 'fields' => ['title' => $area('Text')]],
];

return [

    'upload_dir' => 'assets/uploads',

    'pages' => [

        'home' => [
            'label' => 'Home',
            'url' => '/',
            'sections' => [
                'hero' => [
                    'label' => 'Banner slider',
                    'items' => ['label' => 'Slide', 'fields' => ['image' => $image('Slide image'), 'title' => $text('Image description')]],
                ],
                'categories' => [
                    'label' => 'Business categories',
                    'items' => ['label' => 'Category', 'fields' => ['image' => $image('Animated image'), 'title' => $text('Name')]],
                ],
                'about' => [
                    'label' => 'Who we are',
                    'fields' => [
                        'title' => $text('Heading'),
                        'body' => $area('Text'),
                        'image' => $image('Company logo'),
                        'button_text' => $text('Partners label'),
                    ],
                ],
                'concerns' => [
                    'label' => 'Sister concern logos',
                    'items' => ['label' => 'Logo', 'fields' => ['image' => $image('Logo'), 'title' => $text('Name'), 'link_url' => $url('Link'), 'width' => $text('Logo width, e.g. 75%')]],
                ],
                'partners' => [
                    'label' => 'We work with',
                    'items' => ['label' => 'Partner', 'fields' => ['image' => $image('Logo'), 'title' => $text('Name')]],
                ],
                'projects' => [
                    'label' => 'Project overview',
                    'fields' => ['title' => $text('Heading')],
                    'items' => [
                        'label' => 'Project',
                        'fields' => [
                            'image' => $image('Project image'),
                            'title' => $text('Project name'),
                            'body' => $area('Description'),
                            'link_url' => $url('Learn More link'),
                            'brochure' => $file('Brochure (PDF)'),
                            'map_url' => $url('Google Maps link'),
                            'video_url' => $url('YouTube link'),
                            'gallery_image' => $image('Gallery preview image'),
                        ],
                    ],
                ],
                'why_invest' => [
                    'label' => 'Why invest',
                    'fields' => [
                        'title' => $text('Heading'),
                        'image' => $image('Video cover image'),
                        'link_url' => $url('YouTube link'),
                    ],
                    'items' => ['label' => 'Point', 'fields' => ['title' => $area('Text')]],
                ],
                'benefits' => [
                    'label' => 'Ownership benefits',
                    'fields' => ['title' => $text('Heading')],
                    'items' => ['label' => 'Benefit', 'fields' => ['image' => $image('Icon image'), 'title' => $area('Text')]],
                ],
                'project_gallery' => [
                    'label' => 'Our projects (photos come from the Gallery page)',
                    'fields' => ['title' => $text('Heading'), 'button_text' => $text('Gallery button text')],
                ],
            ],
        ],

        'about' => [
            'label' => 'About Us',
            'url' => '/aboutus',
            'sections' => [
                'intro' => [
                    'label' => 'We are Nanova Commercial',
                    'fields' => ['title' => $text('Heading'), 'body' => $area('Text'), 'image' => $image()],
                ],
                'sister_concern' => [
                    'label' => 'Sister concern',
                    'fields' => ['title' => $text('Heading'), 'image' => $image('Logo')],
                    'items' => [
                        'label' => 'Concern',
                        'fields' => [
                            'title' => $text('Name'),
                            'phone' => $text('Phone'),
                            'email' => $text('Email'),
                            'website' => $text('Website'),
                            'address' => $text('Address'),
                        ],
                    ],
                ],
                'mission' => [
                    'label' => 'Our mission',
                    'fields' => ['title' => $text('Heading'), 'image' => $image(), 'bullet' => $image('Bullet image')],
                    'items' => ['label' => 'Point', 'fields' => ['title' => $area('Text')]],
                ],
                'vision' => [
                    'label' => 'Our vision',
                    'fields' => ['title' => $text('Heading'), 'body' => $area('Text'), 'image' => $image()],
                ],
                'values' => [
                    'label' => 'Values',
                    'fields' => ['title' => $text('Heading')],
                    'items' => ['label' => 'Value', 'fields' => ['image' => $image('Icon image'), 'title' => $text('Text')]],
                ],
                'csr' => [
                    'label' => 'Social responsibility',
                    'fields' => ['title' => $text('Heading'), 'body' => $area('Text'), 'image' => $image()],
                ],
            ],
        ],

        'sunwave' => [
            'label' => 'Sun Wave Hotel & Resort',
            'url' => '/project/hotel/sunwave',
            'sections' => [
                'banner' => [
                    'label' => 'Banner',
                    'fields' => ['image' => $image('Banner image')],
                ],
                'intro' => [
                    'label' => 'Introduction',
                    'fields' => [
                        'title' => $text('Heading'),
                        'body' => $area('Text'),
                        'image' => $image('Side image'),
                        'link_url' => $url('Google Maps link'),
                        'brochure' => $file('Brochure (PDF)'),
                        'popup_title' => $text('Learn More heading'),
                        'popup_body' => $area('Learn More text'),
                        'popup_image' => $image('Learn More image'),
                    ],
                ],
                'places' => [
                    'label' => 'Important places (slider beside the introduction)',
                    'items' => [
                        'label' => 'Place',
                        'fields' => ['title' => $text('Place name')],
                        'children' => [
                            'label' => 'Photo',
                            'fields' => ['image' => $image('Photo'), 'title' => $text('Caption')],
                        ],
                    ],
                ],
                'ownership' => [
                    'label' => 'Category of ownership',
                    'fields' => [
                        'title' => $text('Heading'),
                        'image' => $image('Preview image'),
                        'full_image' => $image('Image opened on click'),
                        'subtitle' => $text('Ownership type'),
                    ],
                    'items' => ['label' => 'Suite', 'fields' => ['title' => $text('Suite name'), 'subtitle' => $text('Size')]],
                ],
                'objectives' => $bulletList('Objectives'),
                'comparison' => $bulletList('Comparative discussion'),
                'difference' => $bulletList('Difference'),
                'photos' => [
                    'label' => 'Photo gallery',
                    'fields' => ['title' => $text('Heading')],
                    'items' => ['label' => 'Photo', 'fields' => ['image' => $image('Photo'), 'title' => $text('Image description'), 'subtitle' => $text('Caption on photo')]],
                ],
                'videos' => [
                    'label' => 'Video gallery',
                    'fields' => ['title' => $text('Heading'), 'link_url' => $url('YouTube embed link')],
                ],
            ],
        ],

        'project_detail' => [
            'label' => 'Project Details',
            'url' => '/project-detail',
            'sections' => [
                'floor_plans' => [
                    'label' => 'Floor plans',
                    'fields' => ['title' => $text('Book cover title')],
                    'items' => ['label' => 'Floor plan', 'fields' => ['image' => $image('Plan image'), 'title' => $text('Caption')]],
                ],
            ],
        ],

        'gallery' => [
            'label' => 'Gallery',
            'url' => '/gallery',
            'sections' => [
                'images' => [
                    'label' => 'Gallery',
                    'fields' => ['title' => $text('Heading')],
                    'items' => ['label' => 'Photo', 'fields' => ['image' => $image('Photo'), 'title' => $text('Caption')]],
                ],
            ],
        ],

        'condominium' => [
            'label' => 'Nanova Condominium',
            'url' => '/project/condominium',
            'sections' => [
                'intro' => [
                    'label' => 'Introduction',
                    'fields' => [
                        'title' => $text('Project name'),
                        'subtitle' => $text('Status'),
                        'body' => $area('Description'),
                        'image' => $image('Main image'),
                        'image_caption' => $text('Image caption'),
                        'location' => $text('Location'),
                    ],
                ],
                'facts' => [
                    'label' => 'Project facts',
                    'items' => ['label' => 'Fact', 'fields' => ['title' => $text('Label'), 'subtitle' => $text('Value')]],
                ],
                'features' => [
                    'label' => 'Features',
                    'fields' => ['title' => $text('Heading')],
                    'items' => ['label' => 'Feature', 'fields' => ['title' => $text('Name'), 'body' => $area('Text')]],
                ],
                'contact' => [
                    'label' => 'Booking contact',
                    'fields' => [
                        'title' => $text('Heading'),
                        'phone' => $text('Phone'),
                        'email' => $text('Email'),
                        'address' => $text('Address'),
                    ],
                ],
            ],
        ],

        'contact' => [
            'label' => 'Contact Us',
            'url' => '/contact',
            'sections' => [
                'hero' => [
                    'label' => 'Banner',
                    'fields' => ['image' => $image('Banner image')],
                ],
                'intro' => [
                    'label' => 'Heading',
                    'fields' => ['title' => $text('Heading'), 'subtitle' => $text('Sub heading')],
                ],
                'cards' => [
                    'label' => 'Contact cards',
                    'items' => [
                        'label' => 'Card',
                        'fields' => [
                            'image' => $image('Icon image'),
                            'title' => $text('Heading'),
                            'subtitle' => $text('Value shown'),
                            'link_url' => $url('Button link'),
                            'button_text' => $text('Button text'),
                        ],
                    ],
                ],
                'branches' => [
                    'label' => 'Offices',
                    'fields' => ['title' => $text('Heading')],
                    'items' => [
                        'label' => 'Office',
                        'fields' => [
                            'title' => $text('Office name'),
                            'body' => $area('Address'),
                            'email' => $text('Email'),
                            'cell' => $text('Cell'),
                            'hotline' => $text('Hotline'),
                            'map_embed' => $url('Google Maps embed link'),
                            'link_url' => $url('Google Maps link'),
                        ],
                    ],
                ],
                'form' => [
                    'label' => 'Contact form',
                    'fields' => ['title' => $text('Heading')],
                ],
            ],
        ],
        'layout' => [
            'label' => 'Header & footer',
            'url' => '/',
            'sections' => [
                'brand' => [
                    'label' => 'Logo',
                    'fields' => ['image' => $image('Logo'), 'favicon' => $image('Browser tab icon')],
                ],
                'project_menu' => [
                    'label' => 'Our Projects menu',
                    'items' => [
                        'label' => 'Category',
                        'fields' => ['title' => $text('Category name'), 'link_url' => $url('Link (used when the category has no project links)')],
                        'children' => [
                            'label' => 'Project link',
                            'fields' => ['title' => $text('Project name'), 'link_url' => $url('Link')],
                        ],
                    ],
                ],
                'contact' => [
                    'label' => 'Footer contact',
                    'fields' => [
                        'body' => $area('Address'),
                        'hotline' => $text('Hotline'),
                        'whatsapp' => $text('WhatsApp number'),
                        'link_url' => $url('WhatsApp link'),
                        'image' => $image('Payment methods image'),
                        'copyright' => $text('Copyright line'),
                        'powered_by' => $text('Powered by'),
                        'powered_by_url' => $url('Powered by link'),
                    ],
                ],
                'locations' => [
                    'label' => 'Footer locations',
                    'items' => ['label' => 'Location', 'fields' => ['title' => $text('Name'), 'link_url' => $url('Google Maps link')]],
                ],
                'social' => [
                    'label' => 'Social links',
                    'items' => [
                        'label' => 'Social link',
                        'fields' => [
                            'title' => $text('Platform'),
                            'link_url' => $url('Profile link'),
                            'icon' => $text('Font Awesome class'),
                            'color' => $text('Colour'),
                        ],
                    ],
                ],
                'seo' => [
                    'label' => 'Search & sharing',
                    'fields' => [
                        'title' => $text('Meta title'),
                        'body' => $area('Meta description'),
                        'keywords' => $area('Keywords'),
                        'image' => $image('Share image'),
                    ],
                ],
            ],
        ],
    ],
];
