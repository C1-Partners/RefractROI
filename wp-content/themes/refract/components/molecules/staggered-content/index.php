<?php

$defaults = [
  "content" => [
    "title" => [
      "content" => [
        "main" => '',
        "url" => '',
        "target" => '_self'
      ],
      "style" => [
        "container" => 'h1',
        "color_words" => 0,
        "color" => 'teal',
        "color_position" => 'first',
        "border" => FALSE,
        "class" => '',
        "id" => '',
        "attrs" => []
      ]
    ],
    "text" => ''
  ],
  "acf_obj" => [],
  "image-content" => [
		"src" => "",
		"alt" => ""
	],
  "counter" => [
    "number" => 0,
  ],
  "link" => [
    "acf_link" => "",
  ],
  "style" => [
    "divider" => FALSE,
    "icon"    => '',
    "class"   => '',
    "id"      => '',
    "attrs"   => []
  ]
];

gsc_define("staggered-content", $defaults, function($data) {
  $title = $data["content"]["title"];
  $image = $data["image-content"];
  $text = $data["content"]["text"];
  $icon = $data["style"]["icon"];
  $counter = $data["counter"]["number"];
  $acf_link = $data["link"]["acf_link"];
  $acf_obj = $data["acf_obj"];

  $class = "";
  if (!empty($data["style"]["class"])) {
    $class .= $data["style"]["class"];
  }
  if ($data["style"]["divider"]) {
    $class .= " staggered-content--divider";
  }

  $class = "class='staggered-content $class'";

  $id = "";
  if (!empty($data["style"]["id"])) {
    $id = "id='{$data["style"]["id"]}'";
  }

  $misc_attrs = "";
  if (!empty($data["style"]["attrs"])) {
    foreach ($data["style"]["attrs"] as $attr_name=>$attr_value) {
      $misc_attrs .= "$attr_name='$attr_value' ";
    }
  }
  $title_html = "";
  if (!empty($data["content"]["title"]["content"]["main"])) {
    $title_html =  gsc("title", [
      "content" => [
        "main"    => $data["content"]["title"]["content"]["main"],
        "url"     => $data["content"]["title"]["content"]["url"],
        "target"  => $data["content"]["title"]["content"]["target"]
      ],
      "style" => [
        "container"       => $data["content"]["title"]["style"]["container"],
        "color_words"     => $data["content"]["title"]["style"]["color_words"],
        "color"           => $data["content"]["title"]["style"]["color"],
        "color_position"  => $data["content"]["title"]["style"]["color_position"],
        "border"          => $data["content"]["title"]["style"]["border"],
        "class"           => $data["content"]["title"]["style"]["class"] . " staggered-content__title",
        "id"              => $data["content"]["title"]["style"]["id"],
        "attrs"           => $data["content"]["title"]["style"]["attrs"]
      ]
    ]);
  }

  $svg = "<svg class='staggered-content__arrow-red' width='27' height='27' viewBox='0 0 27 27' fill='none' xmlns='http://www.w3.org/2000/svg'>
  <path d='M2.9952 4.7808L18.4896 4.7232L0 23.2128L3.2832 26.5536L21.8304 8.0064V23.5584L26.496 23.2704V0L3.2832 0.1152L2.9952 4.7808Z' fill='#D14E2A'/>
  </svg>";

  $list_html = "";
  if ($acf_obj) {
    $items = $acf_obj;
    
    foreach ($items as $item)  {
      // var_dump($item);
      $list_html .= "
      <li class='staggered-content__item'>$svg{$item['col_item']}</li>
    ";
    }
  }
  $list_html = "
    <ul class='staggered-content__items'>
    $list_html
    </ul>
  ";
 
  $icon_html = "";
  if ($icon) {
    $icon_html = gsc("img", [
      "content" => [
        "src" => $data["image-content"]['src'],
        "alt" => $data["image-content"]['alt']
      ],
    ]);
  }

  $link_html = "";
  if ($acf_link) {
    $link_html = gsc("link", [
      "content" => [
        "acf_link" => $acf_link,
      ],
      "style" => [
        "class" => "arrow",
      ]
    ]);
  }
  

  $num_html  = "";
  if (!empty($data["counter"]["number"])) {
    $num_html = '<div class="staggered-content__num">--0' . $counter .'</div>';
  }
  
  $text_html = "<div class='staggered-content__text'>$text</div>";  

  return "<div $id $class $misc_attrs>
            $num_html
            $icon_html
            <div class='staggered-content__wrap'>
              $title_html
              $text_html
              $list_html
              $link_html
            </div>
          </div>";
});
gsc_meta("staggered-content", [MOLECULE]);
gsc_test("staggered-content", "", function() {

  echo gsc("staggered-content", [
    "content" => [
      "title" => [
        "content" => [
          "main" => 'Explorer Careers',
        ],
        "style" => [
          "container" => 'h2',
          "color" => 'red',
          "border" => 'left',
        ]
      ],
      "text" => 'Assess and treat individuals with mental, emotional, or substance abuse problems, including abuse of alcohol tobacco and/or other drugs Activites may include individual and group therapy, crisis intervention, case management, client advocacy, prevention, and eduction',
    ],
    "style" => [
      "divider" => TRUE,
    ]
  ]);

  echo "<br /><br />";

  echo gsc("staggered-content", [
    "content" => [
      "title" => [
        "content" => [
          "main" => 'Section Title'
        ],
        "style" => [
          "container" => 'h3',
        ]
      ],
      "text" => 'Assess and treat individuals with mental, emotional, or substance abuse problems, including abuse of alcohol tobacco and/or other drugs Activites may include individual and group therapy, crisis intervention, case management, client advocacy, prevention, and eduction',
    ],
    "style" => [
      "class" => "custom-class",
      "attrs" => [
        "custom-attr" => "attr"
      ]
    ]
  ]);

});

 ?>
