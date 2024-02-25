 let searchBtn = document.querySelector('#search-btn');
 let searchBar = document.querySelector('.search-btn-container');
 let menu = document.querySelector('#menu-bar');
 let navbar = document.querySelector('.navbar');
 let imgbtn = document.querySelectorAll('.img-btn');



window.onscroll = () =>{
	searchBtn.classList.remove('fa-times');
	searchBar.classList.remove('active');
	menu.classList.remove('fa-times');
	navbar.classList.remove('active');
}

menu.addEventListener('click',() =>{
	menu.classList.toggle('fa-times');
	navbar.classList.toggle('active');

});


searchBtn.addEventListener('click',() =>{
	searchBtn.classList.toggle('fa-times');
	searchBar.classList.toggle('active');
});


imgbtn.forEach(btn =>{
	btn.addEventListener('click', ()=>{
		document.querySelector('.controls .active').classList.remove('active');
		btn.classList.add('active');
		let src =btn.getAttribute('data-src');
		document.querySelector('#img-slider').src =src;
	});
});








