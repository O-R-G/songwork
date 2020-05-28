var body = document.body;
var displaying_menu = isCatalogue ? true : false;
var sMenu_btn_svg = document.getElementById('menu_btn').children[0];

if(isDetail)
{
	var hamburger_url = '/media/svg/hamburger-6-w.svg';
	var x_url = '/media/svg/x-6-w.svg';
}
else
{
	var hamburger_url = '/media/svg/hamburger-6-k.svg';
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