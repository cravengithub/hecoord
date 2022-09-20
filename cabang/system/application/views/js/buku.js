$('document').ready(function(){
	//hover
	$('#buku tbody tr:even').addClass('even');
	
	//paging
	$('.paging a').live('click', function(){
		$('.kandang').load($(this).attr('href')+' #kotak', function(){
			$('#buku tbody tr:even').addClass('even');		
		}); return false;
	});
	
	//filter
	$('input[name="filter"]').live('keyup', function(e){
		if(e.which == 27) { $(this).val(''); $('#buku tbody tr').removeClass('visible'); }
		
		var val = $.trim($(this).val());
		$('#buku tbody tr').each(function(){
			($(this).find('td:eq(1)').text().search(new RegExp(val, "i")) < 0 ) ? $(this).removeClass('visible').hide() : $(this).addClass('visible').show();
			
		$('#buku tbody tr').removeClass('even'); 
		$('#buku tbody tr.visible:even').addClass('even');
		});
	});
	  
	//sorting
	$('#buku thead th').live('click', function(){
		$(this).addClass('current');
		
		$(this).parents('tr').find('th').each(function(index){
			if($(this).hasClass('current')) column = index;
		});

		var $rows = $(this).parents('table').find('tbody tr').get();
		
		$.each($rows, function(index, row) {  
			row.sortKey = $(row).children('td').eq(column).text().toUpperCase();
		});  
		 
		var sortDirection = $(this).is('.sorted-asc') ? -1 : 1;
		 
		$rows.sort(function(a, b) {  
		  if (a.sortKey < b.sortKey) return -sortDirection;  
		  if (a.sortKey > b.sortKey) return  sortDirection;  
		  return 0;  
		});  
		
		$.each($rows, function(index, row) {  
		  $('tbody').append(row);  
		  row.sortKey = null;  
		});
		
		 //identify the column sort order  
		 $('th').removeClass('sorted-asc sorted-desc current');  			 
		 sortDirection == 1 ? $(this).addClass('sorted-asc') : $(this).addClass('sorted-desc');  
	   
		 //identify the column to be sorted by  
		 $('td').removeClass('sorted')  
				.filter(':nth-child(' + (column + 1) + ')')  
				.addClass('sorted');
		$('#buku tbody tr').removeClass('even');
		$('#buku tbody tr:even').addClass('even');
	});
});