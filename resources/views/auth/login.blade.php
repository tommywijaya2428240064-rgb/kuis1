<x-auth-layout>
   <form action="/login" method="post"> 
    @csrf
    
    <div class="form-group">
        <input type="text" name="email" placeholder="email" class="form-control">
    </div>
    <div class="form-group">
        <input type="text" name="password" placeholder="password" class="form-control">
    </div>
    <button type ="submit">login</button>
  </form> 
</x-auth-layout>    
