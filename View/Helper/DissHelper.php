<?php 
	App::uses('AppHelper', 'View/Helper');
	class DissHelper extends AppHelper  {
		

		public function hasWorkToDo($role, $process) {
			$step = $process['Process']['step'];
			return $role == $this->getStepOpt($step,'owner');
		}

		public function getStepFields($step) {
			return $this->getStepOpt($step, 'fields');
		}

		public function getFormPrototypes($step) {
			return $this->getStepOpt($step, 'form_prototypes');
		}

		public function getRestrictedFields($step) {
			return $this->getStepOpt($step, 'restrictedFields');
		}

		public function getAvaliableActions($step) {
			$o = Configure::read('process_actions');
			return $o[$step];
		}

		public function getZoneTrans($zone) {
			$o = Configure::read('process_zones_translations');
			return $o[$zone];
		}
	
		public function getStepOpt($step,$option) {
			$o = Configure::read('process_road');
			if(isset($o[$step][$option])) {
				return $o[$step][$option];
			}
			return false;
		}

		public function getFullName($authUser) {
			if(empty($authUser)) {
				return "Belirlenmemis ..";
			}
			return $authUser['firstname'] ."&nbsp;". $authUser['lastname'];
		}
	}







































