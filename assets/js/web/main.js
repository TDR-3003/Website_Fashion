// Detail product
$(document).ready(function(){
	var plus_btn = document.querySelector('.chitietsp_quantity--plus');
	var minimus_btn = document.querySelector('.chitietsp_quantity--minus');
	var quantity_input = document.querySelector('#get_quantity');
	var current_quantity = 0;
	if(quantity_input != null){
		current_quantity = Number(quantity_input.getAttribute('value'));
	

		plus_btn.onclick = function() {
			quantity_input.setAttribute('value', current_quantity = current_quantity+1);
		}

		minimus_btn.onclick = function() {
			quantity_input.setAttribute('value', current_quantity = current_quantity-1);
			if(current_quantity <= 0){
				current_quantity = 1;
				quantity_input.setAttribute('value', 1);
			}
			
		}
	}
});