<?php

$defaults = [
  "content" => [
    "acf_link" => '', // if present will override URL, title and target values with acf_link array values
    "url" => '',
    "title" => '',
    "target" => '_self'
  ],
  "style" => [
    "wrapper" => TRUE,
    "class" => '',
    "id" => '',
    "attrs" => []
  ]
];

gsc_define("link", $defaults, function ($data) {
  $acf_obj = $data["content"]["acf_link"];

  $link_svg = "<svg width='27' height='28' viewBox='0 0 27 28' fill='none' xmlns='http://www.w3.org/2000/svg'>
                  <path d='M2.9952 5.3632L18.4896 5.3056L0 23.7952L3.2832 27.136L21.8304 8.5888V24.1408L26.496 23.8528V0.582397L3.2832 0.697598L2.9952 5.3632Z' fill='#E6AF2E'/>
                </svg>";
  
  $url = $data["content"]["url"];
  $title = $data["content"]["title"];
  $target = $data["content"]["target"];

  if (!empty($acf_obj)) {
    $url = $acf_obj["url"];
    $title = $acf_obj["title"];
    $target = $acf_obj["target"];
  }

  $id_attr = "";
  if (!empty($data["style"]["id"])) {
    $id_attr = "id='{$data["style"]["id"]}'";
  }

  $class_attr = "";
  $class = $data["style"]["class"];
  if (!empty($class)) {
    $class_attr = "class='{$class}'";
  }

  $misc_attrs = "";
  if (!empty($data["style"]["attrs"])){
      foreach ($data["style"]["attrs"] as $attr_name=>$attr_value) {
        $misc_attrs .= "$attr_name='$attr_value' ";
      }
  }

  $link_html = "<a href='$url' $id_attr $class_attr $misc_attrs target='$target'>$title</a>";

  if ($data["style"]["class"] == "arrow") {
    $link_html = "<a href='$url' $id_attr $class_attr $misc_attrs target='$target'>$title $link_svg</a>";
  }

  if ($data["style"]["wrapper"]) {
    $link_html = "<div class='btn-row'>$link_html</div>";
  }

  return $link_html;
});
gsc_meta("link", [ATOM]);
gsc_test("link", "", function() {
  echo gsc("link", [
    "content" => [
      "url" => 'https://embark.com/#banner',
      "title" => 'test link',
      "target" => 'self'
    ]
  ]);
  echo gsc("link", [
    "content" => [
      "url" => 'https://embark.com/#banner',
      "title" => 'class link test',
      "target" => 'self'
    ],
    "style" => [
      "class" => 'color-teal',
      "attrs" => [
        "custom-attr" => "attr"
      ]
    ]
  ]);
});
 ?>
