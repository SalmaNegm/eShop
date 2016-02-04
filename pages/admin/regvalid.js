
	var fuid= false; //flages
	var funame =false;
	var fuaddress = false;
	var fuemail = false;
	var fupass = false;
	var fucountry =false;

	onload= function()
	{
		console.log('hii');
		var myspan= document.getElementById("nspan");
		var uname =document.registration.elements["uname"];
		var pass=document.registration.elements["pass"];
		var passcon=document.registration.elements["rpass"];
		var job=document.registration.elements["job"];
		var email=document.registration.elements["email"];
	
		



		//uidtxt.focus();
		uname.onblur=function()
		{
			var pat =/[a-zA-Z]{5,20}/;

			if (this.value.match(pat))
			{
				fuid= true;
				this.className="";
				myspan.style.display="none";

			}
			else
			{
				fuid= false;
				this.focus();
				this.select();
				this.className="Error";
				myspan.style.display="block";
				myspan.innerHTML="More than 5 letters";

			}
			
		}
		
		pass.onblur=function()
		{

			var patad=/[a-zA-Z0-9]{5,10}/;

			if (this.value.match(patad))
			{
				this.className="";
				myspan.style.display="none";

			}
			else
			{
				fuaddress= false;
				this.focus();
				this.select();
				this.className="Error";
				myspan.style.display="block";
				myspan.innerHTML="only 5 more numbers";

			}
		}
		passcon.onblur=function()
		{

			if( pass.value == passcon.value)
			{
				this.className="";
				pass.className="";
				myspan.style.display="none";

			}
			else
			{

				pass.focus();
				pass.select();
				this.className="Error";
				pass.className="Error";
				myspan.style.display="block";
				myspan.innerHTML="Unmatched";

			}
		}
		/*job.onblur=function()
		{
			var pat =/[a-zA-Z]{10,20}/;

			if (this.value.match(pat))
			{
				fuid= true;
				this.className="";
				myspan.style.display="none";

			}
			else
			{
				fuid= false;
				this.focus();
				this.select();
				this.className="Error";
				myspan.style.display="block";
				myspan.innerHTML="More than 10 letters";

			}
			
		}*/
		
		email.onblur=function()
		{
			var pate=/[a-zA-Z][a-zA-Z0-9]*@[a-zA-Z]+.[a-zA-Z]{2,6}/;
			if (this.value.match(pate))
			{
				fuemail= true;
				this.className="";
				myspan.style.display="none";

//*************************************Ajax*******************************//
				email = $('#email');
				emailerr = $('#emailerr');

				//email.on('blur', function(event) {
				$.ajax({
							url: 'validate.php?email='+$(this).val(),
							type: 'GET',
							dataType: 'html',
							success: function (response) {

								var replay = JSON.parse(response);
								console.log(replay);
								//console.log("kkk");
								action=replay.data;
								console.log (action);
								//if(response == 'Avilable')
								if(action== 'Avilable')
								{
									console.log('yes');

									emailerr.html("<div style='color:green'>Avilable</div>");
								}
								else
								{
									//console.log (response);
									console.log('no');
									emailerr.html("Email Exist");
								}
							},
							error: function (error) {
								console.log(error);
							}
						});
			//});

			}
			else
			{
				fuemail= false;
				this.focus();
				this.select();
				this.className="Error";
				myspan.style.display="block";
				myspan.innerHTML=" Not valid expression";

			}
			
		}


	}




	





	
