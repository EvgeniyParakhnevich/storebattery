$(function() {
	

	const onClickPanel = e => {
		e.preventDefault();
		const btn = $(e.currentTarget);
		const url = document.location.href + btn.data('value');
		$('.sort__opt li').removeClass('selected');
		btn.closest('li').addClass('selected');
		$.ajax({
            type: 'GET',
            url: url,
            dataType: 'html',
            success: function(data){

				const list = $(data).find('#ajaxSection');
				// console.log(list);
				$('#ajaxSection').replaceWith(list);
				// $('.js_pagination_container').append(pagination);
                
            }
        });

		console.log('init');
	}

	$(document).on("click", ".panel-click", onClickPanel);




})