(function($) {
	/**
	 * Modal Update controle de notas
	*/
	var formModal = $('#formModal'),
		formUrl = formModal.data('url'),
		updateInput = $('.updateInput'),
		$updateBtn = $('.updateBtn');

	/**
	 * Altera a o action do form incluindo o id do caderno no final da url
	*/
	$updateBtn.on('click', function() {
		var $this = $(this),
			dataId = $this.data('id'),
			dataName = $this.data('name'),
			urlFormat = formUrl + '/' + dataId;

		formModal.attr('action', urlFormat);
		updateInput.val(dataName);
	});

	/**
	 * Controle de exibição de tarefas especificas
	*/
	var well = $('#wellShow'),
		wellClose = $('#closeWellShow');

	wellClose.on('click', function() {
		well.slideUp(500);
	});

	/**
	 * Controle do modal de update de tarefas
	*/
	var formModalTask = $('#formModalTask'),
		formUrlTask = formModalTask.data('url'),
		$updateBtnTask = $('#btnTaskUpdate'),
		titleInput = $('#titleUpdate'),
		descriptionInput = $('#descriptionUpdate');

	/**
	 * Altera a o action do form incluindo o id do caderno no final da url
	*/
	$updateBtnTask.on('click', function() {
		var $this = $(this),
			dataId = $this.data('id'),
			dataTitle = $this.data('title'),
			dataDescription = $this.data('description'),
			urlFormat = formUrlTask + '/' + dataId;

		formModalTask.attr('action', urlFormat);
		titleInput.val(dataTitle);
		descriptionInput.val(dataDescription);	
	});

})(jQuery);