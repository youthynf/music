require('expose-loader?$!jquery')
require('expose-loader?axios!axios')
require('expose-loader?_!lodash')

require('babel-polyfill')

require('bootstrap/dist/css/bootstrap.css')
require('font-awesome/css/font-awesome.css')
require('ionicons/dist/css/ionicons.css')
require('admin-lte/dist/css/AdminLTE.css')
require('admin-lte/dist/css/skins/skin-green-light.css')
require('icheck/skins/square/blue.css')
require('bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')
require('bootstrap')
require('admin-lte')
require('icheck')
require('bootstrap-datepicker')
require('bootstrap-datepicker/dist/locales/bootstrap-datepicker.zh-CN.min.js')
require('./css/index.css')
require('./css/index.scss')

require('expose-loader?_valid!./js/validate.js')
require('expose-loader?datepicker!./js/datepicker.js')

let init = require('./js/index.js')
$(function () {
	init.nav()
	init.adduserClick()
	init.checkboxToggle()
	$('.J_FloatNum').on('blur', function () {
		$(this).val(parseFloat($(this).val()).toFixed(2))
	})
	$('.J_IntNum').on('blur', function () {
		$(this).val(parseFloat($(this).val()).toFixed(0))
	})
})
