var content_heading = document.querySelector(".c_heading");
			
	burger.addEventListener("click", function table_div()
	{
		if(content_heading.className == "c_heading")
		{
			content_heading.classList.add("content-heading");
			
		}else
		{
			content_heading.classList.remove("content-heading");
		}
		
		if(users_sec.className == "users-sec")
		{		
			users_sec.classList.add("users_sec_new");
			
		}else
		{
			users_sec.classList.remove("users_sec_new");
			//alert("xyz");
		}
	});



function show_member_add()
{		
	add_categ_sec.classList.add("member-add-sec-new");
}

function hide_member_add()
{		
	add_categ_sec.classList.remove("member-add-sec-new");
}