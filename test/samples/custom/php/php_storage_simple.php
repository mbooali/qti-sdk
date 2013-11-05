<?php
$string_0 = "";
$string_1 = "";
$array_0 = array();
$outcomedeclarationcollection_0 = new qtism\data\state\OutcomeDeclarationCollection($array_0);
$nullvalue_0 = null;
$nullvalue_1 = null;
$array_1 = array();
$testfeedbackcollection_0 = new qtism\data\TestFeedbackCollection($array_1);
$string_2 = "php_storage_simple";
$string_3 = "PHP Storage Simple";
$array_2 = array();
$preconditioncollection_0 = new qtism\data\rules\PreConditionCollection($array_2);
$array_3 = array();
$branchrulecollection_0 = new qtism\data\rules\BranchRuleCollection($array_3);
$nullvalue_2 = null;
$nullvalue_3 = null;
$array_4 = array();
$testfeedbackcollection_1 = new qtism\data\TestFeedbackCollection($array_4);
$string_4 = "P01";
$boolean_0 = true;
$nullvalue_4 = null;
$nullvalue_5 = null;
$array_5 = array();
$rubricblockcollection_0 = new qtism\data\content\RubricBlockCollection($array_5);
$array_6 = array();
$viewcollection_0 = new qtism\data\ViewCollection($array_6);
$string_5 = "";
$string_6 = "";
$boolean_1 = false;
$boolean_2 = false;
$boolean_3 = false;
$nullvalue_6 = null;
$string_7 = "scoring";
$integer_0 = 3;
$integer_1 = 0;
$double_0 = 0.0;
$integer_2 = 3;
$string_8 = "";
$value_0 = new qtism\data\state\Value($double_0, $integer_2, $string_8);
$array_7 = array($value_0);
$valuecollection_0 = new qtism\data\state\ValueCollection($array_7);
$string_9 = "";
$defaultvalue_0 = new qtism\data\state\DefaultValue($valuecollection_0, $string_9);
$outcomedeclaration_0 = new qtism\data\state\OutcomeDeclaration($string_7, $integer_0, $integer_1, $defaultvalue_0);
$outcomedeclaration_0->setViews($viewcollection_0);
$outcomedeclaration_0->setInterpretation($string_5);
$outcomedeclaration_0->setLongInterpretation($string_6);
$outcomedeclaration_0->setNormalMaximum($boolean_1);
$outcomedeclaration_0->setNormalMinimum($boolean_2);
$outcomedeclaration_0->setMasteryValue($boolean_3);
$outcomedeclaration_0->setLookupTable($nullvalue_6);
$array_8 = array($outcomedeclaration_0);
$outcomedeclarationcollection_1 = new qtism\data\state\OutcomeDeclarationCollection($array_8);
$string_10 = "ChoiceA";
$integer_3 = 0;
$string_11 = "";
$value_1 = new qtism\data\state\Value($string_10, $integer_3, $string_11);
$array_9 = array($value_1);
$valuecollection_1 = new qtism\data\state\ValueCollection($array_9);
$string_12 = "";
$correctresponse_0 = new qtism\data\state\CorrectResponse($valuecollection_1, $string_12);
$nullvalue_7 = null;
$nullvalue_8 = null;
$string_13 = "RESPONSE";
$integer_4 = 0;
$integer_5 = 0;
$nullvalue_9 = null;
$responsedeclaration_0 = new qtism\data\state\ResponseDeclaration($string_13, $integer_4, $integer_5, $nullvalue_9);
$responsedeclaration_0->setCorrectResponse($correctresponse_0);
$responsedeclaration_0->setMapping($nullvalue_7);
$responsedeclaration_0->setAreaMapping($nullvalue_8);
$array_10 = array($responsedeclaration_0);
$responsedeclarationcollection_0 = new qtism\data\state\ResponseDeclarationCollection($array_10);
$string_14 = "";
$string_15 = "";
$string_16 = "RESPONSE";
$string_17 = "";
$variable_0 = new qtism\data\expressions\Variable($string_16, $string_17);
$string_18 = "RESPONSE";
$correct_0 = new qtism\data\expressions\Correct($string_18);
$array_11 = array($variable_0, $correct_0);
$expressioncollection_0 = new qtism\data\expressions\ExpressionCollection($array_11);
$match_0 = new qtism\data\expressions\operators\Match($expressioncollection_0);
$string_19 = "scoring";
$integer_6 = 3;
$double_1 = 1.0;
$basevalue_0 = new qtism\data\expressions\BaseValue($integer_6, $double_1);
$setoutcomevalue_0 = new qtism\data\rules\SetOutcomeValue($string_19, $basevalue_0);
$array_12 = array($setoutcomevalue_0);
$responserulecollection_0 = new qtism\data\rules\ResponseRuleCollection($array_12);
$responseif_0 = new qtism\data\rules\ResponseIf($match_0, $responserulecollection_0);
$array_13 = array();
$responseelseifcollection_0 = new qtism\data\rules\ResponseElseIfCollection($array_13);
$string_20 = "scoring";
$integer_7 = 3;
$double_2 = 0.0;
$basevalue_1 = new qtism\data\expressions\BaseValue($integer_7, $double_2);
$setoutcomevalue_1 = new qtism\data\rules\SetOutcomeValue($string_20, $basevalue_1);
$array_14 = array($setoutcomevalue_1);
$responserulecollection_1 = new qtism\data\rules\ResponseRuleCollection($array_14);
$responseelse_0 = new qtism\data\rules\ResponseElse($responserulecollection_1);
$responsecondition_0 = new qtism\data\rules\ResponseCondition($responseif_0, $responseelseifcollection_0, $responseelse_0);
$array_15 = array($responsecondition_0);
$responserulecollection_2 = new qtism\data\rules\ResponseRuleCollection($array_15);
$responseprocessing_0 = new qtism\data\processing\ResponseProcessing($responserulecollection_2);
$responseprocessing_0->setTemplate($string_14);
$responseprocessing_0->setTemplateLocation($string_15);
$boolean_4 = false;
$boolean_5 = false;
$string_21 = "scoring";
$string_22 = "SCORE";
$variablemapping_0 = new qtism\data\state\VariableMapping($string_21, $string_22);
$array_16 = array($variablemapping_0);
$variablemappingcollection_0 = new qtism\data\state\VariableMappingCollection($array_16);
$string_23 = "W01";
$double_3 = 2.0;
$weight_0 = new qtism\data\state\Weight($string_23, $double_3);
$array_17 = array($weight_0);
$weightcollection_0 = new qtism\data\state\WeightCollection($array_17);
$array_18 = array();
$templatedefaultcollection_0 = new qtism\data\state\TemplateDefaultCollection($array_18);
$boolean_6 = false;
$boolean_7 = false;
$array_19 = array();
$preconditioncollection_1 = new qtism\data\rules\PreConditionCollection($array_19);
$array_20 = array();
$branchrulecollection_1 = new qtism\data\rules\BranchRuleCollection($array_20);
$nullvalue_10 = null;
$nullvalue_11 = null;
$string_24 = "Q01";
$string_25 = "./Q01.xml";
$string_26 = "mathematics";
$string_27 = "chemistry";
$array_21 = array($string_26, $string_27);
$identifiercollection_0 = new qtism\common\collections\IdentifierCollection($array_21);
$extendedassessmentitemref_0 = new qtism\data\ExtendedAssessmentItemRef($string_24, $string_25, $identifiercollection_0);
$extendedassessmentitemref_0->setOutcomeDeclarations($outcomedeclarationcollection_1);
$extendedassessmentitemref_0->setResponseDeclarations($responsedeclarationcollection_0);
$extendedassessmentitemref_0->setResponseProcessing($responseprocessing_0);
$extendedassessmentitemref_0->setAdaptive($boolean_4);
$extendedassessmentitemref_0->setTimeDependent($boolean_5);
$extendedassessmentitemref_0->setVariableMappings($variablemappingcollection_0);
$extendedassessmentitemref_0->setWeights($weightcollection_0);
$extendedassessmentitemref_0->setTemplateDefaults($templatedefaultcollection_0);
$extendedassessmentitemref_0->setRequired($boolean_6);
$extendedassessmentitemref_0->setFixed($boolean_7);
$extendedassessmentitemref_0->setPreConditions($preconditioncollection_1);
$extendedassessmentitemref_0->setBranchRules($branchrulecollection_1);
$extendedassessmentitemref_0->setItemSessionControl($nullvalue_10);
$extendedassessmentitemref_0->setTimeLimits($nullvalue_11);
$array_22 = array();
$viewcollection_1 = new qtism\data\ViewCollection($array_22);
$string_28 = "";
$string_29 = "";
$double_4 = 2.5;
$boolean_8 = false;
$boolean_9 = false;
$nullvalue_12 = null;
$string_30 = "SCORE";
$integer_8 = 3;
$integer_9 = 0;
$nullvalue_13 = null;
$outcomedeclaration_1 = new qtism\data\state\OutcomeDeclaration($string_30, $integer_8, $integer_9, $nullvalue_13);
$outcomedeclaration_1->setViews($viewcollection_1);
$outcomedeclaration_1->setInterpretation($string_28);
$outcomedeclaration_1->setLongInterpretation($string_29);
$outcomedeclaration_1->setNormalMaximum($double_4);
$outcomedeclaration_1->setNormalMinimum($boolean_8);
$outcomedeclaration_1->setMasteryValue($boolean_9);
$outcomedeclaration_1->setLookupTable($nullvalue_12);
$array_23 = array($outcomedeclaration_1);
$outcomedeclarationcollection_2 = new qtism\data\state\OutcomeDeclarationCollection($array_23);
$pair_0 = new qtism\common\datatypes\Pair("A", "P");
$integer_10 = 6;
$string_31 = "";
$value_2 = new qtism\data\state\Value($pair_0, $integer_10, $string_31);
$pair_1 = new qtism\common\datatypes\Pair("C", "M");
$integer_11 = 6;
$string_32 = "";
$value_3 = new qtism\data\state\Value($pair_1, $integer_11, $string_32);
$pair_2 = new qtism\common\datatypes\Pair("D", "L");
$integer_12 = 6;
$string_33 = "";
$value_4 = new qtism\data\state\Value($pair_2, $integer_12, $string_33);
$array_24 = array($value_2, $value_3, $value_4);
$valuecollection_2 = new qtism\data\state\ValueCollection($array_24);
$string_34 = "";
$correctresponse_1 = new qtism\data\state\CorrectResponse($valuecollection_2, $string_34);
$pair_3 = new qtism\common\datatypes\Pair("A", "P");
$double_5 = 2.0;
$boolean_10 = true;
$mapentry_0 = new qtism\data\state\MapEntry($pair_3, $double_5, $boolean_10);
$pair_4 = new qtism\common\datatypes\Pair("C", "M");
$double_6 = 1.0;
$boolean_11 = true;
$mapentry_1 = new qtism\data\state\MapEntry($pair_4, $double_6, $boolean_11);
$pair_5 = new qtism\common\datatypes\Pair("D", "L");
$double_7 = 1.0;
$boolean_12 = true;
$mapentry_2 = new qtism\data\state\MapEntry($pair_5, $double_7, $boolean_12);
$array_25 = array($mapentry_0, $mapentry_1, $mapentry_2);
$mapentrycollection_0 = new qtism\data\state\MapEntryCollection($array_25);
$double_8 = 0.0;
$boolean_13 = false;
$boolean_14 = false;
$mapping_0 = new qtism\data\state\Mapping($mapentrycollection_0, $double_8, $boolean_13, $boolean_14);
$nullvalue_14 = null;
$string_35 = "RESPONSE";
$integer_13 = 6;
$integer_14 = 1;
$nullvalue_15 = null;
$responsedeclaration_1 = new qtism\data\state\ResponseDeclaration($string_35, $integer_13, $integer_14, $nullvalue_15);
$responsedeclaration_1->setCorrectResponse($correctresponse_1);
$responsedeclaration_1->setMapping($mapping_0);
$responsedeclaration_1->setAreaMapping($nullvalue_14);
$array_26 = array($responsedeclaration_1);
$responsedeclarationcollection_1 = new qtism\data\state\ResponseDeclarationCollection($array_26);
$string_36 = "http://www.imsglobal.org/question/qti_v2p1/rptemplates/map_response";
$string_37 = "";
$array_27 = array();
$responserulecollection_3 = new qtism\data\rules\ResponseRuleCollection($array_27);
$responseprocessing_1 = new qtism\data\processing\ResponseProcessing($responserulecollection_3);
$responseprocessing_1->setTemplate($string_36);
$responseprocessing_1->setTemplateLocation($string_37);
$boolean_15 = false;
$boolean_16 = false;
$array_28 = array();
$variablemappingcollection_1 = new qtism\data\state\VariableMappingCollection($array_28);
$array_29 = array();
$weightcollection_1 = new qtism\data\state\WeightCollection($array_29);
$array_30 = array();
$templatedefaultcollection_1 = new qtism\data\state\TemplateDefaultCollection($array_30);
$boolean_17 = false;
$boolean_18 = false;
$array_31 = array();
$preconditioncollection_2 = new qtism\data\rules\PreConditionCollection($array_31);
$array_32 = array();
$branchrulecollection_2 = new qtism\data\rules\BranchRuleCollection($array_32);
$nullvalue_16 = null;
$nullvalue_17 = null;
$string_38 = "Q02";
$string_39 = "./Q02.xml";
$string_40 = "maximum";
$array_33 = array($string_40);
$identifiercollection_1 = new qtism\common\collections\IdentifierCollection($array_33);
$extendedassessmentitemref_1 = new qtism\data\ExtendedAssessmentItemRef($string_38, $string_39, $identifiercollection_1);
$extendedassessmentitemref_1->setOutcomeDeclarations($outcomedeclarationcollection_2);
$extendedassessmentitemref_1->setResponseDeclarations($responsedeclarationcollection_1);
$extendedassessmentitemref_1->setResponseProcessing($responseprocessing_1);
$extendedassessmentitemref_1->setAdaptive($boolean_15);
$extendedassessmentitemref_1->setTimeDependent($boolean_16);
$extendedassessmentitemref_1->setVariableMappings($variablemappingcollection_1);
$extendedassessmentitemref_1->setWeights($weightcollection_1);
$extendedassessmentitemref_1->setTemplateDefaults($templatedefaultcollection_1);
$extendedassessmentitemref_1->setRequired($boolean_17);
$extendedassessmentitemref_1->setFixed($boolean_18);
$extendedassessmentitemref_1->setPreConditions($preconditioncollection_2);
$extendedassessmentitemref_1->setBranchRules($branchrulecollection_2);
$extendedassessmentitemref_1->setItemSessionControl($nullvalue_16);
$extendedassessmentitemref_1->setTimeLimits($nullvalue_17);
$array_34 = array();
$viewcollection_2 = new qtism\data\ViewCollection($array_34);
$string_41 = "";
$string_42 = "";
$boolean_19 = false;
$double_9 = -2.0;
$boolean_20 = false;
$nullvalue_18 = null;
$string_43 = "SCORE";
$integer_15 = 3;
$integer_16 = 0;
$nullvalue_19 = null;
$outcomedeclaration_2 = new qtism\data\state\OutcomeDeclaration($string_43, $integer_15, $integer_16, $nullvalue_19);
$outcomedeclaration_2->setViews($viewcollection_2);
$outcomedeclaration_2->setInterpretation($string_41);
$outcomedeclaration_2->setLongInterpretation($string_42);
$outcomedeclaration_2->setNormalMaximum($boolean_19);
$outcomedeclaration_2->setNormalMinimum($double_9);
$outcomedeclaration_2->setMasteryValue($boolean_20);
$outcomedeclaration_2->setLookupTable($nullvalue_18);
$array_35 = array($outcomedeclaration_2);
$outcomedeclarationcollection_3 = new qtism\data\state\OutcomeDeclarationCollection($array_35);
$string_44 = "H";
$integer_17 = 0;
$string_45 = "";
$value_5 = new qtism\data\state\Value($string_44, $integer_17, $string_45);
$string_46 = "O";
$integer_18 = 0;
$string_47 = "";
$value_6 = new qtism\data\state\Value($string_46, $integer_18, $string_47);
$array_36 = array($value_5, $value_6);
$valuecollection_3 = new qtism\data\state\ValueCollection($array_36);
$string_48 = "";
$correctresponse_2 = new qtism\data\state\CorrectResponse($valuecollection_3, $string_48);
$string_49 = "H";
$double_10 = 1.0;
$boolean_21 = true;
$mapentry_3 = new qtism\data\state\MapEntry($string_49, $double_10, $boolean_21);
$string_50 = "O";
$double_11 = 1.0;
$boolean_22 = true;
$mapentry_4 = new qtism\data\state\MapEntry($string_50, $double_11, $boolean_22);
$string_51 = "Cl";
$double_12 = -1.0;
$boolean_23 = true;
$mapentry_5 = new qtism\data\state\MapEntry($string_51, $double_12, $boolean_23);
$array_37 = array($mapentry_3, $mapentry_4, $mapentry_5);
$mapentrycollection_1 = new qtism\data\state\MapEntryCollection($array_37);
$double_13 = -2.0;
$double_14 = 0.0;
$double_15 = 2.0;
$mapping_1 = new qtism\data\state\Mapping($mapentrycollection_1, $double_13, $double_14, $double_15);
$nullvalue_20 = null;
$string_52 = "RESPONSE";
$integer_19 = 0;
$integer_20 = 1;
$nullvalue_21 = null;
$responsedeclaration_2 = new qtism\data\state\ResponseDeclaration($string_52, $integer_19, $integer_20, $nullvalue_21);
$responsedeclaration_2->setCorrectResponse($correctresponse_2);
$responsedeclaration_2->setMapping($mapping_1);
$responsedeclaration_2->setAreaMapping($nullvalue_20);
$array_38 = array($responsedeclaration_2);
$responsedeclarationcollection_2 = new qtism\data\state\ResponseDeclarationCollection($array_38);
$string_53 = "http://www.imsglobal.org/question/qti_v2p1/rptemplates/map_response";
$string_54 = "";
$array_39 = array();
$responserulecollection_4 = new qtism\data\rules\ResponseRuleCollection($array_39);
$responseprocessing_2 = new qtism\data\processing\ResponseProcessing($responserulecollection_4);
$responseprocessing_2->setTemplate($string_53);
$responseprocessing_2->setTemplateLocation($string_54);
$boolean_24 = false;
$boolean_25 = false;
$array_40 = array();
$variablemappingcollection_2 = new qtism\data\state\VariableMappingCollection($array_40);
$array_41 = array();
$weightcollection_2 = new qtism\data\state\WeightCollection($array_41);
$array_42 = array();
$templatedefaultcollection_2 = new qtism\data\state\TemplateDefaultCollection($array_42);
$boolean_26 = false;
$boolean_27 = false;
$array_43 = array();
$preconditioncollection_3 = new qtism\data\rules\PreConditionCollection($array_43);
$array_44 = array();
$branchrulecollection_3 = new qtism\data\rules\BranchRuleCollection($array_44);
$nullvalue_22 = null;
$nullvalue_23 = null;
$string_55 = "Q03";
$string_56 = "./Q03.xml";
$string_57 = "mathematics";
$string_58 = "minimum";
$array_45 = array($string_57, $string_58);
$identifiercollection_2 = new qtism\common\collections\IdentifierCollection($array_45);
$extendedassessmentitemref_2 = new qtism\data\ExtendedAssessmentItemRef($string_55, $string_56, $identifiercollection_2);
$extendedassessmentitemref_2->setOutcomeDeclarations($outcomedeclarationcollection_3);
$extendedassessmentitemref_2->setResponseDeclarations($responsedeclarationcollection_2);
$extendedassessmentitemref_2->setResponseProcessing($responseprocessing_2);
$extendedassessmentitemref_2->setAdaptive($boolean_24);
$extendedassessmentitemref_2->setTimeDependent($boolean_25);
$extendedassessmentitemref_2->setVariableMappings($variablemappingcollection_2);
$extendedassessmentitemref_2->setWeights($weightcollection_2);
$extendedassessmentitemref_2->setTemplateDefaults($templatedefaultcollection_2);
$extendedassessmentitemref_2->setRequired($boolean_26);
$extendedassessmentitemref_2->setFixed($boolean_27);
$extendedassessmentitemref_2->setPreConditions($preconditioncollection_3);
$extendedassessmentitemref_2->setBranchRules($branchrulecollection_3);
$extendedassessmentitemref_2->setItemSessionControl($nullvalue_22);
$extendedassessmentitemref_2->setTimeLimits($nullvalue_23);
$array_46 = array($extendedassessmentitemref_0, $extendedassessmentitemref_1, $extendedassessmentitemref_2);
$sectionpartcollection_0 = new qtism\data\SectionPartCollection($array_46);
$boolean_28 = false;
$boolean_29 = false;
$array_47 = array();
$preconditioncollection_4 = new qtism\data\rules\PreConditionCollection($array_47);
$array_48 = array();
$branchrulecollection_4 = new qtism\data\rules\BranchRuleCollection($array_48);
$nullvalue_24 = null;
$nullvalue_25 = null;
$string_59 = "S01";
$string_60 = "Section1";
$boolean_30 = true;
$assessmentsection_0 = new qtism\data\AssessmentSection($string_59, $string_60, $boolean_30);
$assessmentsection_0->setKeepTogether($boolean_0);
$assessmentsection_0->setSelection($nullvalue_4);
$assessmentsection_0->setOrdering($nullvalue_5);
$assessmentsection_0->setRubricBlocks($rubricblockcollection_0);
$assessmentsection_0->setSectionParts($sectionpartcollection_0);
$assessmentsection_0->setRequired($boolean_28);
$assessmentsection_0->setFixed($boolean_29);
$assessmentsection_0->setPreConditions($preconditioncollection_4);
$assessmentsection_0->setBranchRules($branchrulecollection_4);
$assessmentsection_0->setItemSessionControl($nullvalue_24);
$assessmentsection_0->setTimeLimits($nullvalue_25);
$array_49 = array($assessmentsection_0);
$assessmentsectioncollection_0 = new qtism\data\AssessmentSectionCollection($array_49);
$integer_21 = 0;
$integer_22 = 0;
$testpart_0 = new qtism\data\TestPart($string_4, $assessmentsectioncollection_0, $integer_21, $integer_22);
$testpart_0->setPreConditions($preconditioncollection_0);
$testpart_0->setBranchRules($branchrulecollection_0);
$testpart_0->setItemSessionControl($nullvalue_2);
$testpart_0->setTimeLimits($nullvalue_3);
$testpart_0->setTestFeedbacks($testfeedbackcollection_1);
$array_50 = array($testpart_0);
$testpartcollection_0 = new qtism\data\TestPartCollection($array_50);
$rootcomponent = new qtism\data\AssessmentTest($string_2, $string_3, $testpartcollection_0);
$rootcomponent->setToolName($string_0);
$rootcomponent->setToolVersion($string_1);
$rootcomponent->setOutcomeDeclarations($outcomedeclarationcollection_0);
$rootcomponent->setTimeLimits($nullvalue_0);
$rootcomponent->setOutcomeProcessing($nullvalue_1);
$rootcomponent->setTestFeedbacks($testfeedbackcollection_0);