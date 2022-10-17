# itop-bpmnviewer
BPMN2 Viewer add-in for iTop objects

## Installation
Clone the repository into the extensions folder in your iTop installation and re-run the setup

## Usage
Update config-itop.php through an editor or via the web interface, and find the itop-bpmnviewer-section at the bottom.
```php
// Whether to enable the viewer
'enabled' => true,

// Key => Value list with ModelName (Name of the model where the viewer should be displayed) => bpmn_field (name of the field in the model containing the BPMN schema)
'enabled_for' => [
    'ModelName' => 'model_bpmn_field'
],

// Whether to enable the onclick-properties panel for the nodes
// currently only works with ZeebeProperties
'properties_panel_enabled' => false
```