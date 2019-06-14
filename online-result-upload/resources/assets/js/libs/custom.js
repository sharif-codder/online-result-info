$(document).ready(function(){
	$('#notice-list').totemticker({
		        row_height:'127px',
				mousestop:true
			});

 /*add-member*/
    var getinput= function(){
        return{
           name:$('.member-name').val(),
	       id: $('.member-id').val(),
	       imagepath:$('.member-image').val(),
	       membercontainer:'.display-member'
        }
    }
    var clearfield = function(getvalue){
        var feilds,fieldsArr;
        console.log(getvalue);
        fields= $('.add-member').find("input");
        fieldsArr = Array.prototype.slice.call(fields);
        console.log(fieldsArr);
        fieldsArr.forEach(function(current, index, array){
            current.value = "";
        });
        fieldsArr[0].focus();
    }
    var addmember = function(getvalue){
    	var html,element,newhtml,imagpaths,imagesource,imageset;
    	element = getvalue.membercontainer;
    	imagpaths = getvalue.imagepath;
		imagesource = imagpaths.replace(/\\/g, '/');
		imageset = imagesource.split('/');
    	html ='<div class="member-item" id="%memberid%"><div class="member-thumb"><img src="assets/images/%imageid%"></div><div class="member-info"><p>%name%<p><p>id:%id%</p></div><div class="item-delete"><span><i class="fa fa-times" aria-hidden="true"></i></span></div></div>';
    	newhtml = html.replace("%name%",getvalue.name);
    	newhtml = newhtml.replace("%memberid%",getvalue.id);
    	newhtml = newhtml.replace("%id%",getvalue.id);
    	newhtml = newhtml.replace("%imageid%",imageset[imageset.length - 1]);
    	$(element).append(newhtml);
    	clearfield(getvalue);
    }

	$('.member-add').click(function(){
		  var getvalue = getinput();
          if(getvalue.name !=='' && getvalue.id !==''){
               addmember(getvalue);
          }
          else{
          	console.log("chater bal");
          }
	});

	/*delete member*/
    $(".display-member").click(function(event){
         var itemid,el;
         itemid = event.target.parentNode.parentNode.parentNode.id;
         console.log(event.target)
         if(itemid){
	        el= document.getElementById(itemid);
	        el.parentNode.removeChild(el); 
         }
    })
    $(".select-thesis-project").change(function(){
        var input ="."+$(".select-thesis-project").find(":selected").text();
        $(input).siblings().css("display","none");
        $(input).fadeIn();
    });
});