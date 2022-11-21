import $ from 'jquery';
import BpmnModeler from 'bpmn-js/lib/Modeler';

import { debounce } from 'min-dash';

import { BpmnPropertiesPanelModule, BpmnPropertiesProviderModule, ZeebePropertiesProviderModule } from 'bpmn-js-properties-panel';
import ZeebeBpmnModdle from 'zeebe-bpmn-moddle/resources/zeebe.json'

var canvas = $('#processEditorContainer');
var propPanel = $('#js-properties-panel');

console.log("Started loading canvas");
console.log(canvas);

if (propPanel !== undefined) {
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
}
else {
  var bpmnModeler = new BpmnModeler({
    container: canvas,
    additionalModules: [],
    moddleExtensions: {
      zeebe: ZeebeBpmnModdle
    }
  });
}

bpmnModeler.importXML(BPMN);
