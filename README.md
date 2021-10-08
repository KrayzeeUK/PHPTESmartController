# PHPTESmartController

PHP Based Class for controlling TESmart network KVMs
			Written by Martin Roberts
			
		functions
			define_controller( Device name as below, IP address, Port number )
			send_command( Comamnd as per list below )

		Support device types
			TESMART8HDMI4K30	TESmart 8 port HDMI 4k 30hz KVM
			TESMART8HDMI4K60	TESmart 8 port HDMI 4k 60hz KVM
			TESMART16HDMI4K30	TESmart 16 port HDMI 4k 30hz KVM
			TESMART16HDMI4K60	TESmart 16 port HDMI 4k 60hz KVM

		commands				Support by
			port1				TESMART8HDMI4K30, TESMART8HDMI4K60, TESMART16HDMI4K30, TESMART16HDMI4K60
			port2				TESMART8HDMI4K30, TESMART8HDMI4K60, TESMART16HDMI4K30, TESMART16HDMI4K60
			port3				TESMART8HDMI4K30, TESMART8HDMI4K60, TESMART16HDMI4K30, TESMART16HDMI4K60
			port4				TESMART8HDMI4K30, TESMART8HDMI4K60, TESMART16HDMI4K30, TESMART16HDMI4K60
			port5				TESMART8HDMI4K30, TESMART8HDMI4K60, TESMART16HDMI4K30, TESMART16HDMI4K60
			port6				TESMART8HDMI4K30, TESMART8HDMI4K60, TESMART16HDMI4K30, TESMART16HDMI4K60
			port7				TESMART8HDMI4K30, TESMART8HDMI4K60, TESMART16HDMI4K30, TESMART16HDMI4K60
			port8				TESMART8HDMI4K30, TESMART8HDMI4K60, TESMART16HDMI4K30, TESMART16HDMI4K60
			port9				TESMART16HDMI4K30, TESMART16HDMI4K60
			port10				TESMART16HDMI4K30, TESMART16HDMI4K60
			port11				TESMART16HDMI4K30, TESMART16HDMI4K60
			port12				TESMART16HDMI4K30, TESMART16HDMI4K60
			port13				TESMART16HDMI4K30, TESMART16HDMI4K60
			port14				TESMART16HDMI4K30, TESMART16HDMI4K60
			port15				TESMART16HDMI4K30, TESMART16HDMI4K60
			port16				TESMART16HDMI4K30, TESMART16HDMI4K60
			ledtimeout10		TESMART16HDMI4K30, TESMART16HDMI4K60
			ledtimeout30		TESMART16HDMI4K30, TESMART16HDMI4K60
			ledtimeoutnever		TESMART16HDMI4K30, TESMART16HDMI4K60
			mutebuzzer			TESMART16HDMI4K30, TESMART16HDMI4K60
			unmutebuzzer		TESMART16HDMI4K30, TESMART16HDMI4K60
			activeport			TESMART8HDMI4K30, TESMART8HDMI4K60, TESMART16HDMI4K30, TESMART16HDMI4K60

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
   
   
   example code
   
   	include("TESmartController.php");

    $host = "192.168.0.50"; // host IP to connect to
    $port = 5000; // host port to connect to

    $c1 = new TESmartController;
    $c1->define_controller("TESMART16HDMI4K60",$host,$port);

    $c1->send_command("port1"); // Change to port 1

    $ret = $c1->send_command("activeport"); // Get currently active port

    echo "<pre>" . print_r( $ret, true ) . "</pre>"; ; // Display port info

    echo $c1->last_error_message; // Display error mesage if any errors
   
if you wish to donates or contributiosn to the work done and any future work then please use the link below. Thanks

http://paypal.me/krayzeeuk
