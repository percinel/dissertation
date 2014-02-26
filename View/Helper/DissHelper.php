<?php 
	App::uses('AppHelper', 'View/Helper');
	class DissHelper extends AppHelper  {
		
		public function getStepFields($process_step_name) {
			$o = Configure::read('process_road');
			$related_fields = $o[$process_step_name]['fields'];
			return $related_fields;
		}

		public function getAvaliableActions($process_step_name) {
			$o = Configure::read('process_road');
			$step_conf = $o[$process_step_name];
			$actions = $step_conf['actions'];
			return $actions;
		}

		public function getZoneTrans($zone) {
			$o = Configure::read('process_zones_translations');
			return $o[$zone];
		}
	}
