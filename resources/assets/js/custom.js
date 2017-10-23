jQuery(function($){
	IMOVEIS = window.IMOVEIS || {};	

	IMOVEIS.goBack = function(){
		$('.go-black').click(function(){			
			window.location.href = "/home"; 
		});
	};

	IMOVEIS.save = function(){
		$('form.formulario-imovel').submit(function(e){
			e.preventDefault();
			url = $(this).attr('action');
			type = $(this).attr('method');
			datainputs = $(this).serialize();								
			$.ajax({
				type: type,
				url: url,	
				data : datainputs, 					
				dataType  : 'json', 
				success: function( retornar ){
					console.log(retornar);						
					swal.queue([{
						title: retornar.status == 1 ? "Sucesso!" :  "Erro!",
						confirmButtonText: 'OK',
						type: retornar.status == 1 ? 'success': 'error',
						text: retornar.message,
						showLoaderOnConfirm: true,
						preConfirm: function () {
							if(retornar.status == 1){									
								window.location.href = "/home";
							}else{
								swal.close();
							}
						}
					}]);
				},
				error:function( retornar ){						
					console.error(retornar);						
				}
			});
		});
	};

	IMOVEIS.delete = function(){
		$('.delete').click( function(e){		
			e.preventDefault();
			url = '/delete';
			type = 'post';
			row = $(this).closest('tr');
			datainputs = 'id=' + $(row).find('.id_row').html();
			swal({
				title: 'Atenção',
				text: "Excluir registro permanente",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',				
				confirmButtonText: 'Excluir',
				cancelButtonText: 'Cancelar'
			}).then(function () {				
				$.ajax({
					type: type,
					url: url,	
					data : datainputs, 					
					dataType  : 'json', 
					success: function( retornar ){
						console.log(retornar);	
						$(row).remove();
						swal.queue([{
							title: retornar.status == 1 ? "Sucesso!" :  "Erro!",
							confirmButtonText: 'OK',
							type: retornar.status == 1 ? 'success': 'error',
							text: retornar.message,
							showLoaderOnConfirm: true,
							preConfirm: function () {
								if(retornar.status == 1){									
									swal.close();
								}else{
									swal.close();
								}
							}
						}]);
					},
					error:function( retornar ){						
						console.error(retornar);						
					}
				});
			})
		});
	};

	IMOVEIS.filterImobiliarias = function(){
		$('.filter-imobiliarias').change(function(e){
			e.preventDefault();
			url = "/search/imobiliaria/" + $(this).find('option:selected').val();

			console.log(url);
			type = "get"
			datainputs = $(this).serialize();								
			$.ajax({
				type: type,
				url: url,	
				data : datainputs, 					
				dataType  : 'json', 
				success: function( retornar ){
					console.log(retornar.data);
					
					$('#list-itens tbody').html('');
					console.log($('#list-itens tbody').html());
					count = 0;
					template = $('#template-table-home').html();
					for( v in retornar.data){						
						$('#list-itens tbody').append( template );
						
						$('#list-itens tbody tr:eq('+v+') td:eq(0)').html(retornar.data[v].id);
						$('#list-itens tbody tr:eq('+v+') td:eq(1)').html(retornar.data[v].imobiliaria);
						$('#list-itens tbody tr:eq('+v+') td:eq(2)').html(retornar.data[v].type);
						$('#list-itens tbody tr:eq('+v+') td:eq(3)').html(retornar.data[v].description);
						$('#list-itens tbody tr:eq('+v+') td:eq(4)').html(retornar.data[v].adress);
						$('#list-itens tbody tr:eq('+v+') td:eq(5) a').attr('href', '/edit/'+ retornar.data[v].id);
					}
					IMOVEIS.delete();					
				},
				error:function( retornar ){						
					console.error(retornar);						
				}
			});
		});
	};
	

	IMOVEIS.init = (function(){
		IMOVEIS.goBack();		
		IMOVEIS.save();
		IMOVEIS.delete();
		IMOVEIS.filterImobiliarias();
	}());


});