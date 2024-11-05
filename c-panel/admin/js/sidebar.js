
	var menu_text = document.getElementsByClassName("menu-text");
	
	function hidesidebar()
	{
		
		if(sidebar.className == "sidebar")
		{
			sidebar.classList.add("sidebarnew");
			quick_access.style.display = "block";
			heading.style.display = "none";
			online.style.display = "none";
			profile_pic.classList.add("profile-pic");
			member_name.style.display = "none";
			user_profile.style.height = "60px";
			
			header.classList.add("header-new");

			for(x in menu_text )
			{
				menu_text[x].classList.add("menu_text");
			}
		}else
		{
			sidebar.classList.remove("sidebarnew");
			quick_access.style.display = "none";
			heading.style.display = "block";
			online.style.display = "block";
			profile_pic.classList.remove("profile-pic");
			member_name.style.display = "inline-block";
			user_profile.style.height = "114px";
			
			header.classList.remove("header-new");

			for(x in menu_text)
			{
				menu_text[x].classList.remove("menu_text");
			}
		}
	}

	function profileshow()
	{
		if(profile_hidden.style.display == "block")
		{
			profile_hidden.style.display = "none";

		}else
		{
			profile_hidden.style.display = "block";
		}
	}