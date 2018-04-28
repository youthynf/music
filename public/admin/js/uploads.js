$(function() {
	var dels = []
	function showImg () {
		var $this = $(this)
		var file = this.files[0]
		var idx = parseInt($this.attr('id').substr(-1))
		var id = parseInt($this.data('id'))
		if (!_valid.img('imgs', file)) {
			return
		}
		$this.parent().find('img').remove()
		var fr = new FileReader()
		fr.onload = function(e) {
			if ($this.parent().find('img').length > 0) {
				return
			}
			var img = new Image()
			img.src = e.target.result
			img.classList.add('pull-left')
			img.classList.add('upload_img')
			if ($('.upload_box').length < 4 && $('#img' + (idx + 1)).length == 0) {
				addFile(idx)
			}
			$this.parents('.upload_box').prepend(img).end()
				.siblings('.invisible').removeClass('invisible')
				.siblings('.upload').addClass('hidden')
			for(var i = 0; i < dels.length; i++) {
				if (dels[i] == id) {
					dels.splice(i, 1)
					break
				}
			}
			$('#dels').val(dels)
		}
		fr.readAsDataURL(file)
	}
	function addFile (idx) {
		var nid = parseInt(idx) + 1
		var template = '<div class="upload_box pull-left ml-10 mt-10"><label for="img' + nid + '" class="upload pull-left"><i class="glyphicon glyphicon-plus"></i></label><label class="btn btn-primary pull-left invisible ml-10" for="img' + nid + '">修改</label><div class="btn btn-danger pull-left invisible ml-10 mt-10 J_remove">删除</div><input type="file" name="imgs[]" id="img' + nid + '" class="form-control invisible J_imgs" accept="image/jpeg,image/jpg,image/png"></div>'
		$('.upload_list').append(template)
			.find('.J_imgs').off('change', showImg).on('change', showImg).end()
			.find('.J_removes').off('change', showImg).on('click', removeFile)
	}
	function removeFile () {
		var idx = $(this).siblings('input').attr('id').substr(-1)
		var id = $(this).siblings('input').data('id')
		$(this).addClass('invisible')
			.siblings('img').remove().end()
			.siblings('.btn').addClass('invisible').end()
			.siblings('.upload').removeClass('hidden').end()
			.siblings('input').remove().end()
			.parent().append('<input type="file" name="imgs[]" id="img' + idx + '" data-id="' + id + '" class="invisible form-control J_imgs" accept="image/jpeg,image/jpg,image/png">')
			.find('.J_imgs').on('change', showImg)
		if (id) {
			dels.push(id)
			$('#dels').val(dels)
		}
	}
	$('.J_imgs').on('change', showImg)
	$('.J_removes').on('click', removeFile)
})
