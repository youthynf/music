$(function () {
	function addFile() {
		var $this = $(this)
		var file = $this[0].files[0]
		if (!_valid.img('img', file)) {
			return
		}
		$this.siblings('img').remove()
		var fr = new FileReader()
		fr.onload = function(e) {
			var img = new Image()
			img.src = e.target.result
			img.classList.add('pull-left')
			img.classList.add('upload_img')
			$this.parent().prepend(img).end()
				.siblings('.invisible').removeClass('invisible')
				.siblings('.upload').addClass('hidden')
			$('#del').val('0')
		}
		fr.readAsDataURL(file)
	}
	$('.J_img').on('change', addFile)
	$('.J_remove').on('click', function () {
		$(this).addClass('invisible')
			.siblings('img').remove().end()
			.siblings('.btn').addClass('invisible').end()
			.siblings('.upload').removeClass('hidden').end()
			// .siblings('input')[0].outerHTML = ''
			.siblings('input').remove().end()
			.parent().append('<input type="file" name="img" id="img" class="invisible form-control J_img" accept="image/jpeg,image/jpg,image/png">')
			.find('.J_img').on('change', addFile)
			$('#del').val('1')
			// if (file.outerHTML) {
			// 	file.outerHTML = file.outerHTML;
			// } else { // FF(包括3.5)
			// 	file.value = "";
			// }
	})
})
