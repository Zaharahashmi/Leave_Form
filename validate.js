function validate()
{
  const form = document.getElementById("register");
  const nameInput = form.elements["name"];
  const rnoInput = form.elements["rno"];
  const emailInput = form.elements["email"];
  const startDateInput = form.elements["start_date"];
  const endDateInput = form.elements["end_date"];
  const reasonInput = form.elements["reason"];
  const submitButton = form.elements["submitval"];
  
  function validateForm(event) {

    if (/[\d]+/.test(nameInput.value) || nameInput.value === "") {
      alert("Please enter a valid name.");
      event.preventDefault();
    }
  
   
    if (!/^21cse\d{3}$/i.test(rnoInput.value) || rnoInput.value === "") {
      alert("Please enter a valid roll number in the format 21cseXXX.");
      event.preventDefault();
    }
  
  
    if (
      !/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(emailInput.value) ||
      emailInput.value === ""
    ) {
      alert("Please enter a valid email address.");
      event.preventDefault();
    }
  
    if (new Date(endDateInput.value) < new Date(startDateInput.value)) {
      alert("End date must be greater than or equal to start date.");
      event.preventDefault();
    }
  
  
    if (/[\d]+/.test(reasonInput.value) || reasonInput.value === "") {
      alert("Please enter a valid reason.");
      event.preventDefault();
    }
  }
  
  form.addEventListener("submit", validateForm);
  

}