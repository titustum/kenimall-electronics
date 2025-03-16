<!-- Register/Login Modal -->
<div x-data="{ isLogin: true }" 
  x-cloak 
  x-show="openRegisterModal" 
  x-transition:enter="transition ease-out duration-300" 
  x-transition:enter-start="opacity-0" 
  x-transition:enter-end="opacity-100" 
  x-transition:leave="transition ease-in duration-200" 
  x-transition:leave-start="opacity-100" 
  x-transition:leave-end="opacity-0" 
  class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-[rgba(0,0,0,0.7)]" 
  @click.self="openRegisterModal = false">
    <div class="bg-white rounded-lg w-full max-w-md p-8 relative">

      <!-- Close Button -->
      <button @click="openRegisterModal = false" class="absolute top-4 right-4 text-gray-600 hover:text-gray-800">
        <i class="fas fa-times text-xl"></i>
      </button>

      <!-- Modal Header: Login/Register Tabs -->
      <div class="flex justify-between mb-6">
        <button :class="isLogin ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500'" @click="isLogin = true" class="text-lg font-semibold py-2 px-4">Login</button>
        <button :class="!isLogin ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500'" @click="isLogin = false" class="text-lg font-semibold py-2 px-4">Register</button>
      </div>
  
      <!-- Login Form -->
      <div x-show="isLogin">
        <h3 class="text-2xl font-semibold mb-4">Login</h3>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" id="email" name="email" placeholder="Your email" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          </div>
          <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
            <input type="password" id="password" name="password" placeholder="Your password" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          </div>
          <div class="mb-4 flex justify-between items-center">
            <label for="remember" class="text-sm text-gray-600">
              <input type="checkbox" id="remember" name="remember" class="mr-2"> Remember me
            </label>
            <a href="#" class="text-sm text-blue-500 hover:underline">Forgot password?</a>
          </div>
          <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200">Login</button>
        </form>
      </div>
  
      <!-- Register Form -->
      <div x-show="!isLogin">
        <h3 class="text-2xl font-semibold mb-4">Register</h3>
        <form>
          <div class="mb-4">
            <label for="newEmail" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" id="newEmail" name="email" placeholder="Your email" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          </div>
          <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-gray-600">Username</label>
            <input type="text" id="username" name="username" placeholder="Choose a username" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          </div>
          <div class="mb-4">
            <label for="password1" class="block text-sm font-medium text-gray-600">Password</label>
            <input type="password" id="password1" name="password1" placeholder="Create a password" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          </div>
          <div class="mb-4">
            <label for="confirmPassword" class="block text-sm font-medium text-gray-600">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          </div>
          <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200">Register</button>
        </form>
      </div>
  
      <!-- Modal Footer -->
      <div class="mt-6 text-center text-sm">
        <p class="text-gray-500">By continuing, you agree to our <a href="#" class="text-blue-500 hover:underline">Terms of Service</a> and <a href="#" class="text-blue-500 hover:underline">Privacy Policy</a>.</p>
      </div>
    </div>
</div>
