function SendRequest(){
	// //window.location.reload();
 // var message = document.getElementById("message");

	// //message.innerHTML = "oi";

	// message.innerHTML = "";

	// var xhr = new XMLHttpRequest();

	// xhr.open('Get', 'http://www.nfc-portugal.com/nfcconnect/HeaderRequest.php', false);
	// //HeaderRequest.php
	// //http://www.nfc-portugal.com/nfcconnect/
	// //http://192.168.1.175/nfcconnect/HeaderRequest.php', false);
	// //Post http://localhost/nfcconnect/HeaderRequest.php
	// xhr.setRequestHeader("CardID", '123');
	// //xhr.onreadystatechange = handler;
	// xhr.onreadystatechange = function () {
	// // if (this.status == 200 && this.readyState == 4) {
	// console.log('response: ' + this.responseText);

	//  message.innerHTML = 'response: ' + this.responseText;

	// //}
	// };
	// xhr.send();

//'http://localhost:437/service.svc/logins/jeffrey/house/fas6347/devices?format=json'
	$(document).ready(function() {

		var jqxhr = $.ajax({

			url: 'http://www.nfc-portugal.com/nfcconnect/HeaderRequest.php',
			type: 'GET',
			datatype: 'text',
			success: function() { //alert("Success"); 
message.innerHTML = 'response: ' + jqxhr.responseText;
		},
			error: function() { alert('Failed!'); },
			beforeSend: setHeader

		});

	});

}




function setHeader(xhr) {

 xhr.setRequestHeader('Authorization', 'Basic faskd52352rwfsdfs');
 xhr.setRequestHeader('X-PartnerKey', '3252352-sdgds-sdgd-dsgs-sgs332fs3f');
 xhr.setRequestHeader('CardID', '12345');
}

function Clear(){
 var message = document.getElementById("message");

	//message.innerHTML = "oi";

	message.innerHTML = " ";
}
window.onload = function() {

}
