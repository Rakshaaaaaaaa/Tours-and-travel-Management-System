$(document).ready(function () {
    $('#registrationForm').on('submit', function (e) {
        e.preventDefault();

        // Create FormData object to handle file upload
        const formData = new FormData(this);

        // Submit form data via AJAX
        $.ajax({
            url: 'upload.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('#output').html(response);
            },
            error: function () {
                $('#output').html('<p style="color:red;">An error occurred while submitting the form.</p>');
            }
        });
    });
});
$(document).ready(function () {
    $("#registrationForm").on("submit", function (e) {
        e.preventDefault(); // Prevent default form submission

        // Gather form data
        const name = $("#name").val();
        const email = $("#email").val();
        const phone = $("#phone").val();
        const dob = $("#dob").val();
        const gender = $("#gender").val();
        const address = $("#address").val();
        const qualification = $("#qualification").val();
        const skills = $("#skills").val();

        // Display submitted data
        $("#output").html(`
            <h2>Submission Successful!</h2>
            <p><strong>Full Name:</strong> ${name}</p>
            <p><strong>Email:</strong> ${email}</p>
            <p><strong>Phone:</strong> ${phone}</p>
            <p><strong>Date of Birth:</strong> ${dob}</p>
            <p><strong>Gender:</strong> ${gender}</p>
            <p><strong>Address:</strong> ${address}</p>
            <p><strong>Qualification:</strong> ${qualification}</p>
            <p><strong>Technical Skills:</strong> ${skills}</p>
        `).fadeIn();
    });
});
s