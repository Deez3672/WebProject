<!-- resources/views/partials/navbar.blade.php -->
<header class="sticky top-0 z-50 bg-white shadow-md">
  <div class="max-w-7xl mx-auto flex items-center justify-between p-4">
    <div class="flex items-center space-x-6">
      <a href="#" class="text-2xl font-bold text-red-600 flex items-center">
        <span class="text-orange-500">Order</span>Eats
      </a>
      <select class="border rounded-full px-4 py-2 text-sm bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500" id="locationSelector">
        <option>Colombo</option>
        <option>Kandy</option>
        <option>Galle</option>
        <option>Negombo</option>
        <option>Matale</option>
        <option>Use My Location</option>
      </select>
      <nav class="hidden md:flex space-x-6">
        <a href="#" class="text-gray-700 hover:text-red-600 font-medium">Home</a>
        <a href="#" class="text-gray-700 hover:text-red-600 font-medium">Restaurants</a>
        <a href="#" class="text-gray-700 hover:text-red-600 font-medium">Deals</a>
        <a href="#" class="text-gray-700 hover:text-red-600 font-medium">My Orders</a>
      </nav>
    </div>
    <div class="flex items-center space-x-4">
      <a href="#" class="text-gray-700 hover:text-red-600 font-medium hidden md:block">Login</a>
      <a href="#" class="bg-red-600 text-white px-4 py-2 rounded-full hover:bg-red-700 transition font-medium hidden md:block">Sign Up</a>

      <div class="relative" id="cartIcon">
        <div class="cursor-pointer p-2 rounded-full hover:bg-gray-100 transition">
          <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
          <span id="cartCount" class="cart-badge absolute -top-1 -right-1 bg-orange-500 rounded-full text-white w-5 h-5 text-xs font-bold flex justify-center items-center">0</span>
        </div>
      </div>

      <button class="md:hidden p-2 rounded-lg hover:bg-gray-100" id="mobileMenuButton">
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
  </div>
  
  <!-- Mobile Menu -->
  <div class="md:hidden hidden bg-white shadow-lg" id="mobileMenu">
    <div class="px-4 py-2 space-y-2">
      <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Home</a>
      <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Restaurants</a>
      <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Deals</a>
      <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">My Orders</a>
      <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Login</a>
      <a href="#" class="block py-2 text-red-600 font-medium">Sign Up</a>
    </div>
  </div>
</header>