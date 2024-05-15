const date = new Date();

const year = document.getElementById("year");

year.textContent = date.getFullYear();

// get coutnries data
fetch("https://restcountries.com/v3.1/all")
  .then((response) => response.json())
  .then((data) => {
    const countries = data.map((country) => country.name.common);
    countries.sort(); // Sort country names alphabetically
    const select = document.getElementById("country-select");
    countries.forEach((country) => {
      const option = document.createElement("option");
      option.value = country;
      option.textContent = country;
      select.appendChild(option);
    });
  })
  .catch((error) => console.error("Error fetching country data:", error));

//   IMAGE UPLOAD VALIDATOR
// document.getElementById('user_avatar').addEventListener('change', function() {
//   const allowedExtensions = ['jpg', 'jpeg', 'png'];
//   const fileInput = this;
//   const files = fileInput.files;
//   const file = files[0];
//   const filePath = file.name;
//   const fileExtension = filePath.split('.').pop().toLowerCase();

//   if (!allowedExtensions.includes(fileExtension)) {
//     alert('Please select a valid image file (.jpg, .png, .jpeg).');
//     fileInput.value = ''; // Clear the file input
//   }
// });

//   DOB VALIDATOR
document.getElementById("dob").addEventListener("change", function () {
  const dob = new Date(this.value); // Convert the entered date to a Date object
  const today = new Date();
  const age = today.getFullYear() - dob.getFullYear(); // Calculate the age
  const monthDiff = today.getMonth() - dob.getMonth();
  if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
    age--;
  }

  if (age < 18) {
    alert("You must be at least 18 years old.");
    this.value = ""; // Clear the input field
  }
});

//   HANDLE REGISTRATION FORM

// const addDataForm = document.getElementById("registration-form");

// addDataForm.addEventListener("submit", function (event) {
//   event.preventDefault();

//   const formData = new FormData(addDataForm);

//   fetch("assets/php/submitform.php", {
//     method: "POST",
//     body: formData,
//   })
//     .then((response) => {
//       if (response.ok) {
//         // alert('Data added successfully');
//         console.log(response);
//         // window.location = "applicationMessage.html";
//       } else {
//         // alert("Error adding data:", response.statusText);
//         console.log(response.statusText);
//       }
//     })
//     .catch((error) => {
//       console.error("Error adding data:", error);
//       alert("Error");
//     });
// });