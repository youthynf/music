exports.datepicker = (opts = {}) => {
	opts.selector = opts.selector ? opts.selector : '#datepicker'
	opts.format = opts.format ? opts.format : 'yyyy-mm-dd'
	opts.endDate = opts.endDate ? opts.endDate : '0d'
	$(opts.selector).datepicker({
		language: 'zh-CN',
		format: opts.format,
		endDate: opts.endDate
	})
}
