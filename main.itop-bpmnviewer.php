<?php

class BPMNViewer extends AbstractApplicationUIExtension
{
    public function OnDisplayProperties($oObject, WebPage $oPage, $bEditMode = false)
    {

        $enabled = MetaModel::GetModuleSetting('itop-bpmnviewer', 'enabled', true);
        $enabled_for = MetaModel::GetModuleSetting('itop-bpmnviewer', 'enabled_for', []);
        $properties_panel_enabled = MetaModel::GetModuleSetting('itop-bpmnviewer', 'properties_panel_enabled', false);

        if (!$enabled || count($enabled_for) < 1) return;

        $header = Dict::S('BPMNViewer:Heading', 'BPMN');

        if (array_key_exists(get_class($oObject), $enabled_for) && $bEditMode == false) {
            $bpmn = $oObject->Get($enabled_for[get_class($oObject)]);
            if (strlen($bpmn) > 10) {
                $oPage->add_style('
                    #processEditorContainer {
                        width: 60%;
                        height: 600px;
                        float: left;
                    }

                    .bio-properties-panel-header, 
                    div[data-group-id="group-general"], 
                    div[data-group-id="group-documentation"],
                    .bio-properties-panel-group-header,
                    .bio-properties-panel-collapsible-entry-header,
                    .bio-properties-panel-collapsible-entry-entries label
                    {
                        display: none;
                    }

                    .bio-properties-panel-collapsible-entry-entries .bio-properties-panel-input
                    {
                        font-size: 1.17rem !important;
                        font-family: "Raleway", "sans-serif", "system-ui";
                        font-style: normal;
                        color: rgb(64, 75, 90);
                        font-weight: 500;
                        background: none;
                        border: none;
                        pointer-events: none;
                        width: 100%;
                    }

                    .bio-properties-panel-collapsible-entry-entries .bio-properties-panel-input[id$="-name"]
                    {
                        font-family: "Raleway", "sans-serif", "system-ui";
                        font-style: normal;
                        color: rgb(33, 41, 52);
                        font-weight: 600;
                        margin-top: 1.5rem;
                    }

                    #processEditorContainer h2 {
                        font-size: 1.4em;
                    }
                    .djs-segment-dragger.vertical > .djs-hit {
                        width: 1px;
                    }
                    .djs-segment-dragger.horizontal > .djs-hit {
                        height: 1px;
                    }
                    .djs-bendpoints {
                        display: none;
                    }
                    #js-properties-panel {
                        width: 39%;
                        height: 600px;
                        float: right;
                    }
                ');

                $assetPath = utils::GetAbsoluteUrlModulesRoot() . 'itop-bpmnviewer/assets';
                $oPage->add_early_script(
                    "const BPMN = `$bpmn`"
                );

                $properties_panel = $properties_panel_enabled ? '<div id="js-properties-panel"></div>' : '';

                $oPage->add(<<<EOF
                <div class="bpmn-viewer"> 
                    <div id="processEditorContainer">
                        <h2 class="h2">$header</h2>
                    </div>    
                    $properties_panel  
                </div>
                EOF);
                $oPage->add_linked_stylesheet(
                    $assetPath . "/css/bpmn-js/assets/diagram-js.css",
                    $assetPath . "/css/bpmn-js/assets/bpmn-js.css",
                    $assetPath . "/css/bpmn-font/css/bpmn-embedded.css",
                    $assetPath . "/css/bpmn-js-properties-panel/assets/properties-panel.css",
                    $assetPath . "/css/app.css"
                );
                $oPage->add_linked_script(
                    $assetPath . "/js/app.js"
                );

            }
        }
    }
}