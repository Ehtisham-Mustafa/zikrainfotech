<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Tenant</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/framer-motion/dist/framer-motion.umd.js"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500">

  <div id="form-container" class="opacity-0 scale-75 transition-all duration-700">
    <form action="{{ url('/tenants') }}" method="POST" class="w-96 bg-white rounded-2xl shadow-2xl p-8 space-y-5">
      @csrf

      <h2 class="text-3xl font-bold text-center text-indigo-600">✨ Create Tenant</h2>
      <p class="text-center text-gray-500">Fill in the details below</p>

      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Tenant Name</label>
        <input 
          type="text" 
          name="name" 
          id="name" 
          placeholder="Enter tenant name" 
          required
          class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 px-3 py-2"
        >
      </div>

      <div>
        <label for="domain" class="block text-sm font-medium text-gray-700">Tenant Domain</label>
        <input 
          type="text" 
          name="domain" 
          id="domain" 
          placeholder="example.com" 
          required
          class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-3 py-2"
        >
      </div>

      <button 
        type="submit" 
        class="w-full bg-gradient-to-r from-indigo-500 to-pink-500 hover:from-pink-500 hover:to-indigo-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 transform hover:scale-105"
      >
        🚀 Create Tenant
      </button>
    </form>
  </div>

  <script>
    // Animate form when page loads
    window.addEventListener("load", () => {
      const form = document.getElementById("form-container");
      form.classList.remove("opacity-0", "scale-75");
      form.classList.add("opacity-100", "scale-100");
    });
  </script>

</body>
</html>
