var csPageOptions = {
	domain_key: ia_cloudsponge.domain_key,
	referrer: 'invite-anyone',
	afterSubmitContacts:function(contacts) {
		var emails = [];
		var contact, name, email;
		for(var i=0; i < contacts.length; i++) {
			contact = contacts[i];
			name = contact.fullName();
			email = contact.selectedEmail();
			emails.push(email);
		}


		var textarea = document.getElementById('invite-anyone-email-addresses');
		/* Strip any manually entered whitespace */
		var already_emails = textarea.value.replace(/^\s+|\s+$/g,"");
		
		var new_emails;
		var new_emails_for_input;
		if ( already_emails == false ) {
			new_emails = emails.join("\n");
			new_emails_for_input = emails;
		} else {
			new_emails = already_emails + "\n" + emails.join("\n")
			new_emails_for_input = already_emails.replace(/\s/,',') + ',' + emails;
		}
		document.getElementById('invite-anyone-email-addresses').value = new_emails;
		document.getElementById('cloudsponge-emails').value = new_emails_for_input;
	}
}

if ( ia_cloudsponge.locale ) {
	cloudsponge.init( { locale: 'es' } );
}

if ( ia_cloudsponge.stylesheet ) {
	cloudsponge.init( { stylesheet: 'http://foo.com' } );
}
