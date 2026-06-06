<x-auth-layout>
   <form action="/register" method="post"> 
    @csrf
    <div class="form-group">
        <input type="text" name="name" placeholder="name" class="form-control">
    </div>
    <div class="form-group">
        <input type="text" name="email" placeholder="email" class="form-control">
    </div>
    <div class="form-group">
        <input type="text" name="password" placeholder="password" class="form-control">
    </div>
    <div class="form-group">
        <input type="text" name="password_confirmation" placeholder="pasword_confirmationfort" class="form-control">
    </div>
    <button type ="submit">Rergister</button>
  </form> 
</x-auth-layout>    
