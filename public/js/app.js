
$(function(){
	$('#select_facultad').on('change', function() {
		var id = $(this).val();
			if(id != "") {
				$.ajax({
					url: '/programs',
					type: 'GET',
					dataType: 'json',
					data: {
						faculty: id
					},
					async: true,
					success: function(programs) {
						$('#select_program').html('<option>Selecione programa</option>');
						if(programs.length > 0) {
							for(k in programs) {
								$('#select_program').append('<option value=' + programs[k].program_id + '>' + programs[k].program_name + '</option>');
							}
							$('#select_program').removeAttr('disabled','disabled');
						} else {
							$('#select_program').html('<option>Selecione programa</option>');
							$('#select_program').attr('disabled','disabled');
						}
					}
				});
			} else {
				$('#select_program').html('<option>Selecione programa</option>');
				$('#select_program').attr('disabled','disabled');
			}
	});

});	