$(function(){
	$(document).ready(function(){
       $('.delcat').click(function(){
       	var id = $(this).data('id');
       	var text = $(this).data('text');
       		$.ajax({
       			type : 'POST',
       			url  : surl+'Cateogry/deleteCateogry',
       			data :{
       				id:id,
       				text:text
       			},
       			success :function(data){
       				var ndata = JSON.parse(data);
       				//console.log(ndata);
       				if(ndata.return == true){
       					$('.error').text(ndata.message);
       					$('.ccat'+id).fadeOut();
       				}else if(ndata.return == false){
       					$('.error').text(ndata.message);
       				}else{
       					$('.error').text('Something Went Wrong.');
       				}
       				
       			},
       			error :function(){
       				$('.error').text('Something Went Wrong.');
       			}
       		});
		}); 
	});
})

//Deleting Sub Cateogry

$(function(){
       $(document).ready(function(){
       $('.delsubcat').click(function(){
              var id = $(this).data('id');
              var text = $(this).data('text');
                     $.ajax({
                            type : 'POST',
                            url  : surl+'SubCateogry/deleteSubCateogry',
                            data :{
                                   id:id,
                                   text:text
                            },
                            success :function(data){
                                   var ndata = JSON.parse(data);
                                   //console.log(ndata);
                                   if(ndata.return == true){
                                          $('.error').text(ndata.message);
                                          $('.ccat'+id).fadeOut();
                                   }else if(ndata.return == false){
                                          $('.error').text(ndata.message);
                                   }else{
                                          $('.error').text('Something Went Wrong.');
                                   }
                                   
                            },
                            error :function(){
                                   $('.error').text('Something Went Wrong.');
                            }
                     });
              }); 
       });
})
//Deleting Brands
$(function(){
       $(document).ready(function(){
       $('.delbrand').click(function(){
              var id = $(this).data('id');
              var text = $(this).data('text');
                     $.ajax({
                            type : 'POST',
                            url  : surl+'Brand/deleteBrand',
                            data :{
                                   id:id,
                                   text:text
                            },
                            success :function(data){
                                   var ndata = JSON.parse(data);
                                   //console.log(ndata);
                                   if(ndata.return == true){
                                          $('.error').text(ndata.message);
                                          $('.ccat'+id).fadeOut();
                                   }else if(ndata.return == false){
                                          $('.error').text(ndata.message);
                                   }else{
                                          $('.error').text('Something Went Wrong.');
                                   }
                                   
                            },
                            error :function(){
                                   $('.error').text('Something Went Wrong.');
                            }
                     });
              }); 
       });
})
//Deleting Products
$(function(){
       $(document).ready(function(){
       $('.delproduct').click(function(){
              
              var id = $(this).data('id');
              var text = $(this).data('text');
                     $.ajax({
                            type : 'POST',
                            url  : surl+'Products/deleteProduct',
                            data :{
                                   id:id,
                                   text:text
                            },
                            success :function(data){
                                   var ndata = JSON.parse(data);
                                   //console.log(ndata);
                                   if(ndata.return == true){
                                          $('.error').text(ndata.message);
                                          alert(ndata.message);
                                          $('.pcat'+id).fadeOut();
                                   }else if(ndata.return == false){
                                          $('.error').text(ndata.message);
                                   }else{
                                          $('.error').text('Something Went Wrong.');
                                   }
                                   
                            },
                            error :function(){
                                   $('.error').text('Something Went Wrong.');
                            }
                     });
              }); 
       });
})
//Deleting Manufacturer
$(function(){
       $(document).ready(function(){
       $('.delmanufact').click(function(){
              var id = $(this).data('id');
              var text = $(this).data('text');
                     $.ajax({
                            type : 'POST',
                            url  : surl+'Manufact/deleteManufact',
                            data :{
                                   id:id,
                                   text:text
                            },
                            success :function(data){
                                   var ndata = JSON.parse(data);
                                   //console.log(ndata);
                                   if(ndata.return == true){
                                          $('.error').text(ndata.message);
                                          $('.ccat'+id).fadeOut();
                                   }else if(ndata.return == false){
                                          $('.error').text(ndata.message);
                                   }else{
                                          $('.error').text('Something Went Wrong.');
                                   }
                                   
                            },
                            error :function(){
                                   $('.error').text('Something Went Wrong.');
                            }
                     });
              }); 
       });
})
//Deleting Retailer 
$(function(){
       $(document).ready(function(){
       $('.delretailer').click(function(){
              var id = $(this).data('id');
              var text = $(this).data('text');
                     $.ajax({
                            type : 'POST',
                            url  : surl+'Retailer/deleteRetailer',
                            data :{
                                   id:id,
                                   text:text
                            },
                            success :function(data){
                                   var ndata = JSON.parse(data);
                                   //console.log(ndata);
                                   if(ndata.return == true){
                                          $('.error').text(ndata.message);
                                          $('.ccat'+id).fadeOut();
                                   }else if(ndata.return == false){
                                          $('.error').text(ndata.message);
                                   }else{
                                          $('.error').text('Something Went Wrong.');
                                   }
                                   
                            },
                            error :function(){
                                   $('.error').text('Something Went Wrong.');
                            }
                     });
              }); 
       });
})
//Deleting Users 
$(function(){
       $(document).ready(function(){
       $('.deluser').click(function(){
              var id = $(this).data('id');
              var text = $(this).data('text');
                     $.ajax({
                            type : 'POST',
                            url  : surl+'Users/deleteUser',
                            data :{
                                   id:id,
                                   text:text
                            },
                            success :function(data){
                                   var ndata = JSON.parse(data);
                                   //console.log(ndata);
                                   if(ndata.return == true){
                                          $('.error').text(ndata.message);
                                          $('.ccat'+id).fadeOut();
                                   }else if(ndata.return == false){
                                          $('.error').text(ndata.message);
                                   }else{
                                          $('.error').text('Something Went Wrong.');
                                   }
                                   
                            },
                            error :function(){
                                   $('.error').text('Something Went Wrong.');
                            }
                     });
              }); 
       });
})