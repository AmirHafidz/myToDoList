MASUK SUDAH
<form action="{{route('user.logout')}}" class="m-0 p-0" method="post">
    @csrf
    <div class="hstack gap-3">
        <i class='bx bx-power-off bx-tada fs-5 mb-0' ></i>
        <input type="submit" value="Logout" class="mt-0 text-center fs-6" style="border: none; background-color:transparent;">
    </div>
</form>