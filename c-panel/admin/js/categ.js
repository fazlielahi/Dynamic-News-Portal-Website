
burger.addEventListener("click", function table_div()
{
	if(content_heading.className == "c_heading")
	{
		content_heading.classList.add("content-heading");
	}else
	{
		content_heading.classList.remove("content-heading");
	}

	if(table.className == "table table-light table-hover")
	{		
		table.classList.add("table_new");
		sno_th.style.width = "30px";
		newstitle.style.width = "430px";
		datetime_th.style.width = "270px";
		//alert("abc");
		
	}else
	{
		table.classList.remove("table_new");
		//alert("xyz");
	}
});

function show_categ_add()
{		
	add_categ_sec.classList.add("categ-add-sec-new");
}

function hide_categ_add()
{		
	add_categ_sec.classList.remove("categ-add-sec-new");
}