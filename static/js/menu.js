var body = document.body;
var displaying_menu = false;
var displaying_search = false;
var sMenu_btn_svg = document.getElementById('menu_btn').children[0];
var sSearch_btn = document.getElementById('search_btn');

if(isDetail)
{
	// var hamburger_url = '/media/svg/hamburger-6-w.svg';
	var hamburger_url = '/media/svg/play-w.svg';
	var search_url = '/media/svg/magnifying-glass-6-k.svg';
	var x_url = '/media/svg/x-6-w.svg';
}
else
{
	// var hamburger_url = '/media/svg/hamburger-6-k.svg';
	var hamburger_url = '/media/svg/play-k.svg';
	var search_url = '/media/svg/magnifying-glass-6-k.svg';
	var x_url = '/media/svg/x-6-k.svg';
}

sMenu_btn_svg.src = hamburger_url;

function togglemenu(){
	if(displaying_menu)
	{
		body.classList.remove('displaying_menu');
		sMenu_btn_svg.src = hamburger_url;
		displaying_menu = false;
	}
	else
	{
		body.classList.add('displaying_menu');
		sMenu_btn_svg.src = x_url;
		displaying_menu = true;
	}
}

function togglesearch(){
	if(displaying_search)
	{
		body.classList.remove('displaying_search');
		sSearch_btn.src = search_url;
		displaying_search = false;
	}
	else
	{
		body.classList.add('displaying_search');
		sSearch_btn.src = x_url;
		displaying_search = true;
	}
}
function show_search(){
	var sSearch_input = document.getElementById('search_input');
	sSearch_input.focus();
	body.classList.add('displaying_search');
	sSearch_btn.src = x_url;
	displaying_search = true;
}