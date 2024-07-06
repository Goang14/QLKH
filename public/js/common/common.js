function loadPage(isLoad) {
    var loader = document.getElementById("loader");
    if (isLoad == true) {
        loader.classList.remove("loader--hidden");
    } else {
        loader.classList.add("loader--hidden");
    }
}

// debounce
function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

/**
 * always ajax
 * @param {*} idForm id is Form submit
 * @param {*} alway is always
 */
function alwaysAjax(idForm, always) {
	try {
		$('.is-invalid').removeClass('is-invalid');
		if (always.status !== 'success') {
			if(always.status === 422 || always.status === 400) {
				const errors = always?.responseJSON?.errors;
				if (typeof errors === 'object' && errors !== null && !(errors instanceof Array)) {
					for (var key in errors) {
						if (errors.hasOwnProperty(key)) {
							$(`#${idForm} #${key}`).addClass('is-invalid');
							$(`#${idForm} #error_${key}`).text(errors[key]);
						}
					}
				}
			} else {
				alert('System Error!');
			}
		} else {
            $('.toast').toast('show');
        }
	} catch (error) {
		alert('System Error!');
		console.error(error);
	}
}
