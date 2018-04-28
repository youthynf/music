$(function () {
	let validate = require('../validate.js')
	var form = document.forms['userForm']
	$(form).on('submit', function () {
		return submitForm()
	})
	$('#name').on('blur input', function () {
		vaildName('name', $('#name').val())
	})
	$('#email').on('blur input', function () {
		vaildEmail('email', $('#email').val())
	})
	$('#gender').on('blur', function () {
		required('gender', '性别', $('#gender').val())
	})
	$('#password').on('blur input', function () {
		vaildPassword('password', $('#password').val())
	})
	$('#repassword').on('blur input', function () {
		vaildRePassword('repassword', $('#repassword').val())
	})
	$('#phone').on('blur input', function () {
		vaildPhone('phone', $('#phone').val())
	})
	$('#realname').on('blur input', function () {
		vaildRealname('realname', $('#realname').val())
	})
	$('#birth_date').on('blur', function () {
		vaildBirth_date('birth_date', $('#birth_date').val())
	})
	function submitForm() {
		var name = form['name']
		var email = form['email']
		var gender = form['gender']
		var password = form['password']
		var repassword = form['repassword']
		var phone = form['phone']
		var realname = form['realname']
		var birth_date = form['birth_date']
		if (!vaildName('name', name.value)) {
			return false
		}
		if (!vaildEmail('email', email.value)) {
			return false
		}
		if (!required('gender', '性别', gender.value)) {
			return false
		}
		if (!vaildPassword('password', password.value)) {
			return false
		}
		if (!vaildRePassword('repassword', repassword.value)) {
			return false
		}
		if (!vaildPhone('phone', phone.value)) {
			return false
		}
		if (!vaildRealname('realname', realname.value)) {
			return false
		}
		if (!vaildBirth_date('birth_date', birth_date.value)) {
			return false
		}
		return true
	}
})
