exports.nav = () => {
	let curpath = window.location.pathname
	let origin = window.location.origin
	$('.sidebar-menu')
	.find('.active').removeClass('active').end()
	.find('a').each(function (idx, elem) {
		let href = $(this).attr('href')
		let sublength = href.indexOf('admin')
		if (sublength > 0) {
			href = '/' + href.substr(sublength)
		}
		if (curpath.indexOf(href) > -1) {
			$(this)
				.parent().addClass('active').end()
				.parents('.treeview').addClass('active')
		}
	})
}
exports.adduserClick = () => {
	$('#addUser,#cancel_addUser').click(function () {
		$('#agentRole').toggle()
		$('#addAgent').toggle()
	})
}
exports.checkboxToggle = () => {
	$('.checkbox-toggle').click(function () {
		var clicks = $(this).data('clicks')
		if (clicks) {
			// Uncheck all checkboxes
			$(".table td input[type='checkbox']").prop('checked', false)
			$('.fa', this).removeClass('fa-check-square-o').addClass('fa-square-o')
		} else {
			// Check all checkboxes
			$(".table td input[type='checkbox']").prop('checked', true)
			$('.fa', this).removeClass('fa-square-o').addClass('fa-check-square-o')
		}
		$(this).data('clicks', !clicks)
	})
}
