<?php

SetupWebPage::AddModule(
	__FILE__,
	'itop-bpmnviewer/1.0.0',
	array(
		'label' => 'iTop BPMN Viewer',
		'category' => 'business',

		'dependencies' => array(
			'itop-structure/3.0.0',
		),
		'mandatory' => false,
		'visible' => true,
		'datamodel' => ['main.itop-bpmnviewer.php'],
		'webservice' => [],
		'data.struct' => [],
		'data.sample' => [],
		'doc.manual_setup' => '', // hyperlink to manual setup documentation, if any
		'doc.more_information' => '', // hyperlink to more information, if any 
		'settings' => array(
			'enabled' => true,
			'enabled_for' => [
				'ModelName' => 'model_bpmn_field'
			],
			'properties_panel_enabled' => false
		),
	)
);


?>
