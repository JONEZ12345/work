function validateInput() {
  let inputField = document.getElementById("inputField");
  let inputValue = inputField.value.trim();
  let errorMessage = document.getElementById("errorMessage");

  //Add your validation logic here
  if (inputValue === "") {
    //Invalud input,apply shake effect and display the error message
    inputField.classList.add("shake");
    errorMessage.style.visibility = "visible";

    //Remove the shake class and hide the error message after the animation completes
    setTimeout(function () {
      inputField.classList.remove("shake");
      errorMessage.style.visibility = "hidden";
    }, 500);
  } else {
    //Valid input, proceed with your logic
    alert("Valid input");
  }
}
