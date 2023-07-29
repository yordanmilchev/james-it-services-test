//define function clearFiltersForm() if not exist
if (typeof window.clearFiltersForm === 'undefined') {
    window.clearFiltersForm = function() {
		$('#filters_form').find("input[type=text], input[type=email], select, textarea").val("");
        Livewire.emit('filtersCleared');
    }
}

jQuery(document).ready(function () {
	var kt_portlet_filters_form = new KTPortlet('kt_portlet_filters_form', {
		tooltips: true,
		tools: {
			toggle: {
				collapse: 'Collapse',
				expand: 'Expand'
			},
			reload: 'Reload',
			remove: 'Remove',
		},
	});
	kt_portlet_filters_form.on('beforeRemove', function (kt_portlet_filters_form) {
		return confirm(
			'Are you sure that you want to remove filters?'
		); // remove portlet after user confirmation
	});
	kt_portlet_filters_form.on('reload', function (kt_portlet_filters_form) {
		clearFiltersForm();
	});
});
