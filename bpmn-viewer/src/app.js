import $ from 'jquery';
import BpmnModeler from 'bpmn-js/lib/Modeler';

import { debounce } from 'min-dash';

import { BpmnPropertiesPanelModule, BpmnPropertiesProviderModule, ZeebePropertiesProviderModule } from 'bpmn-js-properties-panel';
import ZeebeBpmnModdle from 'zeebe-bpmn-moddle/resources/zeebe.json'

var canvas = $('#processEditorContainer');
console.log("Started loading canvas");
console.log(canvas);
console.log(BPMN);

var bpmnModeler = new BpmnModeler({
  container: canvas,
  propertiesPanel: {
    parent: '#js-properties-panel'
  },
  additionalModules: [
    BpmnPropertiesPanelModule,
    BpmnPropertiesProviderModule,
    ZeebePropertiesProviderModule
  ],
  moddleExtensions: {
    zeebe: ZeebeBpmnModdle
  }
});

bpmnModeler.importXML(BPMN);
