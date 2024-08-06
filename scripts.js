document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('userForm');
    const errorMessage = document.getElementById('error-message');
    
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        
        errorMessage.textContent = ''; // Clear previous error messages

        const fullName = document.getElementById('full_name').value.trim();
        const email = document.getElementById('email').value.trim();
        const mobileNumber = document.getElementById('mobile_number').value.trim();
        const dob = document.getElementById('dob').value;
        const gender = document.getElementById('gender').value;

        if (!fullName || !email || !mobileNumber || !dob || !gender) {
            errorMessage.textContent = 'All fields are required.';
            return;
        }

        if (!/^[a-zA-Z\s.,]+$/.test(fullName)) {
            errorMessage.textContent = 'Full Name contains invalid characters.';
            return;
        }

        if (!/^[\w.-]+@[\w.-]+\.\w{2,}$/.test(email)) {
            errorMessage.textContent = 'Invalid email address.';
            return;
        }

        if (!/^09\d{9}$/.test(mobileNumber)) {
            errorMessage.textContent = 'Invalid mobile number. Must be in the format 09123456789.';
            return;
        }

        const today = new Date();
        const birthDate = new Date(dob);
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDifference = today.getMonth() - birthDate.getMonth();

        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        const formData = new FormData(form);
        formData.append('age', age);

        fetch('form_handler.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Form submitted successfully!');
                form.reset();
            } else {
                errorMessage.textContent = data.error;
            }
        })
        .catch(error => {
            errorMessage.textContent = 'An error occurred while submitting the form.';
            console.error('Error:', error);
        });
    });
});
