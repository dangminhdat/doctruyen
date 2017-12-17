 $(function(){
 	
 	$('.bxslider').bxSlider({
 		auto: true,
 		infiniteLoop: false,
 		slideWidth: 250,
 		captions: true,
 		minSlides: 2,
 		maxSlides: 3,
 		moveSlides: 1,
 		hideControlOnEnd: true,
 		slideMargin: 20
 	})
	

 	$('.scrolltop').on('click',function(){
 		$('body').animate({scrollTop:0});
 		return false;
 	})
 	
 	$('#go').on('click',function(){
 		$chapter = $('#chaper input[type="text"]').val();
 		$truyen_tranh = $('#chaper').attr('data-id');
 		$.ajax({
 			url : 'controller/xuly.php',
 			type: 'POST',
 			data : {
 				chapter : $chapter,
 				truyen_tranh : $truyen_tranh,
 				action : 'go'
 			},success : function(data){
 				location.href = (data);
 			}
 		})
 	})
 	$('#TimKiem button').on('click',function(){
 		$search = $('#textTimKiem').val();
 		if($search != '')
 		{
	 		$.ajax({
	 			url : 'controller/xuly.php',
	 			type : 'POST',
	 			data : {
	 				search : $search,
	 				action : 'timkiem'
	 			},success : function(data){
	 				$('#show_timkiem').html(data);
	 				$()
	 				$('#show_timkiem').addClass('thongtin');
	 			}
	 		})
	 	}	
 	})
 	
}) 


 