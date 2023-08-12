function togglefo() 
{
	var element = document.getElementByld ("additional-info");
	
	if(element.style.display === "none")
	{
		element.style.display = "block";
	}
	else
	{
		element.style.display = "none";
	}
}

var images = ["C:/Users/Acer/OneDrive/Desktop/HTML Files/Portfolio Webpage/Photos/2nd Background.jpg, "C:/Users/Acer/OneDrive/Desktop/HTML Files/Portfolio Webpage/Photos/3rd Background.jpg"];
var currentImageIndex = 0;

function changeImage(direction)

function validateForm()
{
	var name = document.getElementByld("name").value;
	var email = document.getElementByld("email").value;
	var phone = document.getElementByld("phone").value;
	var message = document.getElementByld("message").value;
if (name ==="") //check whether the name is empty
{
	alert ("Please enter your name here");
	return false;
}
var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
if (!emailRegex.test(email) //check whether the email is valid
	alert("Please enter a valid email address");
	return false;
}