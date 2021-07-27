const base = location.protocol+'//'+location.host;
const route = document.getElementsByName('routeName')[0].getAttribute('content');

document.addEventListener('DOMContentLoaded', function(){

	var btn_search = document.getElementById('btn_search');
	var form_search = document.getElementById('form_search');
	var form_avatar_change = document.getElementById('form_avatar_change');
	var btn_avatar_edit = document.getElementById('btn_avatar_edit');
	var avatar_change_overlay = document.getElementById('avatar_change_overlay');
	var input_file_avatar = document.getElementById('input_file_avatar');

	var serie_equipo = document.getElementById('Serie_Equipo');
	var serie_equipo_r = document.getElementById('Serie_Equipo_R');
	var serie_equipo_m = document.getElementById('Serie_Equipo_M');

	if(serie_equipo){
		serie_equipo.addEventListener('change', function(){
			var url = base+ '/admin/equipment/output' + '/' + serie_equipo.value;
			window.location.href = url;
			// console.log(url);
		})
	}

	if(serie_equipo_r){
		serie_equipo_r.addEventListener('change', function(){
			var url = base+ '/admin/repair/output' + '/' + serie_equipo_r.value;
			window.location.href = url;
			// console.log(url);
		})
	}

	if(serie_equipo_m){
		serie_equipo_m.addEventListener('change', function(){
			var url = base+ '/admin/maintenance/program' + '/' + serie_equipo_m.value;
			window.location.href = url;
			// console.log(url);
		})
	}

	if(btn_avatar_edit){
		btn_avatar_edit.addEventListener('click', function(e){
			e.preventDefault();
			input_file_avatar.click();
		})
	}

	if(input_file_avatar){
		input_file_avatar.addEventListener('change', function(){
			var load_img = '<img src="'+base+'/static/images/loader_white.svg"/>';
			avatar_change_overlay.innerHTML = load_img;
			avatar_change_overlay.style.display = 'flex';
			form_avatar_change.submit();
		})
	}

	if(btn_search){
		btn_search.addEventListener('click', function(e){
			e.preventDefault();
			if(form_search.style.display === 'block'){
				form_search.style.display = 'none';
			}else{
				form_search.style.display = 'block';
			}
		});
	}
	if(route == "product_edit"){
		var btn_product_file_image = document.getElementById('btn_product_file_image');
		var product_file_image = document.getElementById('product_file_image');
		btn_product_file_image.addEventListener('click', function(){
			product_file_image.click();
		}, false);

		product_file_image.addEventListener('change', function(){
			document.getElementById('form_product_gallery').submit();
		});
	}

	document.getElementsByClassName('lk-'+route)[0].classList.add('active');

	//Eliminar producto
	// btn_deleted = document.getElementsByClassName('btn-deleted');
	// for(i=0; i< btn_deleted.length; i++){
	// 	btn_deleted[i].addEventListener('click', delete_object);
	// }

});


//Función para eliminar producto
// function delete_object(e){
// 	e.preventDefault();
// 	var object = this.getAttribute('data-object');
// 	var action =  this.getAttribute('data-action');
// 	var path = this.getAttribute('data-path');
// 	var url = base + '/' + path + '/' + object + '/' + action;
// 	//console.log(object, action, path, url);
// 	var title, text, icon;

// 	if(action == "delete"){
// 		title = "¿Estás seguro de eliminar?";
// 		text = "Dicha acción enviará el equipo a la papelera ";
// 		icon = "warning";
// 		Swal.fire({
// 			title: title,
// 			text: text,
// 			icon: icon,
// 			showCancelButton: true,
// 			confirmButtonText: 'Confirmar',
// 			cancelButtonText: 'Cancelar',
// 		}).then((result) => {
// 			if (result.value) {
// 				window.location.href = url;
// 			}
// 		});
// 	}

// 	if(action == "restore"){
// 		title = "¿Estás seguro de restaurar?";
// 		text = "Dicha acción restaurará el equipo en el sistema ";
// 		icon = "info";
// 		Swal.fire({
// 			title: title,
// 			text: text,
// 			icon: icon,
// 			showCancelButton: true,
// 			confirmButtonText: 'Confirmar',
// 			cancelButtonText: 'Cancelar',
// 		}).then((result) => {
// 			if (result.value) {
// 				window.location.href = url;
// 			}
// 		});
// 	}

// 	if(action == "info"){
// 		title = "Información Equipo";
// 		text = this.getAttribute('data');
// 		icon = "info";
// 		Swal.fire({
// 			title: title,
// 			html: text,
// 			icon: icon,
// 			confirmButtonText: 'OK',
// 		});
// 	}

// }

