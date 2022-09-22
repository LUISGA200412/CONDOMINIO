// Tigra Calendar v5.2 (11/20/2011)
// http://www.softcomplex.com/products/tigra_calendar/
// License: Public Domain... You're welcome.

// default settins - this structure can be moved in separate file in multilangual applications
var A_TCALCONF = {
	'cssprefix'  : 'tcal',
	'months'     : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
	'weekdays'   : ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
	'longwdays'  : ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
	'yearscroll' : true, // show year scroller
	'weekstart'  : 0, // first day of week: 0-Su or 1-Mo
	'prevyear'   : 'Previous Year',
	'nextyear'   : 'Next Year',
	'prevmonth'  : 'Previous Month',
	'nextmonth'  : 'Next Month',
	'format'     : 'm/d/Y' // 'd-m-Y', Y-m-d', 'l, F jS Y'
};

var A_TCALTOKENS = [
	 // A full numeric representation of a year, 4 digits
	{'t': 'Y', 'r': '19\\d{2}|20\\d{2}', 'p': function (d_date, n_value) { d_date.setFullYear(Number(n_value)); return d_date; }, 'g': function (d_date) { var n_year = d_date.getFullYear(); return n_year; }},
	 // Numeric representation of a month, with leading zeros
	{'t': 'm', 'r': '0?[1-9]|1[0-2]', 'p': function (d_date, n_value) { d_date.setMonth(Number(n_value) - 1); return d_date; }, 'g': function (d_date) { var n_month = d_date.getMonth() + 1; return (n_month < 10 ? '0' : '') + n_month }},
	 // A full textual representation of a month, such as January or March
	{'t': 'F', 'r': A_TCALCONF.months.join('|'), 'p': function (d_date, s_value) { for (var m = 0; m < 12; m++) if (A_TCALCONF.months[m] == s_value) { d_date.setMonth(m); return d_date; }}, 'g': function (d_date) { return A_TCALCONF.months[d_date.getMonth()]; }},
	 // Day of the month, 2 digits with leading zeros
	{'t': 'd', 'r': '0?[1-9]|[12][0-9]|3[01]', 'p': function (d_date, n_value) { d_date.setDate(Number(n_value)); if (d_date.getDate() != n_value) d_date.setDate(0); return d_date }, 'g': function (d_date) { var n_date = d_date.getDate(); return (n_date < 10 ? '0' : '') + n_date; }},
	// Day of the month without leading zeros
	{'t': 'j', 'r': '0?[1-9]|[12][0-9]|3[01]', 'p': function (d_date, n_value) { d_date.setDate(Number(n_value)); if (d_date.getDate() != n_value) d_date.setDate(0); return d_date }, 'g': function (d_date) { var n_date = d_date.getDate(); return n_date; }},
	 // A full textual representation of the day of the week
	{'t': 'l', 'r': A_TCALCONF.longwdays.join('|'), 'p': function (d_date, s_value) { return d_date }, 'g': function (d_date) { return A_TCALCONF.longwdays[d_date.getDay()]; }},
	// English ordinal suffix for the day of the month, 2 characters
	{'t': 'S', 'r': 'st|nd|rd|th', 'p': function (d_date, s_value) { return d_date }, 'g': function (d_date) { n_date = d_date.getDate(); if (n_date % 10 == 1 && n_date != 11) return 'st'; if (n_date % 10 == 2 && n_date != 12) return 'nd'; if (n_date % 10 == 3 && n_date != 13) return 'rd'; return 'th'; }}
	
];

function f_tcalGetHTML (d_date) {

	var e_input = f_tcalGetInputs(true);
	if (!e_input) return;

	var s_pfx = A_TCALCONF.cssprefix,
		s_format = A_TCALCONF.format;

	// today from config or client date
	var d_today = f_tcalParseDate(A_TCALCONF.today, A_TCALCONF.format);
	if (!d_today)
		d_today = f_tcalResetTime(new Date());

	// selected date from input or config or today 
	var d_selected = f_tcalParseDate(e_input.value, s_format);
	if (!d_selected)
		d_selected = f_tcalParseDate(A_TCALCONF.selected, A_TCALCONF.format);
	if (!d_selected)
		d_selected = new Date(d_today);
	
	// show calendar for passed or selected date
	d_date = d_date ? f_tcalResetTime(d_date) : new Date(d_selected);

	var d_firstDay = new Date(d_date);
	d_firstDay.setDate(1);
	d_firstDay.setDate(1 - (7 + d_firstDay.getDay() - A_TCALCONF.weekstart) % 7);

	var a_class, s_html = '<table id="' + s_pfx + 'Controls"><tbody><tr>'
		+ (A_TCALCONF.yearscroll ? '<td id="' + s_pfx + 'PrevYear" ' + f_tcalRelDate(d_date, -1, 'y') + ' title="' + A_TCALCONF.prevyear + '"></td>' : '')
		+ '<td id="' + s_pfx + 'PrevMonth"' + f_tcalRelDate(d_date, -1) + ' title="' + A_TCALCONF.prevmonth + '"></td><th>'
		+ A_TCALCONF.months[d_date.getMonth()] + ' ' + d_date.getFullYear()
		+ '</th><td id="' + s_pfx + 'NextMonth"' + f_tcalRelDate(d_date, 1) + ' title="' + A_TCALCONF.nextmonth + '"></td>'
		+ (A_TCALCONF.yearscroll ? '<td id="' + s_pfx + 'NextYear"' + f_tcalRelDate(d_date, 1, 'y') + ' title="' + A_TCALCONF.nextyear + '"></td>' : '')
		+ '</tr></tbody></table><table id="' + s_pfx + 'Grid"><tbody><tr>';

	// print weekdays titles
	for (var i = 0; i < 7; i++)
		s_html += '<th>' + A_TCALCONF.weekdays[(A_TCALCONF.weekstart + i) % 7] + '</th>';
	s_html += '</tr>' ;

	// print calendar table
	var n_date, n_month, d_current = new Date(d_firstDay);
	while (d_current.getMonth() == d_date.getMonth() ||
		d_current.getMonth() == d_firstDay.getMonth()) {

		s_html +='<tr>';
		for (var n_wday = 0; n_wday < 7; n_wday++) {

			a_class = [];
			n_date  = d_current.getDate();
			n_month = d_current.getMonth();

			if (d_current.getMonth() != d_date.getMonth())
				a_class[a_class.length] = s_pfx + 'OtherMonth';
			if (d_current.getDay() == 0 || d_current.getDay() == 6)
				a_class[a_class.length] = s_pfx + 'Weekend';
			if (d_current.valueOf() == d_today.valueOf())
				a_class[a_class.length] = s_pfx + 'Today';
			if (d_current.valueOf() == d_selected.valueOf())
				a_class[a_class.length] = s_pfx + 'Selected';

			s_html += '<td' + f_tcalRelDate(d_current) + (a_class.length ? ' class="' + a_class.join(' ') + '">' : '>') + n_date + '</td>';
			d_current.setDate(++n_date);
		}
		s_html +='</tr>';
	}
	s_html +='</tbody></table>';

	return s_html;
}

function f_tcalRelDate (d_date, d_diff, s_units) {

	var s_units = (s_units == 'y' ? 'FullYear' : 'Month');
	var d_result = new Date(d_date);
	if (d_diff) {
		d_result['set' + s_units](d_date['get' + s_units]() + d_diff);
		if (d_result.getDate() != d_date.getDate())
			d_result.setDate(0);
	}
	return ' onclick="f_tcalUpdate(' + d_result.valueOf() + (d_diff ? ',1' : '') + ')"';
}

function f_tcalResetTime (d_date) {
	d_date.setMilliseconds(0);
	d_date.setSeconds(0);
	d_date.setMinutes(0);
	d_date.setHours(12);
	return d_date;
}

// closes calendar and returns all inputs to default state
function f_tcalCancel () {
	
	var s_pfx = A_TCALCONF.cssprefix;
	var e_cal = document.getElementById(s_pfx);
	if (e_cal)
		e_cal.style.visibility = '';
	var a_inputs = f_tcalGetInputs();
	for (var n = 0; n < a_inputs.length; n++)
		f_tcalRemoveClass(a_inputs[n], s_pfx + 'Active');
}

function f_tcalUpdate (n_date, b_keepOpen) {

	var e_input = f_tcalGetInputs(true);
	if (!e_input) return;
	
	d_date = new Date(n_date);
	var s_pfx = A_TCALCONF.cssprefix;

	if (b_keepOpen) {
		var e_cal = document.getElementById(s_pfx);
		if (!e_cal || e_cal.style.visibility != 'visible') return;
		e_cal.innerHTML = f_tcalGetHTML(d_date, e_input);
	}
	else {
		e_input.value = f_tcalGenerateDate(d_date, A_TCALCONF.format);
		f_tcalCancel();
	}
}

function f_tcalOnClick () {

	// see if already opened
	var s_pfx = A_TCALCONF.cssprefix;
	var s_activeClass = s_pfx + 'Active';
	var b_close = f_tcalHasClass(this, s_activeClass);

	// close all clalendars
	f_tcalCancel();
	if (b_close) return;

	// get position of input
	f_tcalAddClass(this, s_activeClass);
	
	var n_left = f_getPosition (this, 'Left'),
		n_top  = f_getPosition (this, 'Top') + this.offsetHeight;

	var e_cal = document.getElementById(s_pfx);
	if (!e_cal) {
		e_cal = document.createElement('div');
		e_cal.onselectstart = function () { return false };
		e_cal.id = s_pfx;
		document.getElementsByTagName("body").item(0).appendChild(e_cal);
	}
	e_cal.innerHTML = f_tcalGetHTML(null);
	e_cal.style.top = n_top + 'px';
	e_cal.style.left = (n_left + this.offsetWidth - e_cal.offsetWidth) + 'px';
	e_cal.style.