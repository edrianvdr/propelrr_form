<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propelrr</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="scripts.js" defer></script>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen p-6">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">User Information Form</h1>
        <form id="userForm" class="space-y-4">
            <div>
                <label for="full_name" class="block text-gray-700 text-sm font-medium mb-1">Full Name:</label>
                <input type="text" id="full_name" name="full_name" required
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="email" class="block text-gray-700 text-sm font-medium mb-1">Email Address:</label>
                <input type="email" id="email" name="email" required
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="mobile_number" class="block text-gray-700 text-sm font-medium mb-1">Mobile Number:</label>
                <input type="text" id="mobile_number" name="mobile_number" required
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="dob" class="block text-gray-700 text-sm font-medium mb-1">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="gender" class="block text-gray-700 text-sm font-medium mb-1">Gender:</label>
                <select id="gender" name="gender" required
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <p id="error-message" class="text-red-500"></p>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
        </form>
    </div>
</body>
</html>
