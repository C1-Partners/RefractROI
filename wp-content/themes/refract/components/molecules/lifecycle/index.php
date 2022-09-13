<?php
$defaults = [
  "content" => [
		"tabs" => [
			[
				"link" => "",
				"content" => ""
			],
		"tabs_alt" => [],
		"title" => "",
		],
    "group_name" => '', // prepended to ID of UI card object
	"aria_title" => ""
	],
  "style" => [
    "class" => '',
    "id" => '',
    "attrs" => []
  ]
];







gsc_define("lifecycle", $defaults, function($data) {
	// get svgs
	$grid_svg = file_get_contents(get_template_directory() . '/images/' . 'lifecycle-grid.svg');
	$arrow_svg = file_get_contents(get_template_directory() . '/images/' . 'up-right-goldenrod.svg');
	// If groupname is empty, groupname = random string
	if (!empty($data["content"]["group_name"])) {
		$groupname = $data["content"]["group_name"];
	} else {
		$n=3;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';

		for ($i = 0; $i < $n; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$randomString .= $characters[$index];
		}

		$groupname = $randomString;
	}

	$tabs = $data["content"]["tabs"];
	$title = $data["content"]["title"];

	$tabs_alt = $data["content"]["tabs_alt"];
	$lists_html = "";

	if ($tabs_alt) {
		$tabs = $data["content"]["tabs_alt"];
	}

	$links_str = "";
	$panels_str = "";
	
	if (!empty($tabs)) {
		$tab_i = 0;
    foreach ($tabs as $tab) {
		$steps = $tab['row_stps'];
		$link = $tab['row_lnk'];
		$link_obj = "";
		if($link) {
			$link_obj = gsc("link", [
				"content" => [
				  "acf_link" => $tab['row_lnk'],
				],
				"style" => [
					"wrapper" => TRUE,
					"class" => 'btn',
				  ]
			  ]);
		}
		

		$tab_i++;
		$is_active_class = ($tab_i == 1) ? "is_active" : "";
		if ($tabs_alt) {
			
			$links_str .= "
			<li class='tabs__item' role='presentation'>
				<button type='button' class='tabs__link {$is_active_class}' id='tabs-{$groupname}__tab-link-{$tab_i}' role='tab' aria-selected='true' aria-controls='tabs-{$groupname}__panel-{$tab_i}'>{$tab["row_title"]}</button>
			</li>";

			$list = "";
			foreach ($steps as $step) {
				$list .= "<div class='tabs__step'>
							<span class='tabs__arrow'>{$arrow_svg}</span><li>{$step['row_stp']}</li>
						</div>";
			}
	
			$panels_str .= "
			<div class='tabs__section' id='tabs-{$groupname}__panel-{$tab_i}' role='tabpanel' aria-labelledby='tabs-{$groupname}__tab-link-{$tab_i}' tabindex='0'>
				<h2 class='tabs__title'>{$tab["row_title"]}</h2>	
				<div class='tabs__body'>{$tab["row_txt"]}</div>
				<ul class='tabs__steps'>{$list}</ul>
				$link_obj
			</div>";

			} else {

				$links_str .= "
				<li class='tabs__item' role='presentation'>
					<button type='button' class='tabs__link {$is_active_class}' id='tabs-{$groupname}__tab-link-{$tab_i}' role='tab' aria-selected='true' aria-controls='tabs-{$groupname}__panel-{$tab_i}'>{$tab["link"]}</button>
				</li>";

				$panels_str .= "
				<div class='tabs__section' id='tabs-{$groupname}__panel-{$tab_i}' role='tabpanel' aria-labelledby='tabs-{$groupname}__tab-link-{$tab_i}' tabindex='0'>
					<div class='tabs__body'>{$tab["content"]}</div>
				</div>";
			}
		}
	}

	$links_str = "<div class='tabs__ctrls'>
					<h2 class='tabs__section-title'>{$title}</h2>
					<ul class='tabs__list' role='tablist' aria-label='{$data["content"]["aria_title"]}'>
						$links_str
					</ul>
				</div>";
	

	$class_attr = "class='tabs'";
  if (!empty($data["style"]["class"])) {
    $class_attr = "class='tabs {$data["style"]["class"]}'";
	}

	$id_attr = "";
  if (!empty($data["style"]["id"])) {
    $id_attr = "id='{$data["style"]["id"]}'";
	}

	$misc_attrs = "";
  if (!empty($data["style"]["attrs"])) {
    foreach ($data["style"]["attrs"] as $attr_name=>$attr_value) {
      $misc_attrs .= "$attr_name='$attr_value' ";
    }
  }

	$content = $links_str;

	return "<div $id_attr $class_attr $misc_attrs>
  				<div>
						$links_str
						
						</div>
						<div>
						$grid_svg
						$panels_str
						
						</div>
					</div>";
});
gsc_meta("tabs", [MOLECULE]);
gsc_test("tabs", "", function() {

	echo gsc("tabs", [
    "content" => [
			"tabs" => [
				[
					"link" => "Costs",
					"content" => "
						<p><strong>Note:</strong> Calculation based on average family income for VSAC Vermont Incentive Grant recipients.</p>
						<p>
							<strong>Source:</strong> Vermont Student Assistance Corporation. (2018). VSAC Higher Education Fact Sheets for Vermont Counties. Accessed May 2019. Retrieved from:
							<a href='https://www.vsac.org/about/how-we-influence-policy'>https://www.vsac.org/about/how-we-influence-policy</a>
						</p>"
				],
				[
					"link" => "Debt",
					"content" => "Content of section 2 (Debt)"
				],
				[
					"link" => "Funding",
					"content" => "Content of section 2 (Funding)"
				],
				[
					"link" => "Perception",
					"content" => "Content of section 2 (Perception)"
				]
			],
			"aria_title" => "title for tab content",
      "group_name" => 'group'
		]
	]);

  echo gsc("tabs", [
    "content" => [
			"tabs" => [
				[
					"link" => "Yes",
					"content" => gsc_mock()
				],
				[
					"link" => "No",
					"content" => gsc_mock()
				],
				[
					"link" => "Maybe so",
					"content" => gsc_mock()
				],
				[
					"link" => "Gosh",
					"content" => gsc_mock()
				],
        [
					"link" => "Hmm",
					"content" => gsc_mock()
				],
        [
					"link" => "OK!",
					"content" => gsc_mock()
				],
			],
			"aria_title" => "title for tab content",
      "group_name" => 'wow'
		]
	]);

  echo gsc("tabs", [
    "content" => [
			"tabs" => [
				[
					"link" => gsc_mock(),
					"content" => gsc_mock()
				],
				[
					"link" => gsc_mock(),
					"content" => gsc_mock()
				],
			],
			"aria_title" => "title for tab content",
      "group_name" => 'looongtitle'
		],
    "style" => [
      "class" => "custom-class",
      "attrs" => [
        "custom-attr" => "attr"
      ]
    ]
	]);

});
