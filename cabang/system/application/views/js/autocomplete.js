$('document').ready(function(){
	var root = location.href.replace(/index.php\/autocomplete\/?/, '');
	var img_path = root+'application/views/img/';
	$('input[name="autocomplete"]').keyup(function(event){
		
		//jika click esc clear field
		var keynum  = (window.event) ? event.which : event.keyCode;
		if(keynum == 27) {
			$(this).val('');
		}
		
		//jika field kosong clear list buku
		if($(this).val() == ''){
			$('#autocomplete ').find('li.au').remove();
		}else{
			//munculkan loading pada saat request buku
			$('img#lo').removeClass('visible');
			//get data buku
			$.post(root+'index.php/autocomplete/get_buku', {judul:$(this).val()}, function(data){
				$('img#lo').addClass('visible');
				if(data.length > 0){
					// jika data buku yang dicari ditemukan sembuyikan loading;
					
					
					//remove list buku
					$('#autocomplete').find('li.au').remove();
					
					//looping data buku yang ditemukan
					$.each(data, function(i){
						var li  = '<li class="au" ><div class="img_buku"><img src="'+img_path+data[i].img+'"></div>';
						    li += '<b>'+data[i].judul+'</b><br><span>'+data[i].penulis+'</span></li>';
						$('#autocomplete').append(li);
					});
	
				}else{
					//jika buku yang dicari tidak ditemukan , beri pesan;
					$('img#lo').addClass('visible');
					$('#autocomplete').find('li.au').remove();
					$('#autocomplete').append('<li class="au">judul buku tidak ditemukan</li>');
				}
			}, 'json');
		}				
	});
	
	$('li.au').live('click', function(){
		//jika list hasil pencarian buku di click beri nilai judul buku pada field input;
		$('input[name="autocomplete"]').val($(this).find('b').text());
		$('#autocomplete li.au').fadeOut(100);
	});	
});