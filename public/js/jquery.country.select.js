/*!
 * Usage:
 *
 *	 <select id="country" data-selected-value="US"></select>
 *	 <script>
 *		 $(document).ready(function(){
 *			 var options = {
 *				 showFullName: true,
 *				 showEmptyValue: true,
 *				 emptyValueLabel: 'Select Country...'
 *			 };
 *			 $('#country').countrySelect(options);
 *		 });
 *	 </script>
 */
;(function ( $, window, document, undefined ) {

	"use strict";

	// defaults
	var pluginName = 'countrySelect';
	
	var defaults = {
		showFullName: true,
		showEmptyValue: true,
		emptyValueLabel: 'Select Country',
		countries: {
			AF: "Afghanistan", 
			AL: "Albania", 
			DZ: "Algeria", 
			AS: "American Samoa", 
			AD: "Andorra", 
			AO: "Angola", 
			AI: "Anguilla", 
			AQ: "Antarctica", 
			AG: "Antigua and Barbuda", 
			AR: "Argentina", 
			AM: "Armenia", 
			AW: "Aruba", 
			AU: "Australia", 
			AT: "Austria", 
			AZ: "Azerbaijan", 
			BH: "Bahrain", 
			BD: "Bangladesh", 
			BB: "Barbados", 
			BY: "Belarus", 
			BE: "Belgium", 
			BZ: "Belize", 
			BJ: "Benin", 
			BM: "Bermuda", 
			BT: "Bhutan", 
			BO: "Bolivia", 
			BA: "Bosnia and Herzegovina", 
			BW: "Botswana", 
			BV: "Bouvet Island", 
			BR: "Brazil", 
			IO: "British Indian Ocean Territory", 
			VG: "British Virgin Islands", 
			BN: "Brunei", 
			BG: "Bulgaria", 
			BF: "Burkina Faso", 
			BI: "Burundi", 
			CI: "C&ocirc;te d'Ivoire", 
			KH: "Cambodia", 
			CM: "Cameroon", 
			CA: "Canada", 
			CV: "Cape Verde", 
			KY: "Cayman Islands", 
			CF: "Central African Republic", 
			TD: "Chad", 
			CL: "Chile", 
			CN: "China", 
			CX: "Christmas Island", 
			CC: "Cocos (Keeling) Islands", 
			CO: "Colombia", 
			KM: "Comoros", 
			CG: "Congo", 
			CK: "Cook Islands", 
			CR: "Costa Rica", 
			HR: "Croatia", 
			CU: "Cuba", 
			CY: "Cyprus", 
			CZ: "Czech Republic", 
			CD: "Democratic Republic of the Congo", 
			DK: "Denmark", 
			DJ: "Djibouti", 
			DM: "Dominica", 
			DO: "Dominican Republic", 
			TP: "East Timor", 
			EC: "Ecuador", 
			EG: "Egypt", 
			SV: "El Salvador", 
			GQ: "Equatorial Guinea", 
			ER: "Eritrea", 
			EE: "Estonia", 
			ET: "Ethiopia", 
			FO: "Faeroe Islands", 
			FK: "Falkland Islands", 
			FJ: "Fiji", 
			FI: "Finland", 
			MK: "Former Yugoslav Republic of Macedonia", 
			FR: "France", 
			FX: "France, Metropolitan", 
			GF: "French Guiana", 
			PF: "French Polynesia", 
			TF: "French Southern Territories", 
			GA: "Gabon", 
			GE: "Georgia", 
			DE: "Germany", 
			GH: "Ghana", 
			GI: "Gibraltar", 
			GR: "Greece", 
			GL: "Greenland", 
			GD: "Grenada", 
			GP: "Guadeloupe", 
			GU: "Guam", 
			GT: "Guatemala", 
			GN: "Guinea", 
			GW: "Guinea-Bissau", 
			GY: "Guyana", 
			HT: "Haiti", 
			HM: "Heard and Mc Donald Islands", 
			HN: "Honduras", 
			HK: "Hong Kong", 
			HU: "Hungary", 
			IS: "Iceland", 
			IN: "India", 
			ID: "Indonesia", 
			IR: "Iran", 
			IQ: "Iraq", 
			IE: "Ireland", 
			IL: "Israel", 
			IT: "Italy", 
			JM: "Jamaica", 
			JP: "Japan", 
			JO: "Jordan", 
			KZ: "Kazakhstan", 
			KE: "Kenya", 
			KI: "Kiribati", 
			KW: "Kuwait", 
			KG: "Kyrgyzstan", 
			LA: "Laos", 
			LV: "Latvia", 
			LB: "Lebanon", 
			LS: "Lesotho", 
			LR: "Liberia", 
			LY: "Libya", 
			LI: "Liechtenstein", 
			LT: "Lithuania", 
			LU: "Luxembourg", 
			MO: "Macau", 
			MG: "Madagascar", 
			MW: "Malawi", 
			MY: "Malaysia", 
			MV: "Maldives", 
			ML: "Mali", 
			MT: "Mayotte", 
			MH: "Marshall Islands", 
			MQ: "Martinique", 
			MR: "Mauritania", 
			MU: "Mauritius", 
			MX: "Mexico", 
			FM: "Micronesia", 
			MD: "Moldova", 
			MC: "Monaco", 
			MN: "Mongolia", 
			ME: "Montenegro", 
			MS: "Montserrat", 
			MA: "Morocco", 
			MZ: "Mozambique", 
			MM: "Myanmar", 
			NA: "Namibia", 
			NR: "Nauru", 
			NP: "Nepal", 
			NL: "Netherlands", 
			AN: "Netherlands Antilles", 
			NC: "New Caledonia", 
			NZ: "New Zealand", 
			NI: "Nicaragua", 
			NE: "Niger", 
			NG: "Nigeria", 
			NU: "Niue", 
			NF: "Norfolk Island", 
			KP: "North Korea", 
			MP: "Northern Marianas", 
			NO: "Norway", 
			OM: "Oman", 
			PK: "Pakistan", 
			PW: "Palau", 
			PA: "Panama", 
			PG: "Papua New Guinea", 
			PY: "Paraguay", 
			PE: "Peru", 
			PH: "Philippines", 
			PN: "Pitcairn Islands", 
			PL: "Poland", 
			PT: "Portugal", 
			PR: "Puerto Rico", 
			QA: "Qatar", 
			RE: "Reunion", 
			RO: "Romania", 
			RU: "Russia", 
			RW: "Rwanda", 
			ST: "S&atilde;o Tom&eacute; and Pr&iacute;ncipe", 
			SH: "Saint Helena", 
			PM: "St. Pierre and Miquelon", 
			KN: "Saint Kitts and Nevis", 
			LC: "Saint Lucia", 
			VC: "Saint Vincent and the Grenadines", 
			WS: "Samoa", 
			SM: "San Marino", 
			SA: "Saudi Arabia", 
			SN: "Senegal", 
			RS: "Serbia", 
			SC: "Seychelles", 
			SL: "Sierra Leone", 
			SG: "Singapore", 
			SK: "Slovakia", 
			SI: "Slovenia", 
			SB: "Solomon Islands", 
			SO: "Somalia", 
			ZA: "South Africa", 
			GS: "South Georgia and the South Sandwich Islands", 
			KR: "South Korea", 
			ES: "Spain", 
			LK: "Sri Lanka", 
			SD: "Sudan", 
			SR: "Suriname", 
			SJ: "Svalbard and Jan Mayen Islands", 
			SZ: "Swaziland", 
			SE: "Sweden", 
			CH: "Switzerland", 
			SY: "Syria", 
			TW: "Taiwan", 
			TJ: "Tajikistan", 
			TZ: "Tanzania", 
			TH: "Thailand", 
			BS: "The Bahamas", 
			GM: "The Gambia", 
			TG: "Togo", 
			TK: "Tokelau", 
			TO: "Tonga", 
			TT: "Trinidad and Tobago", 
			TN: "Tunisia", 
			TR: "Turkey", 
			TM: "Turkmenistan", 
			TC: "Turks and Caicos Islands", 
			TV: "Tuvalu", 
			VI: "US Virgin Islands", 
			UG: "Uganda", 
			UA: "Ukraine", 
			AE: "United Arab Emirates", 
			GB: "United Kingdom", 
			US: "United States", 
			UM: "United States Minor Outlying Islands", 
			UY: "Uruguay", 
			UZ: "Uzbekistan", 
			VU: "Vanuatu", 
			VA: "Vatican City", 
			VE: "Venezuela", 
			VN: "Vietnam", 
			WF: "Wallis and Futuna Islands", 
			EH: "Western Sahara", 
			YE: "Yemen", 
			ZM: "Zambia", 
			ZW: "Zimbabwe"
		}
	};

	/**
	 * contructor
	 */
	function Plugin(element, options) {
		this.element = element;
		this.settings = $.extend({}, defaults, options);
		this._defaults = defaults;
		this._name = pluginName;
		this.init();
	}

	/**
	 * Using extend avoids Plugin.prototype conflicts
	 */
	$.extend(Plugin.prototype, {
		
		/**
		 * Initialize
		 */
		init: function () {
			var $elem = $(this.element);
			var selectedValue = $elem.data('selected-value');
			this.populateSelect($elem,selectedValue);
		},
		
		/**
		 * @param jQuery element
		 * @param string the selected country
		 */
		populateSelect: function($elem, selectedValue) {

			if (this.settings.showEmptyValue) {
				$elem.append($("<option/>", {
					value: '',
					text: this.settings.emptyValueLabel
				}));
			}
			
			var that = this;
			$.each(this.settings.countries, function(key, value) {
				$elem.append($("<option/>", {
					value: key,
					html: that.settings.showFullName ? value : key,
					selected: key === selectedValue
				}));
			});
		}
	});

	/**
	 * Export the plugin to jQuery, making sure there is only one instance
	 */
	$.fn[ pluginName ] = function ( options ) {
		return this.each(function() {
			if ( !$.data( this, "plugin_" + pluginName ) ) {
				$.data( this, "plugin_" + pluginName, new Plugin( this, options ) );
			}
		});
	};

})( jQuery, window, document );
