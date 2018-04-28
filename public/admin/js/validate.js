/**
 * 必需字段
 *
 * @param field {string} 字段名称
 * @param fieldtxt {string} 字段汉字名称
 * @param value {string} 字段值
 * @returns {boolean}
 */
const ness = (field, fieldtxt, value) => {
	if (value) {
		$('#' + field + '_txt').text('')
		return true
	} else {
		$('#' + field + '_txt').text(fieldtxt + '不能为空')
		return false
	}
}
exports.ness = ness

/**
 * 检查name
 *
 * @param field {string} 字段名称
 * @param fieldtxt {string} 字段汉字名称
 * @param value {string} 字段值
 * @param table {string} /check时的表名
 * @param isRequired {boolean} 是否必须
 * @returns {boolean}
 */
exports.name = (field, fieldtxt, value, table, isRequired = true) => {
	let valid = false, temp
	if (isRequired) {
		temp = ness(field, fieldtxt, value)
	}
	if (temp) {
		if (value.length < 4) {
			$('#' + field + '_txt').text(fieldtxt + '不能少于4个字符')
			valid = false
		} else {
			let id = $('#id').val() ? $('#id').val() : false,
				params = {
					field: field,
					table: table,
					value: value
				}
			if (id) {
				params['id'] = id
			}
			return axios.post('/check', params)
				.then(res => {
					if (res.data == 'false') {
						$('#' + field + '_txt').text('')
						valid = true
					} else {
						$('#' + field + '_txt').text(`${fieldtxt}已经存在`)
						valid = false
					}
					return valid
				})
				.catch(err => {
					console.log(err)
				})
		}
	}
	return valid
}

// exports.checkField = (field, fieldtxt, value, table) => {
// 	let id = $('#id').val() ? $('#id').val() : false,
// 		params = {
// 			field: field,
// 			table: table,
// 			value: value
// 		}
// 	if (id) {
// 		params['id'] = id
// 	}
// 	return axios.post('/check', params)
// 		.then(res => {
// 			if (res.data == 'false') {
// 				$('#' + field + '_txt').text('')
// 				valid = true
// 			} else {
// 				$('#' + field + '_txt').text(fieldtxt + '已经存在')
// 				valid = false
// 			}
// 			return valid
// 		})
// 		.catch(err => {
// 			console.log(err)
// 		})
// }

/**
 * 检查name 文章标题、后台登录
 *
 * @param field {string} 字段名称
 * @param fieldtxt {string} 字段汉字名称
 * @param value {string} 字段值
 * @param table {string} /check时的表名
 * @param isRequired {boolean} 是否必须
 * @returns {boolean}
 */
exports.title = (field, fieldtxt, value, lng = 4, isRequired = true) => {
	var valid = false, temp = true
	if (isRequired) {
		temp = ness(field, fieldtxt, value)
	}
	if (temp) {
		if (value.length < lng && value.length > 0) {
			$('#' + field + '_txt').text(fieldtxt + `不能少于${lng}个字符`)
			valid = false
		} else {
			$('#' + field + '_txt').text('')
			valid = true
		}
	}
	return valid
}

exports.email = (field, value, isRequired = true) => {
	let valid = false, temp = true
	let reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+\.([a-zA-Z0-9_-])+/
	if (isRequired) {
		temp = ness(field, '邮箱', value)
	}
	if (temp) {
		if (value.length > 0) {
			if (!reg.test(value)) {
				$('#' + field + '_txt').text('邮箱格式不对')
				valid = false
			} else {
				$('#' + field + '_txt').text('')
				valid = true
			}
		}
	}
	return valid
}

exports.password = (field, value, isRequired = true) => {
	let valid = false, temp = true
	if (isRequired) {
		temp = ness(field, '密码', value)
	}
	if (temp) {
		if (value.length < 6 && value.length > 0) {
			$('#' + field + '_txt').text('密码至少要6位')
			valid = false
		} else {
			$('#' + field + '_txt').text('')
			valid = true
		}
	}
	return valid
}

exports.repassword = (field, value, isRequired = true) => {
	let valid = false, temp = true
	if (isRequired) {
		temp = ness(field, '确认密码', value)
	}
	if (temp) {
		if (value.length < 6 && value.length > 0) {
			$('#' + field + '_txt').text('确认密码至少要6位')
			valid = false
		} else {
			if ($('#password').val() !== value) {
				$('#' + field + '_txt').text('两次密码不一致')
				valid = false
			} else {
				$('#' + field + '_txt').text('')
				valid = true
			}
		}
	}
	return valid
}

exports.phone = (field, value) => {
	let valid = true
	if (value) {
		if (!/^1[3456789]\d{9}$/.test(value)) {
			$('#' + field + '_txt').text('手机格式不对')
			valid = false
		} else {
			$('#' + field + '_txt').text('')
			valid = true
		}
	}
	return valid
}

exports.realname = (field, value) => {
	let valid = true
	if (value) {
		if (value.length > 6) {
			$('#' + field + '_txt').text('姓名不能大于6位')
			valid = false
		} else {
			$('#' + field + '_txt').text('')
			valid = true
		}
	}
	return valid
}

/**
 * 出生日期、生成日期
 *
 * @param field {string} 字段名称
 * @param fieldtxt {string} 字段汉字名称
 * @param value {string} 字段值
 * @param isRequired {boolean} 是否必须
 * @returns {boolean}
 */
exports.birth_date = (field, fieldtxt, value, isRequired = false) => {
	let valid = true, temp = true
	if (isRequired) {
		temp = ness(field, fieldtxt, value)
	}
	if (temp) {
		if (!/^([0-9]{4})+-([0-1][1-9])+-([0-3][0-9])$/.test(value)) {
			$('#' + field + '_txt').text(fieldtxt + '格式为yyyy-mm-dd')
			valid = false
		} else {
			$('#' + field + '_txt').text('')
			valid = true
		}
	} else {
		valid = false
	}
	return valid
}

exports.scale = (field, value, isRequired = true) => {
	let valid = false, temp
	if (isRequired) {
		temp = ness(field, '分销比例', value)
	}
	if (temp) {
		if (isNaN(parseFloat(value))) {
			$('#' + field + '_txt').text('请输入数字')
			valid = false
		} else if (value <= 0 || value > 1) {
			$('#' + field + '_txt').text('分销比例区间在0~1之间')
			valid = false
		} else {
			$('#' + field + '_txt').text('')
			valid = true
		}
	}
	return valid
}

exports.desc = (field, fieldtxt, value, lng = 50, isRequired = false) => {
	let valid = true, temp = true
	if (isRequired) {
		temp = ness(field, fieldtxt, value)
	}
	if (temp) {
		if (value.length > lng) {
			$('#' + field + '_txt').text(fieldtxt + '在' + lng + '个字内')
			valid = false
		} else {
			$('#' + field + '_txt').text('')
			valid = true
		}
	}
	return valid
}

/**
 * 图片验证
 *
 * @param field {string} 图片字段
 * @param file {file} 文件
 * @returns {boolean}
 */
exports.img = (field, file) => {
	if (file.size / 1024 > 200) {
		$('#' + field + '_txt').text('图片太大')
		return false
	}
	if (file.type !== 'image/png' && file.type !== 'image/jpeg') {
		$('#' + field + '_txt').text('图片格式只支持png和jpg')
		return false
	}
	$('#' + field + '_txt').text('')
	return true
}

/**
 * 价格、库存数量验证
 *
 * @param field {string} 字段名称
 * @param fieldtxt {string} 字段汉字名称
 * @param value {string} 字段值
 * @returns {boolean}
 */
exports.number = (field, fieldtxt, value, isRequired = true) => {
	var valid = false, temp = true
	if (isRequired) {
		temp = ness(field, fieldtxt, value)
	}
	if (temp) {
		if (value < 0) {
			$('#' + field + '_txt').text(fieldtxt + '不能小于0')
			valid = false
		} else {
			$('#' + field + '_txt').text('')
			valid = true
		}
	}
	return valid
}
