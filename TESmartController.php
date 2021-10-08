<?php
	/*
		PHP Class for controlling TESmart network KVMs
			Written by Martin Roberts

		Support device types
			TESMART8HDMI4K30	TESmart 8 port HDMI 4k 30hz KVM
			TESMART8HDMI4K60	TESmart 8 port HDMI 4k 60hz KVM
			TESMART16HDMI4K30	TESmart 16 port HDMI 4k 30hz KVM
			TESMART16HDMI4K60	TESmart 16 port HDMI 4k 60hz KVM

		Error codes and messages can be got from class
			$last_error_code
			$last_error_message

		Error Codes
			5		not a valid IP address
			10		valid port number
			15		not a support device
			20		Please set the controller before attempting to call a command
			25		Command not supported by device
			30		Connection problem

	*/


	class TESmartController {

		private $controller_type = NULL; // Controller type
		private $controller_ip = NULL; // IP address of controller
		private $controller_port = NULL; // port of controller
		private $controller_commands = array(); // commands the controller accepts
		private $controller_set = false; // false = controller not set

		public $last_error_code = 0;
		public $last_error_message = NULL;

		function __construct() {
			// initialize an object's properties upon creation
		}

		function __destruct() {
			// object is destructed or the script is stopped or exited
		}

		public function define_controller( string $type, string $ip, int $port ): bool {

			$this->last_error_code = 0;

			if ( !filter_var( $ip, FILTER_VALIDATE_IP ) ) {
				$this->last_error_message = "$ip is not a valid IP address";
				$this->last_error_code = 5; // invalid IP
			} else {
				if ( $port > 0 ) {
					switch ( $type ) {
						case "TESMART8HDMI4K30":
						case "TESMART8HDMI4K60":
						$this->controller_type = $type;
						$this->controller_ip = $ip;
						$this->controller_port = $port;
						$this->controller_set = true;

						$this->controller_commands = array(
							"port1" => 				array( "command" => "\xAA\xBB\x03\x01\x01\xEE", "return" => false ),
							"port2" => 				array( "command" => "\xAA\xBB\x03\x01\x02\xEE", "return" => false ),
							"port3" => 				array( "command" => "\xAA\xBB\x03\x01\x03\xEE", "return" => false ),
							"port4" => 				array( "command" => "\xAA\xBB\x03\x01\x04\xEE", "return" => false ),
							"port5" => 				array( "command" => "\xAA\xBB\x03\x01\x05\xEE", "return" => false ),
							"port6" => 				array( "command" => "\xAA\xBB\x03\x01\x06\xEE", "return" => false ),
							"port7" =>	 			array( "command" => "\xAA\xBB\x03\x01\x07\xEE", "return" => false ),
							"port8" => 				array( "command" => "\xAA\xBB\x03\x01\x08\xEE", "return" => false ),
							"activeport" => 		array( "command" => "\xAA\xBB\x03\x10\x00\xEE", "return" => true )

							return true;
							break;
						case "TESMART16HDMI4K30":
						case "TESMART16HDMI4K60":
							$this->controller_type = $type;
							$this->controller_ip = $ip;
							$this->controller_port = $port;
							$this->controller_set = true;

							$this->controller_commands = array(
								"port1" => 				array( "command" => "\xAA\xBB\x03\x01\x01\xEE", "return" => false ),
								"port2" => 				array( "command" => "\xAA\xBB\x03\x01\x02\xEE", "return" => false ),
								"port3" => 				array( "command" => "\xAA\xBB\x03\x01\x03\xEE", "return" => false ),
								"port4" => 				array( "command" => "\xAA\xBB\x03\x01\x04\xEE", "return" => false ),
								"port5" => 				array( "command" => "\xAA\xBB\x03\x01\x05\xEE", "return" => false ),
								"port6" => 				array( "command" => "\xAA\xBB\x03\x01\x06\xEE", "return" => false ),
								"port7" =>	 			array( "command" => "\xAA\xBB\x03\x01\x07\xEE", "return" => false ),
								"port8" => 				array( "command" => "\xAA\xBB\x03\x01\x08\xEE", "return" => false ),
								"port9" => 				array( "command" => "\xAA\xBB\x03\x01\x09\xEE", "return" => false ),
								"port10" => 			array( "command" => "\xAA\xBB\x03\x01\x0A\xEE", "return" => false ),
								"port11" => 			array( "command" => "\xAA\xBB\x03\x01\x0B\xEE", "return" => false ),
								"port12" =>	 			array( "command" => "\xAA\xBB\x03\x01\x0C\xEE", "return" => false ),
								"port13" => 			array( "command" => "\xAA\xBB\x03\x01\x0D\xEE", "return" => false ),
								"port14" => 			array( "command" => "\xAA\xBB\x03\x01\x0E\xEE", "return" => false ),
								"port15" => 			array( "command" => "\xAA\xBB\x03\x01\x0F\xEE", "return" => false ),
								"port16" => 			array( "command" => "\xAA\xBB\x03\x01\x10\xEE", "return" => false ),
								"ledtimeout10" =>	 	array( "command" => "\xAA\xBB\x03\x03\x0A\xEE", "return" => false ),
								"ledtimeout30" => 		array( "command" => "\xAA\xBB\x03\x03\x1E\xEE", "return" => false ),
								"ledtimeoutnever" => 	array( "command" => "\xAA\xBB\x03\x03\x00\xEE", "return" => false ),
								"mutebuzzer" => 		array( "command" => "\xAA\xBB\x03\x02\x00\xEE", "return" => false ),
								"unmutebuzzer" => 		array( "command" => "\xAA\xBB\x03\x02\x01\xEE", "return" => false ),
								"activeport" => 		array( "command" => "\xAA\xBB\x03\x10\x00\xEE", "return" => true )

							return true;
							break;
						default:
							$this->last_error_message = "$type is not a support device";
							$this->last_error_code = 15; // device not supported
					}
				} else {
					$this->last_error_message = "$port is not a valid port number";
					$this->last_error_code = 10; // device not supported
				}
			}

			return false;
		}

		public function send_command( string $command ) {

			$this->last_error_code = 0;

			if ( $this->controller_set ) {
				if ( array_key_exists( $command, $this->controller_commands ) ) {
					return $this->call_command( $command );
				} else {
					$this->last_error_message = "Command not supported by device";
					$this->last_error_code = 25; // Command not supported by device
				}
			} else {
				$this->last_error_message = "Please set the controller before attempting to call a command";
				$this->last_error_code = 20; // device not set
			}
			return false;
		}

		private function call_command( string $command ) {

			$this->last_error_code = 0;

			$input = false;

			$cmd = $this->controller_commands[ $command ]["command"];
			$return = $this->controller_commands[ $command ]["return"];

			$socket = socket_create( AF_INET, SOCK_STREAM, SOL_TCP );
			socket_connect( $socket , $this->controller_ip, $this->controller_port ); // connect to the port

			// if connection failed, display error message
			if ( $socket ) {
				// connection successful
				socket_write( $socket, $cmd, strlen( $cmd ) );

				if ( $return ) {
					$input = array_map( "bin2hex", str_split( socket_read( $socket, 128 ) ) );
				} else {
					$input = true;
				}
			} else {
				$this->last_error_message = socket_last_error( $socket );
				$this->last_error_code = 30; // device not supported
			}

			socket_close( $socket );

			return $input;
		}
	}
?>